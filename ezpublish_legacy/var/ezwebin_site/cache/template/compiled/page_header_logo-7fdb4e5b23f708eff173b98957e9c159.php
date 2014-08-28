<?php
// URI:       extension/ezecosystem/design/eze/templates/page_header_logo.tpl
// Filename:  extension/ezecosystem/design/eze/templates/page_header_logo.tpl
// Timestamp: 1409052462 (Tue Aug 26 6:27:42 CDT 2014)
$oldSetArray_87562da7308b3f81e64113a2788a740a = isset( $setArray ) ? $setArray : array();
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

$text .= '<div id="logo">
    <a href="/" title="';
unset( $var );
$var = 'eZecosystem' ;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '"><img src="/extension/ezecosystem/design/eze/images/eZecosystem.png" title="eZecosystem : An eZ Publish Community Planet" alt="eZecosystem : An eZ Publish Community Planet" width="327" height="107"></a>


</div>';

$setArray = $oldSetArray_87562da7308b3f81e64113a2788a740a;
$tpl->Level--;
?>
