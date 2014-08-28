<?php
// URI:       extension/ezecosystem/design/eze/templates/page_head_style.tpl
// Filename:  extension/ezecosystem/design/eze/templates/page_head_style.tpl
// Timestamp: 1333141908 (Fri Mar 30 16:11:48 CDT 2012)
$oldSetArray_7ad34b022c5db2adf06fb573fb6f91b2 = isset( $setArray ) ? $setArray : array();
$setArray = array();
$tpl->Level++;
if ( $tpl->Level > 40 )
{
$text = $tpl->MaxLevelWarning;$tpl->Level--;
return;
}
$eZTemplateCompilerCodeDate = 1074699607;
if ( !defined( 'EZ_TEMPLATE_COMPILER_COMMON_CODE' ) )
include_once( 'var/ezwebin_site/cache/template/compiled/common.php' );

// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'load_css_file_list', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['load_css_file_list'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = !isset( $if_cond1 );unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '    ';
// def $load_css_file_list
if ( $tpl->hasVariable( 'load_css_file_list', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'load_css_file_list' is already defined.", array (
  0 => 
  array (
    0 => 2,
    1 => 4,
    2 => 42,
  ),
  1 => 
  array (
    0 => 2,
    1 => 36,
    2 => 74,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/page_head_style.tpl',
) );
    $tpl->setVariable( 'load_css_file_list', true, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'load_css_file_list', true, $rootNamespace );
}

}
unset( $if_cond );
// if ends

// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'load_css_file_list', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['load_css_file_list'] : null;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '  ';
unset( $var );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'ezcss_load',
                       array (
  0 => 
  array (
    0 => 
    array (
      0 => 6,
      1 => 
      array (
        0 => 'array',
        1 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'core.css',
            2 => false,
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'debug.css',
            2 => false,
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'pagelayout.css',
            2 => false,
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'content.css',
            2 => false,
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'websitetoolbar.css',
            2 => false,
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            0 => 6,
            1 => 
            array (
              0 => 'ezini',
              1 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'StylesheetSettings',
                  2 => false,
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'CSSFileList',
                  2 => false,
                ),
              ),
              3 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'design.ini',
                  2 => false,
                ),
              ),
            ),
            2 => false,
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            0 => 6,
            1 => 
            array (
              0 => 'ezini',
              1 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'StylesheetSettings',
                  2 => false,
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'FrontendCSSFileList',
                  2 => false,
                ),
              ),
              3 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'design.ini',
                  2 => false,
                ),
              ),
            ),
            2 => false,
          ),
        ),
      ),
      2 => false,
    ),
  ),
),
                       $rootNamespace, $currentNamespace, $varData, false, false );
$var = $varData['value'];
unset( $varData );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= ( is_object( $var ) ? compiledFetchText( $tpl, $rootNamespace, $currentNamespace, false, $var ) : $var );
unset( $var );

}
else
{
$text .= '  ';
unset( $var );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'ezcss_load',
                       array (
  0 => 
  array (
    0 => 
    array (
      0 => 6,
      1 => 
      array (
        0 => 'array',
        1 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'core.css',
            2 => false,
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'debug.css',
            2 => false,
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'pagelayout.css',
            2 => false,
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'content.css',
            2 => false,
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'websitetoolbar.css',
            2 => false,
          ),
        ),
      ),
      2 => false,
    ),
  ),
),
                       $rootNamespace, $currentNamespace, $varData, false, false );
$var = $varData['value'];
unset( $varData );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= ( is_object( $var ) ? compiledFetchText( $tpl, $rootNamespace, $currentNamespace, false, $var ) : $var );
unset( $var );

}
unset( $if_cond );
// if ends

$text .= '
<link rel="stylesheet" type="text/css" href="/var/storage/packages/eZ-systems/ezwebin_design_cleangray/files/default/file/classes-colors.css" />
<link rel="stylesheet" type="text/css" href="/var/storage/packages/eZ-systems/ezwebin_design_cleangray/files/default/file/site-colors.css" />
<link rel="stylesheet" type="text/css" href="/extension/ezwebin/design/ezwebin/stylesheets/print.css" media="print" />
<!-- IE conditional comments; for bug fixes for different IE versions -->
<!--[if IE 5]>     <style type="text/css"> @import url(/extension/ezwebin/design/ezwebin/stylesheets/browsers/ie5.css);    </style> <![endif]-->
<!--[if lte IE 7]> <style type="text/css"> @import url(/extension/ezwebin/design/ezwebin/stylesheets/browsers/ie7lte.css); </style> <![endif]-->
<link rel="stylesheet" type="text/css" href="/extension/ezecosystem/design/eze/stylesheets/override.css" />

';

$setArray = $oldSetArray_7ad34b022c5db2adf06fb573fb6f91b2;
$tpl->Level--;
?>
