<?php
//
// Template Operators - Autoloads (From: eZ Community - extension for eZ Publish)
// Author: Jan Kudlicka <jk@grenlandweb.no>
// Copyright (C) 2009 Grenland Web AS, http://grenlandweb.no/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of version 2.0 of the GNU General
// Public License as published by the Free Software Foundation.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
// MA 02110-1301, USA.
//

$eZTemplateOperatorArray = array();

$operators = array(
    'eztagcloud' => 'eZTagCloud',
    'eztagcloud_new' => 'eZTagCloud',
);

foreach ( $operators as $operatorName => $operatorClass )
{
    $eZTemplateOperatorArray[$operatorName] = array(
        'script' => 'extension/ezecosystem/classes/operators/' . strtolower( $operatorClass ) . '.php',
        'class' => $operatorClass,
        'operator_names' => array( $operatorName )
    );
}

?>
