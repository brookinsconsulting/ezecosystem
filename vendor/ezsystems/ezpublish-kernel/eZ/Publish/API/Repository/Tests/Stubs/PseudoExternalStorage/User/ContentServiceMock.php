<?php
/**
 * File containing the ContentServiceStub class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\API\Repository\Tests\Stubs\PseudoExternalStorage\User;

/**
 * Mock for the ContentService used in the User PseudoExternalStorage.
 *
 * This mock is used to load the User fixture without loading the related
 * ContentInfo objects.
 */
class ContentServiceMock
{
    /**
     * Loads content.
     *
     * @return void
     */
    public function loadContent()
    {
        return null;
    }
}

