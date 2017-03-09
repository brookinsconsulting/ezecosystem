<?php
/**
 * File containing demo import handler SQLIConfluenceATOMImportHandler
 * @copyright Copyright (C) 1999 - 2012 - Brookins Consulting. All rights reserved
 * @copyright Copyright (C) 2010 - SQLi Agency. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Brookins Consulting
 * @version @@@VERSION@@@
 * @package ezecosystem
 * @subpackage sourcehandlers
 */

class SQLIConfluenceATOMImportHandler extends SQLIImportAbstractHandler implements ISQLIImportHandler
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

    function endswith( $string, $test )
    {
        $strlen = strlen($string);
        $testlen = strlen($test);
        if ($testlen > $strlen) return false;
        return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
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

        $summary = (string)$row->summary;
        // print_r($summary); echo "\n\n\n";

        // Handle Author text string or html linked profile page link
        if( strpos( $summary, 'https://doc.ez.no/display/~' ) )
        {
            $profile_url_matches = array();
            preg_match( '/by.*(\<a href=".*https:\/\/doc\.ez\.no\/display\/~(.*)\n"\>(.*)\<\/a\>)/i', $summary, $profile_url_matches );

            //echo "\n\n\n\n";
            //var_dump($profile_url_matches);

            if( empty( $profile_url_matches ) )
            {
                preg_match( '/by\n.*(\<a href=".*https:\/\/doc\.ez\.no\/display\/~(.*)\n"\>(.*)\<\/a\>)/i', $summary, $profile_url_matches );
            }

            // $uri = $profile_url_matches[2];
            // $name = $profile_url_matches[3];
            $profile_url = preg_replace('/\n+/', '', preg_replace('/\s\s+/', '', $profile_url_matches[1]));

            /*
            echo "\n\n\n\n";
            echo $profile_url;
            echo "\n\n\n\n";
            var_dump($profile_url_matches); die();
            */
        }
        else
        {
            $profile_url = (string)$row->author->name;
        }

        $content->fields->blog_post_author = $profile_url;
        $content->fields->blog_post_url = (string)$row->link["href"];
        $content->fields->publication_date = strtotime( (string)$row->updated );

        // Handle Tags / Keywords content
        $tagString = '';
        $tagArrayIndex = 0;
        $tagArrayCount = count( $row->category );
        foreach ( $row->category as $tagItem )
        {
            //var_dump( (string)$tagItem["term"] );
            if( $tagArrayIndex === 0 )
            {
                $tagString .= (string)$tagItem["term"];
            }
            elseif ( !$this->endswith( $tagString, "," ) )
            {
                $tagString .= ", " . (string)$tagItem["term"];
            }
            $tagArrayIndex++;
        }

        $content->fields->tags = (string)$tagString;

        // Handle HTML content
        $content->fields->blog_post_description_text_block = (string)$row->summary; // Proxy method to SQLIContentUtils::getRichContent()

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
