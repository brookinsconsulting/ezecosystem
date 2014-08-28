<?php
/**
 * File containing the REST Server Controller class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\REST\Server;

use eZ\Publish\Core\REST\Common\UrlHandler\eZPublish as UrlHandler;
use eZ\Publish\Core\REST\Common\Input\Dispatcher as InputDispatcher;
use eZ\Publish\Core\REST\Server\Request as HttpRequest;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

abstract class Controller
{
    /**
     * @var \eZ\Publish\Core\REST\Server\Request
     */
    protected $request;

    /**
     * @var \eZ\Publish\Core\REST\Common\Input\Dispatcher
     */
    protected $inputDispatcher;

    /**
     * @var \eZ\Publish\Core\REST\Common\UrlHandler\eZPublish
     */
    protected $urlHandler;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    public function setInputDispatcher( InputDispatcher $inputDispatcher )
    {
        $this->inputDispatcher = $inputDispatcher;
    }

    public function setUrlHandler( UrlHandler $urlHandler )
    {
        $this->urlHandler = $urlHandler;
    }

    public function setRequest( HttpRequest $request )
    {
        $this->request = $request;
    }

    public function setContainer( Container $container )
    {
        $this->container = $container;
    }
}
