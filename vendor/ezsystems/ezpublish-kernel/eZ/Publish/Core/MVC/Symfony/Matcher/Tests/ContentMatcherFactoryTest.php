<?php
/**
 * File containing the ContentMatcherFactoryTest class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version 2014.07.0
 */

namespace eZ\Publish\Core\MVC\Symfony\Matcher\Tests;

class ContentMatcherFactoryTest extends ContentBasedMatcherFactoryTest
{
    protected $matcherFactoryClass = 'eZ\\Publish\\Core\\MVC\\Symfony\\Matcher\\ContentMatcherFactory';

    /**
     * Returns a valid ValueObject (supported by current MatcherFactory), that will match the test rules.
     * i.e. Should return eZ\Publish\API\Repository\Values\Content\Location for LocationMatcherFactory
     *
     * @return \eZ\Publish\API\Repository\Values\ValueObject
     */
    protected function getMatchableValueObject()
    {
        return $this->getContentInfoMock( array( 'id' => 456 ) );
    }

    /**
     * Returns a valid ValueObject (supported by current MatcherFactory), that won't match the test rules.
     * i.e. Should return eZ\Publish\API\Repository\Values\Content\Location for LocationMatcherFactory
     *
     * @return \eZ\Publish\API\Repository\Values\ValueObject
     */
    protected function getNonMatchableValueObject()
    {
        return $this->getContentInfoMock( array( 'id' => 123456789 ) );
    }

    protected function getMatcherClass()
    {
        return 'Id\\Content';
    }
}
