<?php
/**
 * File containing the HttpClient interface
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Publish\Core\Persistence\Solr\Content\Search\Gateway;

/**
 * Interface for Http Client implementations
 */
interface HttpClient
{
    /**
     * Execute a HTTP request to the remote server
     *
     * Returns the result from the remote server.
     *
     * @param string $method
     * @param string $path
     * @param \eZ\Publish\Core\Persistence\Solr\Content\Search\Gateway\Message $message
     *
     * @return \eZ\Publish\Core\Persistence\Solr\Content\Search\Gateway\Message
     */
    public function request( $method, $path, Message $message = null );
}
