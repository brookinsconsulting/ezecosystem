<?php
/**
 * File contains: Test class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\Base\Tests\Configuration\Parser\Ini;

use eZ\Publish\Core\Base\Configuration\Parser\Ini as IniParser;

/**
 * Test case for Parser\Ini class
 */
class EzcTest extends Base
{
    public function getParser()
    {
        return new IniParser(
            array( 'IniParserStrict' => false )
        );
    }
}
