<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$site.http_equiv.Content-language|wash}" lang="{$site.http_equiv.Content-language|wash}">
<head>
{def $basket_is_empty   = cond( $current_user.is_logged_in, fetch( shop, basket ).is_empty, 1 )
     $user_hash         = concat( $current_user.role_id_list|implode( ',' ), ',', $current_user.limited_assignment_value_list|implode( ',' ) )}

{include uri='design:page_head_displaystyles.tpl'}

{if is_set( $extra_cache_key )|not}
    {def $extra_cache_key = ''}
{/if}

{cache-block keys=array( $module_result.uri, $basket_is_empty, $current_user.contentobject_id, $extra_cache_key )}
{def $pagedata         = ezpagedata()
     $pagestyle        = $pagedata.css_classes
     $locales          = fetch( 'content', 'translation_list' )
     $pagedesign       = $pagedata.template_look
     $current_node_id  = $pagedata.node_id
     $is_homepage      = $current_node_id|eq( ezini( 'NodeSettings', 'RootNode', 'content.ini' ) )
}

{include uri='design:page_head.tpl'}
{include uri='design:page_head_style.tpl'}
{include uri='design:page_head_script.tpl'}


<script type="text/javascript">
{literal}
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-280811-20', 'auto');
  ga('send', 'pageview');
{/literal}
</script>
</head>
{* To simplify IE css targeting. IE9 conforms, so threat as rest *}
<!--[if lt IE 7 ]><body class="ie6"><![endif]-->
<!--[if IE 7 ]>   <body class="ie7"><![endif]-->
<!--[if IE 8 ]>   <body class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--><body><!--<![endif]-->
<!-- Complete page area: START -->

<a name="top"></a>

<!-- Change between "sidemenu"/"nosidemenu" and "extrainfo"/"noextrainfo" to switch display of side columns on or off  -->
<div id="page" class="{$pagestyle}">

  {if and( is_set( $pagedata.persistent_variable.extra_template_list ),
             $pagedata.persistent_variable.extra_template_list|count() )}
    {foreach $pagedata.persistent_variable.extra_template_list as $extra_template}
      {include uri=concat('design:extra/', $extra_template)}
    {/foreach}
  {/if}

  <!-- Header area: START -->
  {include uri='design:page_header.tpl'}
  <!-- Header area: END -->

  {cache-block keys=array( $module_result.uri, $user_hash, $extra_cache_key )}

  <!-- Top menu area: START -->
  {if $pagedata.top_menu}
    {include uri='design:page_topmenu.tpl'}
  {/if}
  <!-- Top menu area: END -->

  <!-- Path area: START -->
  {if $pagedata.show_path}
    {include uri='design:page_toppath.tpl'}
  {/if}
  <!-- Path area: END -->

  <!-- Toolbar area: START -->
  {if and( $pagedata.website_toolbar, $pagedata.is_edit|not)}
    {include uri='design:page_toolbar.tpl'}
  {/if}
  <!-- Toolbar area: END -->

  <!-- Columns area: START -->
  <div id="columns-position">
  <div id="columns" class="float-break{if $is_homepage} homepage{/if}">

    <!-- Side menu area: START -->
    {if and( $pagedata.left_menu, $is_homepage|eq( false() ) )}
        {include uri='design:page_leftmenu.tpl'}
    {/if}
    <!-- Side menu area: END -->

  {/cache-block}
{/cache-block}
    <!-- Main area: START -->
    {include uri='design:page_mainarea.tpl'}
    <!-- Main area: END -->
{cache-block keys=array( $module_result.uri, $user_hash, $access_type.name, $extra_cache_key )}

    {if is_unset($pagedesign)}
        {def $pagedata   = ezpagedata()
             $pagedesign = $pagedata.template_look}
    {/if}

    <!-- Extra area: START -->
    {if $pagedata.extra_menu}
        {include uri='design:page_extramenu.tpl'}
    {/if}
    <!-- Extra area: END -->

  </div>
  </div>
  <!-- Columns area: END -->

  <!-- Footer area: START -->
  {include uri='design:page_footer.tpl'}
  <!-- Footer area: END -->

</div>
<!-- Complete page area: END -->

<!-- Footer script area: START -->
{include uri='design:page_footer_script.tpl'}
<!-- Footer script area: END -->

{/cache-block}

{* This comment will be replaced with actual debug report (if debug is on). *}
<!--DEBUG_REPORT-->
</body>
</html>