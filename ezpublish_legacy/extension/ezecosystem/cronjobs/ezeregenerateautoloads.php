<?php
/**
 * File containing the ezecosystem regenerate autolaods cronjob part
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or any later version)
 * @version //autogentag//
 * @package ezecosystem
 */

// General cronjob part options
$phpBin = '/usr/bin/env php';
$generatorWorkerScript = 'bin/php/ezpgenerateautoloads.php';
$options = '';
$result = '';

passthru( "$phpBin ./$generatorWorkerScript $options;", $result );

print_r( $result );

?>