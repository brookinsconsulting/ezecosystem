<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 */

$Module = array( 'name' => 'eZFind', 'variable_params' => true );

$ViewList = array();
$ViewList['elevate'] = array(
    'functions' => array( 'elevate' ),
    'default_navigation_part' => 'ezfindnavigationpart',
    'ui_context' => 'administration',
    'script' => 'elevate.php',
    'params' => array(),
    'unordered_params' => array( 'language'     => 'Language',
                                 'offset'       => 'Offset',
                                 'limit'        => 'Limit',
                                 'search_query' => 'SearchQuery',
                                 'fuzzy_filter' => 'FuzzyFilter' )
                            );

$ViewList['elevation_detail'] = array(
    'functions' => array( 'elevate' ),
    'default_navigation_part' => 'ezfindnavigationpart',
    'ui_context' => 'administration',
    'script' => 'elevation_detail.php',
    'params' => array( 'ObjectID' ),
    'unordered_params' => array( 'language'     => 'Language',
                                 'offset'       => 'Offset',
                                 'limit'        => 'Limit',
                                 'search_query' => 'SearchQuery',
                                 'fuzzy_filter' => 'FuzzyFilter' )
                                    );

$ViewList['remove_elevation'] = array(
    'functions' => array( 'elevate' ),
    'default_navigation_part' => 'ezfindnavigationpart',
    'ui_context' => 'administration',
    'script' => 'remove_elevation.php',
    'params' => array( 'ObjectID', 'SearchQuery', 'LanguageCode' )
                                    );

$FunctionList = array();
$FunctionList['elevate'] = array();
?>
