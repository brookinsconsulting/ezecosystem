<?php
// URI:       extension/ezwebin/design/ezwebin/templates/page_head_script.tpl
// Filename:  extension/ezwebin/design/ezwebin/templates/page_head_script.tpl
// Timestamp: 1333429649 (Tue Apr 3 0:07:29 CDT 2012)
$oldSetArray_8c072d49891ff3c91a96cac77bc2b859 = isset( $setArray ) ? $setArray : array();
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

$text .= '
';
unset( $var );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'ezscript_load',
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
            0 => 6,
            1 => 
            array (
              0 => 'ezini',
              1 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'JavaScriptSettings',
                  2 => false,
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'JavaScriptList',
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
        2 => 
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
                  1 => 'JavaScriptSettings',
                  2 => false,
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  0 => 1,
                  1 => 'FrontendJavaScriptList',
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


$setArray = $oldSetArray_8c072d49891ff3c91a96cac77bc2b859;
$tpl->Level--;
?>
