<?php
/**
 * File containing the HttpCache purge client class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Publish\Core\MVC\Symfony\Cache\Http;

use eZ\Publish\Core\MVC\Symfony\Cache\PurgeClientInterface;
use eZ\Publish\Core\MVC\ConfigResolverInterface;
use Buzz\Browser;
use Buzz\Client\BatchClientInterface;
use Buzz\Listener\BasicAuthListener;
use Buzz\Util\Url;

class PurgeClient implements PurgeClientInterface
{
    /**
     * Array of URIs to be purged
     *
     * @var string[]
     */
    protected $locationIds;

    /**
     * Servers that will be used to purge HTTP cache.
     * Each server consists in a full URL (e.g. http://localhost/foo/bar)
     *
     * @var mixed
     */
    protected $purgeServers;

    /**
     * @var \Buzz\Browser
     */
    protected $httpBrowser;

    public function __construct( ConfigResolverInterface $configResolver, Browser $httpBrowser )
    {
        $this->httpBrowser = $httpBrowser;
        $this->purgeServers = $configResolver->getParameter( 'http_cache.purge_servers' );
    }

    /**
     * Prepares the request authentication based on Url components (username:password)
     *
     * @param mixed $url
     */
    protected function prepareUserAuth( $url )
    {
        if ( !$url instanceof Url )
            $url = new Url( $url );

        if ( $url->getUser() )
        {
            $authListener = new BasicAuthListener( $url->getUser(), $url->getPassword() );
            $this->httpBrowser->setListener( $authListener );
        }
    }

    /**
     * Triggers the cache purge $cacheElements.
     *
     * @param mixed $locationIds Cache resource(s) to purge (array of locationId to purge in the reverse proxy)
     *
     * @return void
     */
    public function purge( $locationIds )
    {
        if ( empty( $locationIds ) )
            return;

        if ( !is_array( $locationIds ) )
            $locationIds = array( $locationIds );

        // Purging all HTTP gateways
        foreach ( $this->purgeServers as $server )
        {
            $this->doPurge( $server, $locationIds );

            $client = $this->httpBrowser->getClient();
            if ( $client instanceof BatchClientInterface )
                $client->flush();
        }
    }

    /**
     * Effectively triggers the purge.
     * Sends one HTTP PURGE request per location Id.
     * Used request header is X-Location-Id.
     *
     * @param string $server Current purge server (e.g. http://localhost/foo/bar)
     * @param array $locationIds Location Ids to purge
     *
     * @return void
     */
    protected function doPurge( $server, array $locationIds )
    {
        $this->prepareUserAuth( $server );

        foreach ( $locationIds as $locationId )
        {
            $this->httpBrowser->call( $server, 'PURGE', array( 'X-Location-Id' => $locationId ) );
        }
    }

    /**
     * Purges all content elements currently in cache.
     *
     * @return void
     */
    public function purgeAll()
    {
        foreach ( $this->purgeServers as $server )
        {
            $this->prepareUserAuth( $server );

            $this->httpBrowser->call( $server, 'PURGE', array( 'X-Location-Id' => '*' ) );

            $client = $this->httpBrowser->getClient();
            if ( $client instanceof BatchClientInterface )
                $client->flush();
        }
    }
}
