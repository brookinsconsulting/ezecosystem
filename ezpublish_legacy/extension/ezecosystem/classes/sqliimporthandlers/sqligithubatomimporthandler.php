<?php
/**
 * File containing demo import handler SQLIGitHubATOMImportHandler
 * @copyright Copyright (C) 1999 - 2012 - Brookins Consulting. All rights reserved
 * @copyright Copyright (C) 2010 - SQLi Agency. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Brookins Consulting
 * @version @@@VERSION@@@
 * @package ezecosystem
 * @subpackage sourcehandlers
 */

class SQLIGitHubATOMImportHandler extends SQLIImportAbstractHandler implements ISQLIImportHandler
{
    protected $rowIndex = 0;
    
    protected $rowCount;
    
    protected $currentGUID;
    
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
        $xmlOptions = new SQLIXMLOptions( array(
            'xml_path'      => $atomFeedUrl,
            'xml_parser'    => 'simplexml'
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
            'class_identifier'      => 'blog_post',
            'remote_id'             => (string)$row->id
        ) );

        $content = SQLIContent::create( $contentOptions );

        $defaultParentNodeID = $this->handlerConfArray['DefaultParentNodeID'];

        $title = (string)$row->title;
        $content->fields->title = $title;
        $content->fields->blog_post_author = (string)$row->author->name;

        $content->fields->blog_post_url = (string)$row->link["href"];
        $content->fields->publication_date = strtotime( (string)$row->updated );

        // Handle HTML content
        $message = (string)$row->content;
        $content->fields->blog_post_description_text_block = str_replace( 'href="/', 'href="http://github.com/', $message ); // Proxy method to SQLIContentUtils::getRichContent()

        $issueTicketID = $this->getIssueFromGitCommitMessage( $title, strip_tags( $message ) );
        // echo "\n\n"; print_r($issueTicketID); echo "\n\n";

        $content->fields->tags = $issueTicketID;

        // Now publish content
        $content->addLocation( SQLILocation::fromNodeID( $defaultParentNodeID ) );

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
        return 'GitHub ATOM Import Handler';
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getHandlerIdentifier()
     */
    public function getHandlerIdentifier()
    {
        return 'githubatomimporthandler';
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getProgressionNotes()
     */
    public function getProgressionNotes()
    {
        return 'Currently importing : '.$this->currentGUID;
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
}
?>