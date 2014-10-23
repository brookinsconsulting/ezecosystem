<?php
/**
 * File containing the generatestaticcache module configuration file, module.php
 *
 * @copyright Copyright (C) 1999 - 2015 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version //autogentag//
 * @package ezecosystem
 */

// Define module name
$Module = array( 'name' => 'Generate Static Cache' );

// Define module view and parameters
$ViewList = array();

// Define cache module view and parameters
$ViewList['cache'] = array(
                           'script' => 'cache.php',
                           'default_navigation_part' => 'ezsetupnavigationpart',
                           'params' => array() );

?>