<?php
//
// Created on: <16-Jan-2009 15:47:14 vl>
//
// Copyright (C) 1999-2008 eZ systems as. All rights reserved.
//
// This source file is part of the eZ publish (tm) Open Source Content
// Management System.
//
// This file may be distributed and/or modified under the terms of the
// "GNU General Public License" version 2 as published by the Free
// Software Foundation and appearing in the file LICENSE.GPL included in
// the packaging of this file.
//
// Licencees holding valid "eZ publish professional licences" may use this
// file in accordance with the "eZ publish professional licence" Agreement
// provided with the Software.
//
// This file is provided AS IS with NO WARRANTY OF ANY KIND, INCLUDING
// THE WARRANTY OF DESIGN, MERCHANTABILITY AND FITNESS FOR A PARTICULAR
// PURPOSE.
//
// The "eZ publish professional licence" is available at
// http://ez.no/products/licences/professional/. For pricing of this licence
// please contact us via e-mail to licence@ez.no. Further contact
// information is available at http://ez.no/home/contact/.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Contact licence@ez.no if any conditions of this licencing isn't clear to
// you.
//

/*! \file fixmissingobjectattributes.php
*/

set_time_limit( 0 );

require 'autoload.php';


class FixMissingObjectAttributes
{
    private $cli;
    private $script;
    private $options;
    private $ClassAttributes;
    private $ClassID;
    private $reportOnly; // Only to reporting to user. Do not try to fix anything
    private $objectLimit; // Number of object to fetch at a time
    private $ExportFile;
    private $ImportFile;
    function FixMissingObjectAttributes( $cli, $script, $options )
    {
        $this->objectLimit = 500;
        $this->cli = $cli;
        $this->script = $script;
        $this->options = $options;
        if ( isset( $this->options['report'] ) )
            $this->reportOnly = true;
        else
            $this->reportOnly = false;
    
        if ( isset( $this->options['export-file'] ) )
        {
            $this->ExportFile = $this->options['export-file'];
            // Create empty file
            file_put_contents( $this->ExportFile, "");
        }
        else
            $this->ExportFile = false;
        
        if ( isset( $this->options['import-file'] ) )
            $this->ImportFile = $this->options['import-file'];
        else
            $this->ImportFile = false;
    }
    
    function run()
    {
        $this->getClassDefinition( $this->options['classid'] );
        if (isset( $this->options['objectid'] ) )
        {
            $contentObject = eZContentObject::fetch( $this->options['objectid'] );
            //Check that contentObject exists
            if( $contentObject === NULL )
            {
                $errorMsg = "ERROR: Object with objectID=" . $this->options['objectid'] . " doesn't exists in db. Skipping...\n";
                echo( $errorMsg );
            } else
            {
                $this->investigateObject( $contentObject );
            }
        } else if ( $this->ImportFile )
        {
            $this->investigateObjectsFromImportFile();
        } else 
        {
            $this->investigateAllObjects();
        }
    
    }
    
    static function clearMemoryCache()
    {
        eZContentObject::clearCache();
        eZContentLanguage::expireCache();
        unset( $GLOBALS['eZExpiryHandlerInstance'] );
        unset( $GLOBALS['eZContentObjectDefaultLanguage'] ); //see bug #013625
        unset( $GLOBALS['eZContentCacheInfo'] ); // see bug #013625
    }
    
    function investigateObjectsFromImportFile()
    {
        $importFile = file_get_contents( $this->ImportFile );
        $objectIDs = explode("\n", $importFile );
        
        $objectCount = count( $objectIDs );
        $this->cli->output( 'Number of objects to be processed: ' . $objectCount );
        
        $count=0;
        foreach( $objectIDs as $objectID )
        {
            if( is_numeric( $objectID ) )
            {
                $contentObject = eZContentObject::fetch( $objectID );
                //Check that contentObject exists
                if( $contentObject === NULL )
                {
                    $errorMsg = "ERROR: Object with objectID=$objectID doesn't exists in db. Skipping...\n";
                    echo( $errorMsg );
                } else
                {
                    $this->investigateObject( $contentObject );
                }
            }
            ++$count;

            if ( $count % $this->objectLimit === 0 )
            {
                echo( "NOTICE: $count of $objectCount objects done.\n");
                self::clearMemoryCache();
            }
        }
    
    }
    
    function investigateAllObjects()
    {
    
        $objectCount = eZContentObject::fetchSameClassListCount( $this->options['classid'] );
        $this->cli->output( 'Number of objects to be processed: ' . $objectCount );
        
        $offset = 0;
        while( $offset < $objectCount )
        {
            $objects = eZContentObject::fetchSameClassList( $this->options['classid'], true, $offset, $this->objectLimit );
            
            foreach( $objects as $object)
            {
                $this->investigateObject( $object );
            }
            $offset += $this->objectLimit;
            
            self::clearMemoryCache();

            echo( "NOTICE: $offset of $objectCount objects done.\n");
        } 
    }

    function getClassDefinition( $classID)
    {
        $class = eZContentClass::fetch( $classID, true, eZContentClass::VERSION_STATUS_DEFINED );
        if ( !$class )
        {
            $this->cli->error( 'No version of the class found.' );
            $this->script->shutdown( 1 );
            return;
        }
        $this->ClassAttributes = $class->fetchAttributes();
        $this->ClassID = $classID;

    }
    function investigateObject( $contentObject )
    {
        //Check that object is of correct class
        if( $contentObject->attribute( 'contentclass_id' ) != $this->ClassID )
        {
            $errorMsg = "Error: Object with objectID " . $contentObject->attribute( 'id' ) ." has classID=" . 
                $contentObject->attribute( 'contentclass_id' ) . ". Should have been classID=" . 
                $this->ClassID . ". Skipping...\n";
            echo( $errorMsg );
            return 0;
        }
        $foundErrorInObject = false;

        $contentObjectID = $contentObject->attribute( 'id' );
        $objectVersions = $contentObject->versions();

        foreach( $objectVersions as $objectVersion )
        {
            $translations = $objectVersion->translations( false );
            $version = $objectVersion->attribute( 'version' );
            
            foreach( $translations as $translation )
            {
                $dataMap = $contentObject->fetchDataMap( $objectVersion->attribute( 'version' ), $translation );
                foreach( $this->ClassAttributes as $classAttribute )
                {
                    //Loop through object and see if all attributes are there
                    $attributeExists = false;
                    foreach( $dataMap as $objectAttribute )
                    {
                        if( $classAttribute->attribute( 'id' ) === $objectAttribute->attribute( 'contentclassattribute_id' ) )
                        {
                            $attributeExists = true;
                        }
                    }
                    //echo("checkking for classattribute id : " . $classAttribute->attribute( 'id' )  . " in language " . $objectAttribute->attribute( 'language_code' ) . "\n");
                    if( !$attributeExists )
                    {
                        $foundErrorInObject = true;
                        // Write error to consile
                        $errorMsg = "MISMATCH DETECTED: Object " . $contentObject->attribute('id') . ", version $version, language $translation : Missing attribute : " . $classAttribute->attribute( 'id' ) . " (" . $classAttribute->attribute( 'identifier' ) . ")\n";
                        echo( $errorMsg );
                        
                        // Fix problem
                        if( !$this->reportOnly )
                        {
                            $objectAttribute = eZContentObjectAttribute::create( $classAttribute->attribute( 'id' ), $contentObjectID, $version );
                            $objectAttribute->setAttribute( 'language_code', $translation );
                            $objectAttribute->initialize( ); //initialize attribute value
                            $objectAttribute->store();
                        }
                    }
                }
            }
        }
        // Log to file if specified on command line
        if ( $foundErrorInObject && $this->ExportFile )
        {
            file_put_contents( $this->ExportFile, $contentObject->attribute('id') . "\n", FILE_APPEND );
        }

        
    }
}


// Init script

$cli = eZCLI::instance();
$endl = $cli->endlineString();

$script = eZScript::instance( array( 'description' => ( "CLI script.\n\n" .
                                                        "Will add missing content object attributes for a given class.\n" .
                                                        "\n" .
                                                        'fixmissingobjectattributes.php -s admin --classid=42' ),
                                      'use-session' => false,
                                      'use-modules' => true,
                                      'use-extensions' => true ) );
$script->startup();

$options = $script->getOptions( '[db-user:][db-password:][db-database:][db-driver:][sql][classid:][report][objectid:][export-file:][import-file:]',
                                '[name]',
                                array( 'db-host' => 'Database host',
                                       'db-user' => 'Database user',
                                       'db-password' => 'Database password',
                                       'db-database' => 'Database name',
                                       'db-driver' => 'Database driver',
                                       'sql' => 'Display sql queries',
                                       'classid' => 'ID of class to update',
                                       'report' => 'Only report missing attributes. Do not try to fix them',
                                       'objectid' => 'ID of object to look at. If obmitted, all objects of class will be investigated',
                                       'export-file' => 'File where object ids for currupted objects should be logged',
                                       'import-file' => 'File containing object ids for objects that should be checked. You may create the file using the --export-file option' ) );
$script->initialize();

// Log in admin user
$user = eZUser::fetchByName( 'admin' );
if ( $user )
    eZUser::setCurrentlyLoggedInUser( $user, $user->attribute( 'id' ) );
else
{
    $cli->error( 'Could not fetch admin user object' );
    $script->shutdown( 1 );
    return;
}


// Do the update
if ( isset( $options['classid'] ) )
{
    //updateClass( $options['classid'] );
    $fixMissingObjectAttributes = new FixMissingObjectAttributes( $cli, $script, $options );

    $fixMissingObjectAttributes->run();
}
else
{
    $cli->error( 'Please supply the classid parameter' );
    $script->shutdown( 1 );
    return;
}

$script->shutdown();

?>
