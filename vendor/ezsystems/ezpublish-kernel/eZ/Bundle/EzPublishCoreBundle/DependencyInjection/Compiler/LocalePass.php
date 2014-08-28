<?php
/**
 * File containing the LocalePass class.
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
 * This compiler pass will tweak the locale_listener service.
 */
class LocalePass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @throws \LogicException
     */
    public function process( ContainerBuilder $container )
    {
        if ( !$container->hasDefinition( 'locale_listener' ) )
            return;

        $localeListenerDef = $container->getDefinition( 'locale_listener' );
        // Injecting the service container for lazy loading purpose, since all event listeners are instantiated before events are triggered
        $localeListenerDef->addMethodCall( 'setServiceContainer', array( new Reference( 'service_container' ) ) );
        $localeListenerDef->addMethodCall( 'setLocaleConverter', array( new Reference( 'ezpublish.locale.converter' ) ) );
    }
}
