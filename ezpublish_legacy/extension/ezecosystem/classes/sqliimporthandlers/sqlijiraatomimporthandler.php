<?php
/**
 * File containing demo import handler SQLIJiraATOMImportHandler
 * @copyright Copyright (C) 1999 - 2012 - Brookins Consulting. All rights reserved
 * @copyright Copyright (C) 2010 - SQLi Agency. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Brookins Consulting
 * @version @@@VERSION@@@
 * @package ezecosystem
 * @subpackage sourcehandlers
 */

class SQLIJiraATOMImportHandler extends SQLIImportAbstractHandler implements ISQLIImportHandler
{
    protected $rowIndex = 0;
    
    protected $rowCount;
    
    protected $currentGUID;
    
    protected $getHandlerFeedName;

    /**
     * Constructor
     */
    public function __construct( SQLIImportHandlerOptions $options = null )
    {
        parent::__construct( $options );
        $this->remoteIDPrefix = $this->getHandlerIdentifier().'-';
        $this->currentRemoteIDPrefix = $this->remoteIDPrefix;
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::initialize()
     */
    public function initialize()
    {
        $atomFeedUrl = $this->handlerConfArray['ATOMFeed'];
        $this->getHandlerFeedName = $this->handlerConfArray['Name'];
        $xmlOptions = new SQLIXMLOptions( array(
            'xml_path'      => $atomFeedUrl,
            'xml_parser'    => 'simplexml',
            'timeout'       => 10000
        ) );
        $xmlParser = new SQLIXMLParser( $xmlOptions );
        $this->dataSource = $xmlParser->parse();
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getProcessLength()
     */
    public function getProcessLength()
    {
        if( !isset( $this->rowCount ) )
        {
            $this->rowCount = count( $this->dataSource->entry );
        }
        return $this->rowCount;
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getNextRow()
     */
    public function getNextRow()
    {
        if( $this->rowIndex < $this->rowCount )
        {
            $row = $this->dataSource->entry[$this->rowIndex];
            $this->rowIndex++;
        }
        else
        {
            $row = false; // We must return false if we already processed all rows
        }
        
        return $row;
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::process()
     */
    public function process( $row )
    {
        // $row is a SimpleXMLElement object
        $this->currentGUID = $row->id;
        $contentOptions = new SQLIContentOptions( array(
            'class_identifier'      => 'issue_post',
            'remote_id'             => (string)$row->id
        ) );
        $content = SQLIContent::create( $contentOptions );

        $published = (string)$row->published;
        $updated = (string)$row->updated;
        $skipUpdated = false;

        if( $published && $published != '' && $published != 0 )
        {
            $content->setAttribute( 'published', strtotime( $published ) );
            $content->store();
        }
        elseif( ( !$published || $$published == '' || $published == 0 ) && ( $updated && $updated != '' && $updated != 0 ) )
        {
            $content->setAttribute( 'published', strtotime( $updated ) );
            $content->setAttribute( 'modified', strtotime( $updated ) );
            $content->store();
            $skipUpdated = true;
        }
        if( !$skipUpdated && $updated && $updated != '' && $updated != 0 )
        {
            $content->setAttribute( 'modified', strtotime( $updated ) );
            $content->store();
        }
        elseif( !$skipUpdated && ( !$updated || $$updated == '' || $updated == 0 ) && ( $published && $published != '' && $published != 0 ) )
        {
            $content->setAttribute( 'published', strtotime( $published ) );
            $content->setAttribute( 'modified', strtotime( $published ) );
            $content->store();
        }

        // $title = strip_tags( html_entity_decode( (string)$row->title ) );
        $classToDecode = new eZecosystemSimpleOperators();
        $title = strip_tags( $classToDecode->html_entity_decode_numeric( (string)$row->title ) );

        /*
        echo "\n\n";
        print_r( $title );
        echo "\n\n";
        */

        $content->fields->title = $title;
        $content->fields->blog_post_author = (string)$row->author->name;

        $content->fields->blog_post_url = (string)$row->link["href"];
        $content->fields->publication_date = strtotime( (string)$row->updated );

        // Handle HTML content
        $message = (string)$row->content;
        $content->fields->blog_post_description_text_block = (string)$row->content; // Proxy method to SQLIContentUtils::getRichContent()
        
        $issueTicketID = $this->getIssueFromGitCommitMessage( $title, strip_tags( $message ) );
        // echo "\n\n"; print_r($issueTicketID); echo "\n\n"; die();

        $content->fields->tags = $issueTicketID;

        // Now publish content
        $content->addLocation( SQLILocation::fromNodeID( $this->handlerConfArray['DefaultParentNodeID'] ) );

        $publisher = SQLIContentPublisher::getInstance();
        $publisher->publish( $content );

        // Clear cache
        $defaultParentNodeID = $this->handlerConfArray['DefaultParentNodeID'];
        $parentNode = eZContentObjectTreeNode::fetch( $defaultParentNodeID, 'eng-US' );

        if ( $parentNode != false )
        {
            $objectID = $parentNode->attribute( 'object' )->attribute( 'id' );
            eZContentCacheManager::clearContentCacheIfNeeded( $objectID );
        }
        
        // Free some memory. Internal methods eZContentObject::clearCache() and eZContentObject::resetDataMap() will be called
        // @see SQLIContent::__destruct()
        unset( $content );
    }
    
    public function getIssueFromGitCommitMessage( $title, $message )
    {
      //given string $data, will return the first $issue string in that string
      $ret = false;
      $limit = 5;
      $prefix = 'EZP-';

      // test title first for 'EZP-'
      $splitTitle = preg_split( "/EZP-/", $title );

      if( isset( $splitTitle[1] ) )
        $splitTitleTestForZero = preg_split( "/0/", $splitTitle[1] );
        else
          $splitTitleTestForZero = null;

      if( $splitTitleTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }

      if( $splitTitleTestForZero == null )
      {
        // test title first for 'COM-'
        $splitTitle = preg_split( "/COM-/", $title );

        //print_r($splitTitle); die();

        if( isset( $splitTitle[1] ) )
        {
          $splitTitleTestForZero = preg_split( "/0/", $splitTitle[1] );
          $prefix = 'COM-';
        } else
          $splitTitleTestForZero = null;

        if( $splitTitleTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }
      }

      // test message second
      $splitMessage = preg_split( "/EZP-/", $message );

      if( isset( $splitMessage[1] ) )
        $splitMessageTestForZero = preg_split( "/0/", $splitMessage[1] );
        else
          $splitMessageTestForZero = null;

      if( $splitMessageTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }

      if( $splitMessageTestForZero == null )
        {
          // test title first for 'COM-'
          $splitMessage = preg_split( "/COM-/", $message );

          //print_r($splitMessage); die();

          if( isset( $splitMessage[1] ) )
          {
            $splitMessageTestForZero = preg_split( "/0/", $splitMessage[1] );
            $prefix = 'COM-';
          } else
            $splitMessageTestForZero = null;

          if( $splitMessageTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }
        }

      if( isset( $splitTitle[1] ) ) {
        $match = $splitTitle[1];
        $issue = (int) trim( substr( $match, 0, +$limit ) );
        // echo var_dump( $issue ); echo "\n\n";
        // echo strlen( $issue ); echo "\n\n";
        /* if( strlen( $issue ) >= 5 )
        {
        echo "\n\n\n";       print_r( "'$issue'" ); echo "\n\n\n";        print_r( is_numeric( $issue ) ); echo "\n\n\n";
        } */
        if ( $issue != '' && strlen( $issue ) >= 5 && is_numeric( $issue ) )
        {
          $ret = $prefix . $issue;
        }
      }
      elseif( isset( $splitMessage[1] ) ) {
        $match = $splitMessage[1];
        $issue = (int) trim( substr( $match, 0, +$limit ) );

        if ( $issue != '' && strlen( $issue ) >= 5 && is_numeric( $issue ) )
        {
          $ret = $prefix . $issue;
        }
      }

      //print_r($ret);
      return $ret;
    }

    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::cleanup()
     */
    public function cleanup()
    {
        // Nothing to clean up
        return;
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getHandlerName()
     */
    public function getHandlerName()
    {
        return $this->getHandlerFeedName . ' : ' . 'Jira ATOM Import Handler';
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getHandlerIdentifier()
     */
    public function getHandlerIdentifier()
    {
        return 'jiraatomimporthandler';
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getProgressionNotes()
     */
    public function getProgressionNotes()
    {
        return 'Currently importing : '.$this->currentGUID;
    }
}
