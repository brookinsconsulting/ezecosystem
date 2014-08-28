<?php
/**
 * File containing the ImageSize class.
 *
 * @copyright Copyright (C) 2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */
namespace eZ\Publish\Core\FieldType\Tests\MetadataHandler;

use eZ\Publish\Core\IO\FileService;
use eZ\Publish\Core\IO\MetadataHandler\ImageSize as ImageSizeMetadataHandler;

/**
 * @group fieldType
 * @group ezimage
 */
class ImageSizeTest extends \PHPUnit_Framework_TestCase
{
    public function testExtract()
    {
        $metadataHandler = new ImageSizeMetadataHandler;
        $file = 'eZ/Publish/Core/Repository/Tests/Service/Integration/ezplogo.png';
        self::assertEquals(
            array( 'width' => 189, 'height' => 200, 'mime' => 'image/png' ),
            $metadataHandler->extract( $file )
        );
    }
}
