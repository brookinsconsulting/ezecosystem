<?php
// URI:       extension/ezwebin/design/ezwebin/templates/page_header_languages.tpl
// Filename:  extension/ezwebin/design/ezwebin/templates/page_header_languages.tpl
// Timestamp: 1333429649 (Tue Apr 3 0:07:29 CDT 2012)
$oldSetArray_7c5d73f22732dff077703f4f3a968855 = isset( $setArray ) ? $setArray : array();
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

$text .= '<div id="languages">
    <ul>
    ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond2 );
$namespace = $rootNamespace;
if ( $namespace == '' )
    $namespace = "DesignKeys";
else
    $namespace .= ':DesignKeys';
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $namespace, $vars ) and array_key_exists( 'used', $vars[$namespace] ) ) ? $vars[$namespace]['used'] : null;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'url_alias' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
if (! isset( $if_cond2 ) ) $if_cond2 = NULL;
while ( is_object( $if_cond2 ) and method_exists( $if_cond2, 'templateValue' ) )
    $if_cond2 = $if_cond2->templateValue();
$if_cond1 = isset( $if_cond2 );unset( $if_cond2 );
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
unset( $if_cond2 );
unset( $if_cond3 );
$namespace = $rootNamespace;
if ( $namespace == '' )
    $namespace = "DesignKeys";
else
    $namespace .= ':DesignKeys';
unset( $if_cond3 );
$if_cond3 = ( array_key_exists( $namespace, $vars ) and array_key_exists( 'used', $vars[$namespace] ) ) ? $vars[$namespace]['used'] : null;
$if_cond4 = compiledFetchAttribute( $if_cond3, 'url_alias' );
unset( $if_cond3 );
$if_cond3 = $if_cond4;
if (! isset( $if_cond3 ) ) $if_cond3 = NULL;
while ( is_object( $if_cond3 ) and method_exists( $if_cond3, 'templateValue' ) )
    $if_cond3 = $if_cond3->templateValue();
$if_cond3Data = array( 'value' => $if_cond3 );
$tpl->processOperator( 'count',
                       array (
),
                       $rootNamespace, $currentNamespace, $if_cond3Data, false, false );
$if_cond3 = $if_cond3Data['value'];
unset( $if_cond3Data );
if (! isset( $if_cond3 ) ) $if_cond3 = NULL;
while ( is_object( $if_cond3 ) and method_exists( $if_cond3, 'templateValue' ) )
    $if_cond3 = $if_cond3->templateValue();
$if_cond2 = ( ( $if_cond3 ) >= ( 1 ) );
unset( $if_cond3 );
if (! isset( $if_cond2 ) ) $if_cond2 = NULL;
while ( is_object( $if_cond2 ) and method_exists( $if_cond2, 'templateValue' ) )
    $if_cond2 = $if_cond2->templateValue();
if ( !$if_cond1 )
    $if_cond = false;
else if ( !$if_cond2 )
    $if_cond = false;
else
    $if_cond = $if_cond2;
unset( $if_cond1, $if_cond2 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '        ';
// def $avail_translation
unset( $var );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'language_switcher',
                       array (
  0 => 
  array (
    0 => 
    array (
      0 => 4,
      1 => 
      array (
        0 => 'DesignKeys',
        1 => 2,
        2 => 'used',
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
          1 => 'url_alias',
          2 => false,
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
if ( $tpl->hasVariable( 'avail_translation', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'avail_translation' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 8,
    2 => 132,
  ),
  1 => 
  array (
    0 => 4,
    1 => 80,
    2 => 204,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/page_header_languages.tpl',
) );
    $tpl->setVariable( 'avail_translation', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'avail_translation', $var, $rootNamespace );
}

$text .= '    ';
}
else
{
$text .= '        ';
// def $avail_translation
unset( $var );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'language_switcher',
                       array (
  0 => 
  array (
    0 => 
    array (
      0 => 4,
      1 => 
      array (
        0 => '',
        1 => 2,
        2 => 'site',
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
          1 => 'uri',
          2 => false,
        ),
      ),
      2 => false,
    ),
    2 => 
    array (
      0 => 5,
      1 => 
      array (
        0 => 
        array (
          0 => 3,
          1 => 'original_uri',
          2 => false,
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
if ( $tpl->hasVariable( 'avail_translation', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'avail_translation' is already defined.", array (
  0 => 
  array (
    0 => 6,
    1 => 8,
    2 => 226,
  ),
  1 => 
  array (
    0 => 6,
    1 => 75,
    2 => 293,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/page_header_languages.tpl',
) );
    $tpl->setVariable( 'avail_translation', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'avail_translation', $var, $rootNamespace );
}

$text .= '    ';
}
unset( $if_cond );
// if ends

$text .= '    ';
// foreach begins
$skipDelimiter = true;
if ( !isset( $fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6 ) ) $fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6 = array();
$fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6[] = compact( 'fe_array_65eab94fa08f961243669b6b2d7bf636_6', 'fe_array_keys_65eab94fa08f961243669b6b2d7bf636_6', 'fe_n_items_65eab94fa08f961243669b6b2d7bf636_6', 'fe_n_items_processed_65eab94fa08f961243669b6b2d7bf636_6', 'fe_i_65eab94fa08f961243669b6b2d7bf636_6', 'fe_key_65eab94fa08f961243669b6b2d7bf636_6', 'fe_val_65eab94fa08f961243669b6b2d7bf636_6', 'fe_offset_65eab94fa08f961243669b6b2d7bf636_6', 'fe_max_65eab94fa08f961243669b6b2d7bf636_6', 'fe_reverse_65eab94fa08f961243669b6b2d7bf636_6', 'fe_first_val_65eab94fa08f961243669b6b2d7bf636_6', 'fe_last_val_65eab94fa08f961243669b6b2d7bf636_6' );
unset( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 );
unset( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 );
$fe_array_65eab94fa08f961243669b6b2d7bf636_6 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'avail_translation', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['avail_translation'] : null;
if (! isset( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 ) ) $fe_array_65eab94fa08f961243669b6b2d7bf636_6 = NULL;
while ( is_object( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 ) and method_exists( $fe_array_65eab94fa08f961243669b6b2d7bf636_6, 'templateValue' ) )
    $fe_array_65eab94fa08f961243669b6b2d7bf636_6 = $fe_array_65eab94fa08f961243669b6b2d7bf636_6->templateValue();

$fe_array_keys_65eab94fa08f961243669b6b2d7bf636_6 = is_array( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 ) ? array_keys( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 ) : array();
$fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 = count( $fe_array_keys_65eab94fa08f961243669b6b2d7bf636_6 );
$fe_n_items_processed_65eab94fa08f961243669b6b2d7bf636_6 = 0;
$fe_offset_65eab94fa08f961243669b6b2d7bf636_6 = 0;
$fe_max_65eab94fa08f961243669b6b2d7bf636_6 = $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 - $fe_offset_65eab94fa08f961243669b6b2d7bf636_6;
$fe_reverse_65eab94fa08f961243669b6b2d7bf636_6 = false;
if ( $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 < 0 || $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 >= $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 )
{
    $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 = ( $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 < 0 ) ? 0 : $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6;
    if ( $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 || $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 < 0 )
 {
        eZDebug::writeWarning("Invalid 'offset' parameter specified: '$fe_offset_65eab94fa08f961243669b6b2d7bf636_6'. Array count: $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6");   
}
}
if ( $fe_max_65eab94fa08f961243669b6b2d7bf636_6 < 0 || $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 + $fe_max_65eab94fa08f961243669b6b2d7bf636_6 > $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 )
{
    if ( $fe_max_65eab94fa08f961243669b6b2d7bf636_6 < 0 )
 eZDebug::writeWarning("Invalid 'max' parameter specified: $fe_max_65eab94fa08f961243669b6b2d7bf636_6");
    $fe_max_65eab94fa08f961243669b6b2d7bf636_6 = $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 - $fe_offset_65eab94fa08f961243669b6b2d7bf636_6;
}
if ( $fe_reverse_65eab94fa08f961243669b6b2d7bf636_6 )
{
    $fe_first_val_65eab94fa08f961243669b6b2d7bf636_6 = $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 - 1 - $fe_offset_65eab94fa08f961243669b6b2d7bf636_6;
    $fe_last_val_65eab94fa08f961243669b6b2d7bf636_6  = 0;
}
else
{
    $fe_first_val_65eab94fa08f961243669b6b2d7bf636_6 = $fe_offset_65eab94fa08f961243669b6b2d7bf636_6;
    $fe_last_val_65eab94fa08f961243669b6b2d7bf636_6  = $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 - 1;
}
// foreach
for ( $fe_i_65eab94fa08f961243669b6b2d7bf636_6 = $fe_first_val_65eab94fa08f961243669b6b2d7bf636_6; $fe_n_items_processed_65eab94fa08f961243669b6b2d7bf636_6 < $fe_max_65eab94fa08f961243669b6b2d7bf636_6 && ( $fe_reverse_65eab94fa08f961243669b6b2d7bf636_6 ? $fe_i_65eab94fa08f961243669b6b2d7bf636_6 >= $fe_last_val_65eab94fa08f961243669b6b2d7bf636_6 : $fe_i_65eab94fa08f961243669b6b2d7bf636_6 <= $fe_last_val_65eab94fa08f961243669b6b2d7bf636_6 ); $fe_reverse_65eab94fa08f961243669b6b2d7bf636_6 ? $fe_i_65eab94fa08f961243669b6b2d7bf636_6-- : $fe_i_65eab94fa08f961243669b6b2d7bf636_6++ )
{
$fe_key_65eab94fa08f961243669b6b2d7bf636_6 = $fe_array_keys_65eab94fa08f961243669b6b2d7bf636_6[$fe_i_65eab94fa08f961243669b6b2d7bf636_6];
$fe_val_65eab94fa08f961243669b6b2d7bf636_6 = $fe_array_65eab94fa08f961243669b6b2d7bf636_6[$fe_key_65eab94fa08f961243669b6b2d7bf636_6];
$vars[$rootNamespace]['lang'] = $fe_val_65eab94fa08f961243669b6b2d7bf636_6;
$vars[$rootNamespace]['siteaccess'] = $fe_key_65eab94fa08f961243669b6b2d7bf636_6;
$text .= '        <li';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'siteaccess', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['siteaccess'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
unset( $if_cond2 );
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'access_type', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['access_type'] : null;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'name' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
if (! isset( $if_cond2 ) ) $if_cond2 = NULL;
while ( is_object( $if_cond2 ) and method_exists( $if_cond2, 'templateValue' ) )
    $if_cond2 = $if_cond2->templateValue();
$if_cond = ( ( $if_cond1 ) == ( $if_cond2 ) );
unset( $if_cond1, $if_cond2 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= ' class="current_siteaccess"';
}
unset( $if_cond );
// if ends

$text .= '><a href=';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'lang', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['lang'] : null;
$var2 = compiledFetchAttribute( $var1, 'url' );
unset( $var1 );
$var1 = $var2;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();

eZURI::transformURI( $var1, false, eZURI::getTransformURIMode() );
$var1 = '"' . $var1 . '"';
$var = $var1;
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '>';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'lang', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['lang'] : null;
$var2 = compiledFetchAttribute( $var1, 'text' );
unset( $var1 );
$var1 = $var2;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var = htmlspecialchars( $var1 );
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '</a></li>
    ';
$fe_n_items_processed_65eab94fa08f961243669b6b2d7bf636_6++;
} // foreach
$skipDelimiter = false;
if ( count( $fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6 ) ) extract( array_pop( $fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6 ) );

else
{

unset( $fe_array_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_array_keys_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_n_items_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_n_items_processed_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_i_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_key_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_val_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_offset_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_max_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_reverse_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_first_val_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_last_val_65eab94fa08f961243669b6b2d7bf636_6 );

unset( $fe_variable_stack_65eab94fa08f961243669b6b2d7bf636_6 );

}

// foreach ends
$text .= '    </ul>
</div>';

$setArray = $oldSetArray_7c5d73f22732dff077703f4f3a968855;
$tpl->Level--;
?>
