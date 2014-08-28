<?php
/**
 * File containing the EsiFragmentRenderer class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU General Public License v2.0
 * @version 
 */

namespace eZ\Bundle\EzPublishCoreBundle\Fragment;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer as BaseRenderer;

class EsiFragmentRenderer extends BaseRenderer
{
    /**
     * @var FragmentUriGenerator
     */
    private $fragmentUriGenerator;

    protected function generateFragmentUri( ControllerReference $reference, Request $request )
    {
        if ( !isset( $this->fragmentUriGenerator ) )
        {
            $this->fragmentUriGenerator = new FragmentUriGenerator;
        }

        $this->fragmentUriGenerator->generateFragmentUri( $reference, $request );
        return parent::generateFragmentUri( $reference, $request );
    }
}
