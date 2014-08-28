<?php
/**
 * File containing the RestEvents class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishRestBundle;

final class RestEvents
{
    /**
     * The REST_CSRF_TOKEN_VALIDATED event occurs after CSRF token has been validated as correct.
     */
    const REST_CSRF_TOKEN_VALIDATED = 'ezpublish.rest.csrf_token_validated';
}
