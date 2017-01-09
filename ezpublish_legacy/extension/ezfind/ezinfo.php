<?php
//
// ## BEGIN COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
// SOFTWARE NAME: eZ Find
// SOFTWARE RELEASE: 5.3.0
// COPYRIGHT NOTICE: Copyright (C) 1999-2014 eZ Systems AS
// SOFTWARE LICENSE: eZ Trial and Test License Agreement Version 2.0
// NOTICE: >
//  This source file is part of the eZ Publish CMS and is
//  licensed under the terms and conditions of the eZ Trial and
//  Test License v2.0 (eZ TTL).
//
//  A copy of the eZ TTL was included with the software. If the
//  license is missing, request a copy of the license via email
//  at license@ez.no or via postal mail at
// 	Attn: Licensing Dept. eZ Systems AS, Klostergata 30, N-3732 Skien, Norway
//
//  IMPORTANT: THE SOFTWARE IS LICENSED, NOT SOLD. ADDITIONALLY, THE
//  SOFTWARE IS LICENSED "AS IS," WITHOUT ANY WARRANTIES WHATSOEVER.
//  READ THE eZ TTL BEFORE USING, INSTALLING OR MODIFYING THE SOFTWARE.

// ## END COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
//

/*! \file ezinfo.php
*/

/*!
  \class eZFindInfo ezinfo.php
  \brief The class eZFindInfo does

*/

class eZFindInfo
{
    static function info()
    {
        return array(
            'Name' => "eZ Find",
            'Version' => '5.3.0',
            'Copyright' => "Copyright (C) 1999-2014 eZ Systems AS.",
            'Info_url' => "http://ez.no/ezfind",
            'License' => "eZ Trial and Test License Agreement Version 2.0",
            '3rdparty_software' =>
                            array ( 'name' => 'Solr',
                                    'Version' => '4.7.0',
                                    'copyright' => 'The Apache Software Foundation.',
                                    'license' => 'Apache License, Version 2.0',
                                    'info_url' => 'http://lucene.apache.org/solr/' ) );
    }
}

?>
