<?php
/**
 * File containing the Root controller class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Controller;

use eZ\Publish\Core\REST\Common\Values;
use eZ\Publish\Core\REST\Server\Controller as RestController;

/**
 * Root controller
 */
class Root extends RestController
{
    /**
     * List the root resources of the eZ Publish installation
     *
     * @return \eZ\Publish\Core\REST\Common\Values\Root
     */
    public function loadRootResource()
    {
        return new Values\Root();
    }
}
