<?php
/**
 * Extended attribute filter interface
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @author bchoquet
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.4.0
 * @package ezfind
 */
interface eZFindExtendedAttributeFilterInterface
{
    /**
     * Modifies SolR query params according to filter parameters
     * The returned array is merged with global SolR query
     * @param array $queryParams
     * @param array $filterParams
     * @return array $queryParams
     */
    public function filterQueryParams( array $queryParams, array $filterParams );

}