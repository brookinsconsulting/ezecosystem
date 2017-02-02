<?php
/**
 * File containing demo import handler SQLIStackOverflowTagATOMImportHandler
 * @copyright Copyright (C) 1999 - 2012 - Brookins Consulting. All rights reserved
 * @copyright Copyright (C) 2010 - SQLi Agency. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Brookins Consulting
 * @version @@@VERSION@@@
 * @package ezecosystem
 * @subpackage sourcehandlers
 */

class SQLIStackOverflowTagATOMImportHandler extends SQLIImportAbstractHandler implements ISQLIImportHandler
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
            'class_identifier'      => 'forum_topic',
            'remote_id'             => (string)$row->id
        ) );

        $content = SQLIContent::create( $contentOptions );

        // print_r( $row ); die();

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

        $defaultParentNodeID = $this->handlerConfArray['DefaultParentNodeID'];

        $title = (string)$row->title;
        $content->fields->subject = $title;
        $content->fields->forum_topic_author = '<a href="' . (string)$row->author->uri . '" title="' . (string)$row->author->uri . '">' . (string)$row->author->name . '</a>';

        $content->fields->link = (string)$row->link["href"];
        $content->fields->publication_date = strtotime( (string)$row->updated );

        // Handle HTML content
        $message = (string)$row->summary;
        $content->fields->message = $message; // Proxy method to SQLIContentUtils::getRichContent()

//      $content->fields->message = str_replace( 'href="/', 'href="http://stackoverflow.com/', $message ); // Proxy method to SQLIContentUtils::getRichContent()

        //echo "\n\nCorrupt-ObjectID: "; print_r( $content->attribute( 'id' ) ); echo "\n\n";

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
        return $this->getHandlerFeedName . ' : ' . 'StackOverflow Tag ATOM Import Handler';
    }
    
    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getHandlerIdentifier()
     */
    public function getHandlerIdentifier()
    {
        return 'stackoverflowtagatomimporthandler';
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
?>