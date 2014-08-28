<?php
// URI:       extension/ezwebin/design/ezwebin/templates/page_toppath.tpl
// Filename:  extension/ezwebin/design/ezwebin/templates/page_toppath.tpl
// Timestamp: 1333429649 (Tue Apr 3 0:07:29 CDT 2012)
$oldSetArray_2510d828259256178f516e8c9647dd3f = isset( $setArray ) ? $setArray : array();
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

$text .= '  <div id="path">
    ';
$textElements = array();
$tpl->processFunction( 'include', $textElements,
                       false,
                       array (
  'uri' => 
  array (
    0 => 
    array (
      0 => 6,
      1 => 
      array (
        0 => 'concat',
        1 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => 'design:parts/',
            2 => false,
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            0 => 4,
            1 => 
            array (
              0 => '',
              1 => 2,
              2 => 'pagedata',
            ),
            2 => false,
          ),
          1 => 
          array (
            0 => 5,
            1 => 
            array (
              0 => 
              array (
                0 => 3,
                1 => 'show_path',
                2 => false,
              ),
            ),
            2 => false,
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => '.tpl',
            2 => false,
          ),
        ),
      ),
      2 => false,
    ),
  ),
),
                       array (
  0 => 
  array (
    0 => 2,
    1 => 4,
    2 => 23,
  ),
  1 => 
  array (
    0 => 2,
    1 => 68,
    2 => 87,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/page_toppath.tpl',
),
                       $rootNamespace, $currentNamespace );
$text .= implode( '', $textElements );

$text .= '  </div>';

$setArray = $oldSetArray_2510d828259256178f516e8c9647dd3f;
$tpl->Level--;
?>
