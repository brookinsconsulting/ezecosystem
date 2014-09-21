<?php
/**
 * File containing the ezecosystem image alias image variation image file regenerate cronjob part
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$phpBin = '/usr/bin/php';
$generatorWorkerScript = 'extension/ezecosystem/bin/shell/fetchandrefeshsyndicatedcontent.sh';
$options = '';
$result = false;

passthru( "$phpBin ./$generatorWorkerScript $options;", $result );

print_r( $result );

?>