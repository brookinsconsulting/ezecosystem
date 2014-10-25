<?php
/**
 * File containing the ezecosystem reset view count database entries for nodes with excessively large view count cronjob part
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$generatorWorkerScript = './extension/ezecosystem/bin/php/ezpresetviewcount.php';
$currentSiteAccess = $GLOBALS['eZCurrentAccess']['name'];
$options = "--siteaccess=$currentSiteAccess --classes=issue_post --threshold=20 --reset-number=0 --script-verbose --script-verbose-level=1";
$result = '';

passthru( "$generatorWorkerScript $options;", $result );

print_r( $result );

?>