<?php
/**
 * File containing the ezecosystem refresh home page static cache cronjob part
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$generatorWorkerScript = './extension/ezecosystem/bin/shell/refreshhomepagestaticcache.sh';
$currentSiteAccess = $GLOBALS['eZCurrentAccess']['name'];
$options = $currentSiteAccess;
$result = '';

passthru( "$generatorWorkerScript $options;", $result );

print_r( $result );

?>