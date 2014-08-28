<?php
/**
 * File containing the ChainConfigResolverPass class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * The ChainConfigResolverPass will register all services tagged as "ezpublish.config.resolver" to the chain config resolver.
 */
class ChainConfigResolverPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process( ContainerBuilder $container )
    {
        if ( !$container->hasDefinition( 'ezpublish.config.resolver.chain' ) )
            return;

        $chainResolver = $container->getDefinition( 'ezpublish.config.resolver.chain' );

        foreach ( $container->findTaggedServiceIds( 'ezpublish.config.resolver' ) as $id => $attributes )
        {
            $priority = isset( $attributes[0]['priority'] ) ? (int)$attributes[0]['priority'] : 0;
            // Priority range is between -255 (the lowest) and 255 (the highest)
            if ( $priority > 255 )
                $priority = 255;
            if ( $priority < -255 )
                $priority = -255;

            $chainResolver->addMethodCall(
                'addResolver',
                array(
                    new Reference( $id ),
                    $priority
                )
            );
        }
    }
}
