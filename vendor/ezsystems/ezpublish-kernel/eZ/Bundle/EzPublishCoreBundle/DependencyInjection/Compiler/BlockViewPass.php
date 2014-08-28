<?php
/**
 * File containing the BlockViewPass class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Compiler;

/**
 * The BlockViewPass adds DIC compiler pass related to block view.
 * This includes adding BlockViewProvider implementations.
 *
 * @see \eZ\Publish\Core\MVC\Symfony\View\Manager
 */
class BlockViewPass extends ViewPass
{
    const VIEW_PROVIDER_IDENTIFIER = "ezpublish.block_view_provider";
    const ADD_VIEW_PROVIDER_METHOD = "addBlockViewProvider";
}
