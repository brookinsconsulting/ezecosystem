<?php
/**
 * File containing the SeeOther class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server\Values;

use eZ\Publish\Core\REST\Common\Value as RestValue;

class SeeOther extends RestValue
{
    public function __construct( $redirectUri )
    {
        $this->redirectUri = $redirectUri;
    }
}
