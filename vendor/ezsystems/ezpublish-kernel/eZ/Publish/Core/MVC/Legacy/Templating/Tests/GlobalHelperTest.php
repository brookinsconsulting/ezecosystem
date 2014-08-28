<?php
/**
 * File containing the GlobalHelperTest class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Legacy\Templating\Tests;

use eZ\Publish\Core\MVC\Legacy\Templating\GlobalHelper;
use eZ\Publish\Core\MVC\Symfony\Templating\Tests\GlobalHelperTest as BaseGlobalHelperTest;

class GlobalHelperTest extends BaseGlobalHelperTest
{
    protected function setUp()
    {
        parent::setUp();

        // Force to use Legacy GlobalHelper
        $this->helper = new GlobalHelper( $this->container );
    }

    public function testGetLegacy()
    {
        $this->container
            ->expects( $this->once() )
            ->method( 'get' )
            ->with( 'ezpublish_legacy.templating.legacy_helper' )
            ->will(
                $this->returnValue( $this->getMock( 'eZ\\Publish\\Core\\MVC\\Legacy\\Templating\\LegacyHelper' ) )
            );

        $this->helper->getLegacy();
    }
}
