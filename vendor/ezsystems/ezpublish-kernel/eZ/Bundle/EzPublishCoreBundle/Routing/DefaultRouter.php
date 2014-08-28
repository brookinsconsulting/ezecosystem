<?php
/**
 * File containing the DefaultRouter class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishCoreBundle\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Extension of Symfony default router implementing RequestMatcherInterface
 */
class DefaultRouter extends Router implements RequestMatcherInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request The request to match
     *
     * @return array An array of parameters
     *
     * @throws ResourceNotFoundException If no matching resource could be found
     * @throws MethodNotAllowedException If a matching resource was found but the request method is not allowed
     */
    public function matchRequest( Request $request )
    {
        if ( $request->attributes->has( 'semanticPathinfo' ) )
        {
            return $this->match( $request->attributes->get( 'semanticPathinfo' ) );
        }

        return $this->match( $request->getPathInfo() );
    }
}
