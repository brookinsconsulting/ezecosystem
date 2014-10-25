<?php
/**
 * File containing the ezecosystem remove view count database entries for nodes no longer in database cronjob part
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$generatorWorkerScript = './extension/ezecosystem/bin/php/ezpremoveviewcountformissingnodes.php';
$currentSiteAccess = $GLOBALS['eZCurrentAccess']['name'];
$options = "--siteaccess=$currentSiteAccess --classIDs=45 --sectionIDs=11";
$result = '';

passthru( "$generatorWorkerScript $options;", $result );

print_r( $result );

?>