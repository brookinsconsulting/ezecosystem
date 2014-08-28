<?php
// URI:       design:content/keyword.tpl
// Filename:  extension/ezwebin/design/ezwebin/templates/content/keyword.tpl
// Timestamp: 1333429649 (Tue Apr 3 0:07:29 CDT 2012)
$oldSetArray_a4be2f0cedbfa68a2084fabc5cc1dc3c = isset( $setArray ) ? $setArray : array();
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

// def $page_limit
if ( $tpl->hasVariable( 'page_limit', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'page_limit' is already defined.", array (
  0 => 
  array (
    0 => 1,
    1 => 0,
    2 => 1,
  ),
  1 => 
  array (
    0 => 7,
    1 => 25,
    2 => 422,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/content/keyword.tpl',
) );
    $tpl->setVariable( 'page_limit', 20, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'page_limit', 20, $rootNamespace );
}

// def $list_count
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'alphabet', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['alphabet'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
unset( $var2 );
unset( $var2 );
$var2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'view_parameters', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['view_parameters'] : null;
$var3 = compiledFetchAttribute( $var2, 'classid' );
unset( $var2 );
$var2 = $var3;
if (! isset( $var2 ) ) $var2 = NULL;
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
$var = call_user_func_array( array( new eZContentFunctionCollection(), 'fetchKeywordCount' ),
  array(     'alphabet' => $var1,
    'classid' => $var2,
    'owner' => false,
    'parent_node_id' => false,
    'include_duplicates' => true,
    'strict_matching' => false ) );
$var = isset( $var['result'] ) ? $var['result'] : null;
unset( $var1, $var2 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( $tpl->hasVariable( 'list_count', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'list_count' is already defined.", array (
  0 => 
  array (
    0 => 1,
    1 => 0,
    2 => 1,
  ),
  1 => 
  array (
    0 => 7,
    1 => 25,
    2 => 422,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/content/keyword.tpl',
) );
    $tpl->setVariable( 'list_count', $var, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'list_count', $var, $rootNamespace );
}

// def $uniq_id
if ( $tpl->hasVariable( 'uniq_id', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'uniq_id' is already defined.", array (
  0 => 
  array (
    0 => 1,
    1 => 0,
    2 => 1,
  ),
  1 => 
  array (
    0 => 7,
    1 => 25,
    2 => 422,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/content/keyword.tpl',
) );
    $tpl->setVariable( 'uniq_id', 0, $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'uniq_id', 0, $rootNamespace );
}

// def $uniq_post
if ( $tpl->hasVariable( 'uniq_post', $rootNamespace ) )
{
    $tpl->warning( 'def', "Variable 'uniq_post' is already defined.", array (
  0 => 
  array (
    0 => 1,
    1 => 0,
    2 => 1,
  ),
  1 => 
  array (
    0 => 7,
    1 => 25,
    2 => 422,
  ),
  2 => 'extension/ezwebin/design/ezwebin/templates/content/keyword.tpl',
) );
    $tpl->setVariable( 'uniq_post', array (
), $rootNamespace );
}
else
{
    $tpl->setLocalVariable( 'uniq_post', array (
), $rootNamespace );
}

$text .= '
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc">

<div class="attribute-header">
    <h1 class="long">';
unset( $var );
unset( $var1 );
$var1 = 'Keyword: %keyword';
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var1Data = array( 'value' => $var1 );
$tpl->processOperator( 'i18n',
                       array (
  0 => 
  array (
    0 => 
    array (
      0 => 1,
      1 => 'design/ezwebin/content/keyword',
      2 => false,
    ),
  ),
  1 => 
  array (
  ),
  2 => 
  array (
    0 => 
    array (
      0 => 6,
      1 => 
      array (
        0 => 'hash',
        1 => 
        array (
          0 => 
          array (
            0 => 1,
            1 => '%keyword',
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
              2 => 'alphabet',
            ),
            2 => false,
          ),
        ),
      ),
      2 => false,
    ),
  ),
),
                       $rootNamespace, $currentNamespace, $var1Data, false, false );
$var1 = $var1Data['value'];
unset( $var1Data );
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
$var = htmlspecialchars( $var1 );
unset( $var1 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= $var;
unset( $var );

$text .= '</h1>
</div>

<table class="list" width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
    <th>Link</th>
    <th>Type</th>
</tr>';
// if begins
unset( $if_cond );
unset( $if_cond );
$if_cond = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'list_count', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['list_count'] : null;
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '    ';
// foreach begins
$skipDelimiter = true;
// creating sequence variables for \{foreach} loop
$foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 = array (
  0 => 'bgdark',
  1 => 'bglight',
);
$foreach_sequence_var_d78a6e943d50a878e8145e4ea5a466aa_1 = current( $foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 );

if ( !isset( $fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1 ) ) $fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1 = array();
$fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1[] = compact( 'fe_array_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_array_keys_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_n_items_processed_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_i_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_key_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_val_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_max_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_first_val_d78a6e943d50a878e8145e4ea5a466aa_1', 'fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1' );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'alphabet', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['alphabet'] : null;
if (! isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 ) ) $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 = NULL;
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11->templateValue();
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11->templateValue();
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'view_parameters', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['view_parameters'] : null;
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = compiledFetchAttribute( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12, 'classid' );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13;
if (! isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 ) ) $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 = NULL;
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12->templateValue();
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12->templateValue();
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'view_parameters', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['view_parameters'] : null;
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 = compiledFetchAttribute( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13, 'offset' );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14;
if (! isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 ) ) $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = NULL;
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13->templateValue();
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13->templateValue();
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 );
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'page_limit', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['page_limit'] : null;
if (! isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 ) ) $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 = NULL;
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14->templateValue();
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14->templateValue();
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 = call_user_func_array( array( new eZContentFunctionCollection(), 'fetchKeyword' ),
  array(     'alphabet' => $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11,
    'classid' => $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12,
    'offset' => $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13,
    'limit' => $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14,
    'owner' => false,
    'sort_by' => array(),
    'parent_node_id' => false,
    'include_duplicates' => true,
    'strict_matching' => false ) );
$fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 = isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1['result'] ) ? $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1['result'] : null;
unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_11, $fe_array_d78a6e943d50a878e8145e4ea5a466aa_12, $fe_array_d78a6e943d50a878e8145e4ea5a466aa_13, $fe_array_d78a6e943d50a878e8145e4ea5a466aa_14 );
if (! isset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 ) ) $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 = NULL;
while ( is_object( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 ) and method_exists( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1, 'templateValue' ) )
    $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1->templateValue();

$fe_array_keys_d78a6e943d50a878e8145e4ea5a466aa_1 = is_array( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 ) ? array_keys( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 ) : array();
$fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 = count( $fe_array_keys_d78a6e943d50a878e8145e4ea5a466aa_1 );
$fe_n_items_processed_d78a6e943d50a878e8145e4ea5a466aa_1 = 0;
$fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 = 0;
$fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 - $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1;
$fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1 = false;
if ( $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 < 0 || $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 >= $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 )
{
    $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 = ( $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 < 0 ) ? 0 : $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1;
    if ( $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 || $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 < 0 )
 {
        eZDebug::writeWarning("Invalid 'offset' parameter specified: '$fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1'. Array count: $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1");   
}
}
if ( $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 < 0 || $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 + $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 > $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 )
{
    if ( $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 < 0 )
 eZDebug::writeWarning("Invalid 'max' parameter specified: $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1");
    $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 - $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1;
}
if ( $fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1 )
{
    $fe_first_val_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 - 1 - $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1;
    $fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1  = 0;
}
else
{
    $fe_first_val_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1;
    $fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1  = $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 - 1;
}
// foreach
for ( $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_first_val_d78a6e943d50a878e8145e4ea5a466aa_1; $fe_n_items_processed_d78a6e943d50a878e8145e4ea5a466aa_1 < $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 && ( $fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1 ? $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1 >= $fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1 : $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1 <= $fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1 ); $fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1 ? $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1-- : $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1++ )
{
$fe_key_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_array_keys_d78a6e943d50a878e8145e4ea5a466aa_1[$fe_i_d78a6e943d50a878e8145e4ea5a466aa_1];
$fe_val_d78a6e943d50a878e8145e4ea5a466aa_1 = $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1[$fe_key_d78a6e943d50a878e8145e4ea5a466aa_1];
$vars[$rootNamespace]['keyword'] = $fe_val_d78a6e943d50a878e8145e4ea5a466aa_1;
// setting current sequence value
$vars[$rootNamespace]['style'] = $foreach_sequence_var_d78a6e943d50a878e8145e4ea5a466aa_1;
$text .= '    ';
unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'keyword', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['keyword'] : null;
$var1 = compiledFetchAttribute( $var, 'link_object' );
unset( $var );
$var = $var1;
$var1 = compiledFetchAttribute( $var, 'node_id' );
unset( $var );
$var = $var1;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'uniq_id', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['uniq_id'] = $var;
    unset( $var );
}
$text .= '    ';
// if begins
unset( $if_cond );
unset( $if_cond1 );
unset( $if_cond2 );
unset( $if_cond2 );
$if_cond2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'uniq_post', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['uniq_post'] : null;
if (! isset( $if_cond2 ) ) $if_cond2 = NULL;
while ( is_object( $if_cond2 ) and method_exists( $if_cond2, 'templateValue' ) )
    $if_cond2 = $if_cond2->templateValue();
unset( $if_cond3 );
unset( $if_cond3 );
$if_cond3 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'uniq_id', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['uniq_id'] : null;
if (! isset( $if_cond3 ) ) $if_cond3 = NULL;
while ( is_object( $if_cond3 ) and method_exists( $if_cond3, 'templateValue' ) )
    $if_cond3 = $if_cond3->templateValue();
if( is_string( $if_cond2 ) )
{
  $if_cond1 = ( strpos( $if_cond2, $if_cond3 ) !== false );
}
else if ( is_array( $if_cond2 ) )
{
  $if_cond1 = in_array( $if_cond3, $if_cond2 );
}
else
{
$if_cond1 = false;
}unset( $if_cond2, $if_cond3 );
if (! isset( $if_cond1 ) ) $if_cond1 = NULL;
while ( is_object( $if_cond1 ) and method_exists( $if_cond1, 'templateValue' ) )
    $if_cond1 = $if_cond1->templateValue();
$if_cond = !( $if_cond1 );
unset( $if_cond1 );
if (! isset( $if_cond ) ) $if_cond = NULL;
while ( is_object( $if_cond ) and method_exists( $if_cond, 'templateValue' ) )
    $if_cond = $if_cond->templateValue();

if ( $if_cond )
{
$text .= '        <tr class="';
unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'style', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['style'] : null;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$text .= ( is_object( $var ) ? compiledFetchText( $tpl, $rootNamespace, $currentNamespace, false, $var ) : $var );
unset( $var );

$text .= '">
        <td>
            <a href=';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'keyword', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['keyword'] : null;
$var2 = compiledFetchAttribute( $var1, 'link_object' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'object' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'main_node' );
unset( $var1 );
$var1 = $var2;
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

$text .= '>';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'keyword', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['keyword'] : null;
$var2 = compiledFetchAttribute( $var1, 'link_object' );
unset( $var1 );
$var1 = $var2;
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

$text .= '</a>
        </td>
        <td>
            ';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'keyword', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['keyword'] : null;
$var2 = compiledFetchAttribute( $var1, 'link_object' );
unset( $var1 );
$var1 = $var2;
$var2 = compiledFetchAttribute( $var1, 'class_name' );
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

$text .= '
        </td>
        </tr>
    ';
unset( $var );
unset( $var1 );
unset( $var1 );
$var1 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'uniq_id', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['uniq_id'] : null;
if (! isset( $var1 ) ) $var1 = NULL;
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
while ( is_object( $var1 ) and method_exists( $var1, 'templateValue' ) )
    $var1 = $var1->templateValue();
unset( $var2 );
unset( $var2 );
$var2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'uniq_post', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['uniq_post'] : null;
if (! isset( $var2 ) ) $var2 = NULL;
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
if ( is_string( $var2 ) )
    $var = $var2 . implode( '', array( $var1 ) );
else if( is_array( $var2 ) )
    $var = array_merge( $var2, array( $var1 ) );
unset( $var1, $var2 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
if ( array_key_exists( $currentNamespace, $vars ) && array_key_exists( 'uniq_post', $vars[$currentNamespace] ) )
{
    $vars[$currentNamespace]['uniq_post'] = $var;
    unset( $var );
}
$text .= '    ';
}
unset( $if_cond );
// if ends

$text .= '    ';
// sequence iteration
if ( ( $foreach_sequence_var_d78a6e943d50a878e8145e4ea5a466aa_1 = next( $foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 ) ) === false )
{
   reset( $foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 );
   $foreach_sequence_var_d78a6e943d50a878e8145e4ea5a466aa_1 = current( $foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 );
}

$fe_n_items_processed_d78a6e943d50a878e8145e4ea5a466aa_1++;
} // foreach
unset( $foreach_sequence_array_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $foreach_sequence_var_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $vars[$rootNamespace]['style'] );
$skipDelimiter = false;
if ( count( $fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1 ) ) extract( array_pop( $fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1 ) );

else
{

unset( $fe_array_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_array_keys_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_n_items_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_n_items_processed_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_i_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_key_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_val_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_offset_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_max_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_reverse_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_first_val_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_last_val_d78a6e943d50a878e8145e4ea5a466aa_1 );

unset( $fe_variable_stack_d78a6e943d50a878e8145e4ea5a466aa_1 );

}

// foreach ends
}
unset( $if_cond );
// if ends

$text .= '
</table>';
$oldRestoreIncludeArray_bca61ce64cfd7ff8eda9224002f8241d = isset( $restoreIncludeArray ) ? $restoreIncludeArray : array();
$restoreIncludeArray = array();

if ( isset( $namespace ) and isset( $vars[$namespace]['page_uri'] ) )
    $restoreIncludeArray[] = array( $namespace, 'page_uri', $vars[$namespace]['page_uri'] );
elseif ( !isset( $vars[( isset( $namespace ) ? $namespace : '' )]['page_uri'] ) ) 
    $restoreIncludeArray[] = array( ( isset( $namespace ) ? $namespace : '' ), 'page_uri', 'unset' );

unset( $var );
unset( $var2 );
unset( $var2 );
$var2 = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'alphabet', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['alphabet'] : null;
if (! isset( $var2 ) ) $var2 = NULL;
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
while ( is_object( $var2 ) and method_exists( $var2, 'templateValue' ) )
    $var2 = $var2->templateValue();
$var = ( '/content/keyword/' . $var2 );
unset( $var2 );
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$namespace = $currentNamespace;
if ( $namespace == '' )
    $namespace = "navigator";
else
    $namespace .= ':navigator';
$vars[$namespace]['page_uri'] = $var;
unset( $var );
if ( isset( $namespace ) and isset( $vars[$namespace]['item_count'] ) )
    $restoreIncludeArray[] = array( $namespace, 'item_count', $vars[$namespace]['item_count'] );
elseif ( !isset( $vars[( isset( $namespace ) ? $namespace : '' )]['item_count'] ) ) 
    $restoreIncludeArray[] = array( ( isset( $namespace ) ? $namespace : '' ), 'item_count', 'unset' );

unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'list_count', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['list_count'] : null;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$namespace = $currentNamespace;
if ( $namespace == '' )
    $namespace = "navigator";
else
    $namespace .= ':navigator';
$vars[$namespace]['item_count'] = $var;
unset( $var );
if ( isset( $namespace ) and isset( $vars[$namespace]['view_parameters'] ) )
    $restoreIncludeArray[] = array( $namespace, 'view_parameters', $vars[$namespace]['view_parameters'] );
elseif ( !isset( $vars[( isset( $namespace ) ? $namespace : '' )]['view_parameters'] ) ) 
    $restoreIncludeArray[] = array( ( isset( $namespace ) ? $namespace : '' ), 'view_parameters', 'unset' );

unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'view_parameters', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['view_parameters'] : null;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$namespace = $currentNamespace;
if ( $namespace == '' )
    $namespace = "navigator";
else
    $namespace .= ':navigator';
$vars[$namespace]['view_parameters'] = $var;
unset( $var );
if ( isset( $namespace ) and isset( $vars[$namespace]['item_limit'] ) )
    $restoreIncludeArray[] = array( $namespace, 'item_limit', $vars[$namespace]['item_limit'] );
elseif ( !isset( $vars[( isset( $namespace ) ? $namespace : '' )]['item_limit'] ) ) 
    $restoreIncludeArray[] = array( ( isset( $namespace ) ? $namespace : '' ), 'item_limit', 'unset' );

unset( $var );
unset( $var );
$var = ( array_key_exists( $rootNamespace, $vars ) and array_key_exists( 'page_limit', $vars[$rootNamespace] ) ) ? $vars[$rootNamespace]['page_limit'] : null;
if (! isset( $var ) ) $var = NULL;
while ( is_object( $var ) and method_exists( $var, 'templateValue' ) )
    $var = $var->templateValue();
$namespace = $currentNamespace;
if ( $namespace == '' )
    $namespace = "navigator";
else
    $namespace .= ':navigator';
$vars[$namespace]['item_limit'] = $var;
unset( $var );
if ( !isset( $dKeys ) )
{
    $resH = $tpl->resourceHandler( "design" );
    $dKeys = $resH->keys();
}

$resourceFound = false;
if ( file_exists( 'var/ezwebin_site/cache/template/compiled/google-5b72113042a7f92eccb90f6c858173e6.php' ) )
{
$resourceFound = true;
$namespaceStack[] = array( $rootNamespace, $currentNamespace );
$currentNamespace = $rootNamespace = !$currentNamespace ? 'navigator' : ( $currentNamespace . ':' . 'navigator' );
$tpl->createLocalVariablesList();
$tpl->appendTemplateFetch( 'extension/ezecosystem/design/eze/templates/navigator/google.tpl' );
include( '' . 'var/ezwebin_site/cache/template/compiled/google-5b72113042a7f92eccb90f6c858173e6.php' );
$tpl->unsetLocalVariables();
$tpl->destroyLocalVariablesList();
list( $rootNamespace, $currentNamespace ) = array_pop( $namespaceStack );
}
else
{
    $resourceFound = true;
$resourceFound = true;
$namespaceStack[] = array( $rootNamespace, $currentNamespace );
$currentNamespace = $rootNamespace = !$currentNamespace ? 'navigator' : ( $currentNamespace . ':' . 'navigator' );
$textElements = array();
$extraParameters = array();
$tpl->processURI( 'extension/ezecosystem/design/eze/templates/navigator/google.tpl', true, $extraParameters, $textElements, $rootNamespace, $currentNamespace );
$text .= implode( '', $textElements );
list( $rootNamespace, $currentNamespace ) = array_pop( $namespaceStack );
}

foreach ( $restoreIncludeArray as $element )
{
    if ( $element[2] === 'unset' )
    {
        unset( $vars[$element[0]][$element[1]] );
        continue;
    }
    $vars[$element[0]][$element[1]] = $element[2];
}
$restoreIncludeArray = $oldRestoreIncludeArray_bca61ce64cfd7ff8eda9224002f8241d;

$text .= '
</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>';

$setArray = $oldSetArray_a4be2f0cedbfa68a2084fabc5cc1dc3c;
$tpl->Level--;
?>
