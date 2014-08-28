<?php
/**
 * File containing the FieldTemplates class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\Parser;

class FieldTemplates extends Templates
{
    const NODE_KEY = "field_templates";
    const INFO = "Template settings for fields rendered by the ez_render_field() Twig function";
    const INFO_TEMPLATE_KEY = "Template file where to find block definition to display fields";
}
