<?php
/**
 * File containing the ParameterProviderTest class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\MVC\Symfony\FieldType\Tests\Page;

use eZ\Publish\Core\MVC\Symfony\FieldType\Page\ParameterProvider;

class ParameterProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers eZ\Publish\Core\MVC\Symfony\FieldType\Page\ParameterProvider::getViewParameters
     */
    public function testGetViewParameters()
    {
        $pageService = $this->getMock( 'eZ\\Publish\\Core\\FieldType\\Page\\PageService' );
        $field = $this->getMock( 'eZ\\Publish\\API\\Repository\\Values\\Content\\Field' );
        $parameterProvider = new ParameterProvider( $pageService );
        $this->assertSame(
            array( 'pageService' => $pageService ),
            $parameterProvider->getViewParameters( $field )
        );
    }
}
