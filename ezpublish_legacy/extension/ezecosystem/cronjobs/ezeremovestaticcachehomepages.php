<?php
/**
 * File containing the ezecosystem remove home page static cache
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$phpBin = '/usr/bin/env php';
$generatorWorkerScriptPath = 'var/ezwebin_site/static/www.ezecosystem.org';
$generatorWorkerScriptStaticCacheHomePages = 'About/index.html About-eZ-Publish/index.html Forums/index.html GitHub/index.html Mirror/index.html Issues/index.html index.html';
$options = '';
$result = '';

passthru( "cd $generatorWorkerScriptPath && rm -vrf $generatorWorkerScriptStaticCacheHomePages $options;", $result );

print_r( $result );

?>