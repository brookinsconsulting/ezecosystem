<?php
// URI:       design:menu/flat_top.tpl
// Filename:  extension/ezecosystem/design/eze/templates/menu/flat_top.tpl
// Timestamp: 1333771480 (Fri Apr 6 23:04:40 CDT 2012)
$oldSetArray_e8dddcde4f86964b5ce344f659279dc6 = isset( $setArray ) ? $setArray : array();
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

$text .= '<div class="topmenu-design">
    <!-- Top menu content: START -->
    <ul id="topmenu-firstlevel">
    ';
// def $root_node
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'pagedata', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['pagedata'] : null;
$var2 = compiledFetchAttribute( $var1, 'root_node' );
unset( $var1 );
$var1 = $var2;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var = call_user_func_array( array( new eZContentFunctionCollection(), 'fetchContentNode' ),
  array(     'node_id' => $var1,
    'node_path' => false,
    'language_code' => false,
    'remote_id' => false ) );
$var = isset( $var['result'] ) ? $var['result'] : null;
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( $tpl->hasVariable( 'root_node', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'root_node' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 4,
    2 => 104,
  ),
  1 => 
  array (
    0 => 11,
    1 => 80,
    2 => 797,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/menu/flat_top.tpl',
) );
    $tpl->setVariable( 'root_node', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'root_node', $var, $rootNamespace );
}

// def $top_menu_items
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'root_node', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['root_node'] : null;
$var2 = compiledFetchAttribute( $var1, 'node_id' );
unset( $var1 );
$var1 = $var2;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
unset( $var2 );
unset( $var2 );
$var2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'root_node', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['root_node'] : null;
$var3 = compiledFetchAttribute( $var2, 'sort_array' );
unset( $var2 );
$var2 = $var3;
if (! isset( $var2 ) ) $var2 = NULL;
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
$var = call_user_func_array( array( new eZContentFunctionCollection(), 'fetchObjectTree' ),
  array(     'parent_node_id' => $var1,
    'sort_by' => $var2,
    'only_translated' => false,
    'language' => false,
    'offset' => false,
    'limit' => false,
    'depth' => 1,
    'depth_operator' => "le",
    'class_id' => false,
    'attribute_filter' => false,
    'extended_attribute_filter' => false,
    'class_filter_type' => "include",
    'class_filter_array' => array( "folder",
       "feedback_form",
       "folder",
       "feedback_form",
       "gallery",
       "forum",
       "documentation_page",
       "forums",
       "event_calendar",
       "multicalendar",
       "link",
       "blog",
       "frontpage",
       "folder",
       "feedback_form",
       "gallery",
       "forum",
       "documentation_page",
       "forums",
       "event_calendar",
       "multicalendar",
       "link",
       "blog",
       "frontpage",
       "article" ),
    'group_by' => false,
    'main_node_only' => false,
    'ignore_visibility' => false,
    'limitation' => null,
    'as_object' => null,
    'objectname_filter' => null,
    'load_data_map' => null ) );
$var = isset( $var['result'] ) ? $var['result'] : null;
unset( $var1, $var2 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( $tpl->hasVariable( 'top_menu_items', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'top_menu_items' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 4,
    2 => 104,
  ),
  1 => 
  array (
    0 => 11,
    1 => 80,
    2 => 797,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/menu/flat_top.tpl',
) );
    $tpl->setVariable( 'top_menu_items', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'top_menu_items', $var, $rootNamespace );
}

// def $top_menu_items_count
unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'top_menu_items', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['top_menu_items'] : null;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$varData = array( 'value' => $var );
$tpl->processOperator( 'count',
                       array (
),
                       $rootNamespace, $currentNamespace, $varData, false, false );
$var = $varData['value'];
unset( $varData );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( $tpl->hasVariable( 'top_menu_items_count', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'top_menu_items_count' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 4,
    2 => 104,
  ),
  1 => 
  array (
    0 => 11,
    1 => 80,
    2 => 797,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/menu/flat_top.tpl',
) );
    $tpl->setVariable( 'top_menu_items_count', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'top_menu_items_count', $var, $rootNamespace );
}

// def $item_class
if ( $tpl->hasVariable( 'item_class', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'item_class' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 4,
    2 => 104,
  ),
  1 => 
  array (
    0 => 11,
    1 => 80,
    2 => 797,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/menu/flat_top.tpl',
) );
    $tpl->setVariable( 'item_class', array (
), $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'item_class', array (
), $rootNamespace );
}

// def $current_node_in_path
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( "pagedata", $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]["pagedata"] : null;
$var2 = compiledFetchAttribute( $var1, "path_array" );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 1 );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, "node_id" );
unset( $var1 );
$var1 = $var2;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();

if ( isset( $var1 ) )
{
    $var = $var1;
}
else
{
    $var = 0;
}
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( $tpl->hasVariable( 'current_node_in_path', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'current_node_in_path' is already defined.", array (
  0 => 
  array (
    0 => 4,
    1 => 4,
    2 => 104,
  ),
  1 => 
  array (
    0 => 11,
    1 => 80,
    2 => 797,
  ),
  2 => 'extension/ezecosystem/design/eze/templates/menu/flat_top.tpl',
) );
    $tpl->setVariable( 'current_node_in_path', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'current_node_in_path', $var, $rootNamespace );
}

$text .= '    ';
// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'top_menu_items_count', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['top_menu_items_count'] : null;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '
       ';
// foreach begins
$skipDelimiter = true;
if ( !isset( $fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7 ) ) $fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7 = array();
$fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7[] = compact( 'fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_array_keys_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_n_items_processed_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_key_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_val_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_first_val_ee9901d596b24fdae69e8bfd2beb30a3_7', 'fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7' );
unset( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 );
unset( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 );
$fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'top_menu_items', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['top_menu_items'] : null;
if (! isset( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 ) ) $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 = NULL;
while ( is_object( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 ) and method_exists( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7, 'templateValue' ) )
    $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7->templateValue();

$fe_array_keys_ee9901d596b24fdae69e8bfd2beb30a3_7 = is_array( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 ) ? array_keys( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 ) : array();
$fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 = count( $fe_array_keys_ee9901d596b24fdae69e8bfd2beb30a3_7 );
$fe_n_items_processed_ee9901d596b24fdae69e8bfd2beb30a3_7 = 0;
$fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 = 0;
$fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 - $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7;
$fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7 = false;
if ( $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 < 0 || $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 >= $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 )
{
    $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 = ( $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 < 0 ) ? 0 : $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7;
    if ( $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 || $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 < 0 )
 {
        eZDebug::writeWarning("Invalid 'offset' parameter specified: '$fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7'. Array count: $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7");   
}
}
if ( $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 < 0 || $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 + $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 > $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 )
{
    if ( $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 < 0 )
 eZDebug::writeWarning("Invalid 'max' parameter specified: $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7");
    $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 - $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7;
}
if ( $fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7 )
{
    $fe_first_val_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 - 1 - $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7;
    $fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7  = 0;
}
else
{
    $fe_first_val_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7;
    $fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7  = $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 - 1;
}
// foreach
for ( $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_first_val_ee9901d596b24fdae69e8bfd2beb30a3_7; $fe_n_items_processed_ee9901d596b24fdae69e8bfd2beb30a3_7 < $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 && ( $fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7 ? $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7 >= $fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7 : $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7 <= $fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7 ); $fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7 ? $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7-- : $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7++ )
{
$fe_key_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_array_keys_ee9901d596b24fdae69e8bfd2beb30a3_7[$fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7];
$fe_val_ee9901d596b24fdae69e8bfd2beb30a3_7 = $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7[$fe_key_ee9901d596b24fdae69e8bfd2beb30a3_7];
$vars[$rootNamespace]['item'] = $fe_val_ee9901d596b24fdae69e8bfd2beb30a3_7;
$vars[$rootNamespace]['key'] = $fe_key_ee9901d596b24fdae69e8bfd2beb30a3_7;
$text .= '

            

            ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond2 = compiledFetchAttribute( $if_cond1, 'data_map' );
unset( $if_cond1 );
$if_cond1 = $if_cond2;
$if_cond2 = compiledFetchAttribute( $if_cond1, 'exclude_from_top_menu' );
unset( $if_cond1 );
$if_cond1 = $if_cond2;
$if_cond2 = compiledFetchAttribute( $if_cond1, 'content' );
unset( $if_cond1 );
$if_cond1 = $if_cond2;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = ( ( $if_cond1 ) == ( 0 ) );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '
            ';
unset( $var );
unset( $var1 );
unset( $var2 );
unset( $var2 );
$var2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'current_node_in_path', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['current_node_in_path'] : null;
if (! isset( $var2 ) ) $var2 = NULL;
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
unset( $var3 );
unset( $var3 );
$var3 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var4 = compiledFetchAttribute( $var3, 'node_id' );
unset( $var3 );
$var3 = $var4;
if (! isset( $var3 ) ) $var3 = NULL;
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
$var1 = ( ( $var2 ) == ( $var3 ) );
unset( $var2, $var3 );
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
if ( $var1 )
{
    $var = array( "selected" );
}
else
{
    
    $var = array (
);
}
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'item_class', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['item_class'] = $var;
    unset( $var );
}
$text .= '            ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'key', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['key'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = ( ( $if_cond1 ) == ( 0 ) );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '                ';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
if ( is_string( $var1 ) )
    $var = $var1 . implode( '', array( "firstli" ) );
else if( is_array( $var1 ) )
    $var = array_merge( $var1, array( "firstli" ) );
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'item_class', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['item_class'] = $var;
    unset( $var );
}
$text .= '            ';
}
unset( $if_cond );
// if ends

$text .= '            ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'top_menu_items_count', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['top_menu_items_count'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
unset( $if_cond2 );
unset( $if_cond3 );
unset( $if_cond3 );
$if_cond3 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'key', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['key'] : null;
if (! isset( $if_cond3 ) ) $if_cond3 = NULL;
while ( is_object( $if_cond3 ) and method_exists( $if_cond3, 'templateValue' ) )
    $if_cond3 = $if_cond3->templateValue();
$if_cond2 = $if_cond3 + 1;
unset( $if_cond3 );
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
$text .= '                ';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
if ( is_string( $var1 ) )
    $var = $var1 . implode( '', array( "lastli" ) );
else if( is_array( $var1 ) )
    $var = array_merge( $var1, array( "lastli" ) );
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'item_class', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['item_class'] = $var;
    unset( $var );
}
$text .= '            ';
}
unset( $if_cond );
// if ends

$text .= '            ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond2 = compiledFetchAttribute( $if_cond1, 'node_id' );
unset( $if_cond1 );
$if_cond1 = $if_cond2;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
unset( $if_cond2 );
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'current_node_id', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['current_node_id'] : null;
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
$text .= '                ';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
if ( is_string( $var1 ) )
    $var = $var1 . implode( '', array( "current" ) );
else if( is_array( $var1 ) )
    $var = array_merge( $var1, array( "current" ) );
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'item_class', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['item_class'] = $var;
    unset( $var );
}
$text .= '            ';
}
unset( $if_cond );
// if ends

$text .= '
            ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond2 = compiledFetchAttribute( $if_cond1, 'class_identifier' );
unset( $if_cond1 );
$if_cond1 = $if_cond2;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = ( ( $if_cond1 ) == ( 'link' ) );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '                <li id="node_id_';
unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var1 = compiledFetchAttribute( $var, 'node_id' );
unset( $var );
$var = $var1;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= ( is_object( $var ) ? compiledFetchText( $tpl, $rootNamespace, $currentNamespace, false, $var ) : $var );
unset( $var );

$text .= '"';
// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= ' class="';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var = implode( " ", $var1 );unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '"';
}
unset( $if_cond );
// if ends

$text .= '><div><a ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'ui_context', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['ui_context'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = ( ( $if_cond1 ) == ( 'browse' ) );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= 'href=';
unset( $var );
unset( $var1 );
unset( $var3 );
unset( $var3 );
$var3 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var4 = compiledFetchAttribute( $var3, 'node_id' );
unset( $var3 );
$var3 = $var4;
if (! isset( $var3 ) ) $var3 = NULL;
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
$var1 = ( 'content/browse/' . $var3 );
unset( $var3 );
if (! isset( $var1 ) ) $var1 = NULL;
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

}
else
{
$text .= 'href=';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'data_map' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'location' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'content' );
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

// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond2 );
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'data_map' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'open_in_new_window' );
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
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'data_map' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'open_in_new_window' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
$if_cond3 = compiledFetchAttribute( $if_cond2, 'data_int' );
unset( $if_cond2 );
$if_cond2 = $if_cond3;
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
$text .= ' target="_blank"';
}
unset( $if_cond );
// if ends

}
unset( $if_cond );
// if ends

// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'pagedata', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['pagedata'] : null;
$if_cond1 = compiledFetchAttribute( $if_cond, 'is_edit' );
unset( $if_cond );
$if_cond = $if_cond1;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= ' onclick="return false;"';
}
unset( $if_cond );
// if ends

$text .= ' title="';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'data_map' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'location' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'data_text' );
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

$text .= '" class="menu-item-link" rel=';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'url_alias' );
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

$text .= '><span>';
// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$if_cond1 = compiledFetchAttribute( $if_cond, 'data_map' );
unset( $if_cond );
$if_cond = $if_cond1;
$if_cond1 = compiledFetchAttribute( $if_cond, 'location' );
unset( $if_cond );
$if_cond = $if_cond1;
$if_cond1 = compiledFetchAttribute( $if_cond, 'data_text' );
unset( $if_cond );
$if_cond = $if_cond1;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'data_map' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'location' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'data_text' );
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

}
else
{
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'name' );
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

}
unset( $if_cond );
// if ends

$text .= '</span></a></div></li>
            ';
}
else
{
$text .= '                <li id="node_id_';
unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var1 = compiledFetchAttribute( $var, 'node_id' );
unset( $var );
$var = $var1;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= ( is_object( $var ) ? compiledFetchText( $tpl, $rootNamespace, $currentNamespace, false, $var ) : $var );
unset( $var );

$text .= '"';
// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= ' class="';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item_class', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item_class'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var = implode( " ", $var1 );unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '"';
}
unset( $if_cond );
// if ends

$text .= '><div><a href=';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond1 );
$if_cond1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'ui_context', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['ui_context'] : null;
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = ( ( $if_cond1 ) == ( 'browse' ) );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
unset( $var );
unset( $var1 );
unset( $var3 );
unset( $var3 );
$var3 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var4 = compiledFetchAttribute( $var3, 'node_id' );
unset( $var3 );
$var3 = $var4;
if (! isset( $var3 ) ) $var3 = NULL;
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
while ( is_object( $var3 ) and method_exists( $var3, 'templateValue' ) )
    $var3 = $var3->templateValue();
$var1 = ( 'content/browse/' . $var3 );
unset( $var3 );
if (! isset( $var1 ) ) $var1 = NULL;
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

}
else
{
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'url_alias' );
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

}
unset( $if_cond );
// if ends

// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'pagedata', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['pagedata'] : null;
$if_cond1 = compiledFetchAttribute( $if_cond, 'is_edit' );
unset( $if_cond );
$if_cond = $if_cond1;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= ' onclick="return false;"';
}
unset( $if_cond );
// if ends

$text .= '><span>';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'item', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['item'] : null;
$var2 = compiledFetchAttribute( $var1, 'name' );
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

$text .= '</span></a></div></li>
            ';
}
unset( $if_cond );
// if ends

$text .= '            ';
}
unset( $if_cond );
// if ends

$text .= '          ';
$fe_n_items_processed_ee9901d596b24fdae69e8bfd2beb30a3_7++;
} // foreach
$skipDelimiter = false;
if ( count( $fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7 ) ) extract( array_pop( $fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7 ) );

else
{

unset( $fe_array_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_array_keys_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_n_items_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_n_items_processed_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_i_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_key_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_val_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_offset_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_max_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_reverse_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_first_val_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_last_val_ee9901d596b24fdae69e8bfd2beb30a3_7 );

unset( $fe_variable_stack_ee9901d596b24fdae69e8bfd2beb30a3_7 );

}

// foreach ends
$text .= '    ';
}
unset( $if_cond );
// if ends

$text .= '    ';
// undef $root_node
$tpl->unsetLocalVariable( 'root_node', $rootNamespace );

// undef $top_menu_items
$tpl->unsetLocalVariable( 'top_menu_items', $rootNamespace );

// undef $item_class
$tpl->unsetLocalVariable( 'item_class', $rootNamespace );

// undef $top_menu_items_count
$tpl->unsetLocalVariable( 'top_menu_items_count', $rootNamespace );

// undef $current_node_in_path
$tpl->unsetLocalVariable( 'current_node_in_path', $rootNamespace );

$text .= '    </ul>
    <!-- Top menu content: END -->
</div>';

$setArray = $oldSetArray_e8dddcde4f86964b5ce344f659279dc6;
$tpl->Level--;
?>
