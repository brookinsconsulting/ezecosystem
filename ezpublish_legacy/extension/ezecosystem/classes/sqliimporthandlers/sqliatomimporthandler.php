<?php
/**
 * File containing demo import handler SQLIATOMImportHandler
 * @copyright Copyright (C) 1999 - 2012 - Brookins Consulting. All rights reserved
 * @copyright Copyright (C) 2010 - SQLi Agency. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Brookins Consulting
 * @version @@@VERSION@@@
 * @package ezecosystem
 * @subpackage sourcehandlers
 */

class SQLIATOMImportHandler extends SQLIImportAbstractHandler implements ISQLIImportHandler
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
        $this->currentGUID = str_replace( 'http://fabien.potencier.org/', '', (string)$row->id );

        /* echo "\n";echo "\n";echo "\n";echo "\n";
        print_r( $this->currentGUID );
        echo "\n";echo "\n";echo "\n";echo "\n";
         */

        $contentOptions = new SQLIContentOptions( array(
            'class_identifier'      => 'blog_post',
            'remote_id'             => $this->currentGUID
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

        $content->fields->title = (string)$row->title;
        $content->fields->blog_post_author = (string)$row->author->name;

        $content->fields->blog_post_url = (string)$row->link["href"];
        $content->fields->publication_date = strtotime( (string)$row->updated );

        // Handle HTML content
        $content->fields->blog_post_description_text_block = (string)$row->content; // Proxy method to SQLIContentUtils::getRichContent()

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
        return $this->getHandlerFeedName . ' : ' . 'ATOM Import Handler';
    }

    /**
     * (non-PHPdoc)
     * @see extension/sqliimport/classes/sourcehandlers/ISQLIImportHandler::getHandlerIdentifier()
     */
    public function getHandlerIdentifier()
    {
        return 'atomimporthandler';
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
