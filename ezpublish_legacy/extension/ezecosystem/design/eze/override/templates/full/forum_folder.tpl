{if and( $mirror_node_id|is_set|not, $blogs_planetarium_id|is_set|not, $blogs_community_id|is_set|not )}
{def $mirror_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $blogs_planetarium_id=ezini('NodeIDSettings','SidebarPlanetariumNodeID','ezecosystem.ini')
     $blogs_community_id=ezini('NodeIDSettings','SidebarCommunityNodeID','ezecosystem.ini')}
{/if}
{* def $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $node.node_id ) ) *}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full">
    <div class="class-folder">

        {* if $rss_export}
        <div class="attribute-rss-icon">
            <a href="{concat( '/rss/feed/', $rss_export.access_url )|ezurl( 'no' )}" title="{$rss_export.title|wash()}"><img src="{'rss-icon.gif'|ezimage( 'no' )}" alt="{$rss_export.title|wash()}" /></a>
        </div>
        {/if *}

        <div class="attribute-header">
            {if $node.class_identifier|eq( 'forum' )}
            <h1>{attribute_view_gui attribute=$node.data_map.name}</h1>
            {else}
            <h1>{attribute_view_gui attribute=$node.data_map.title}</h1>
            {/if}
        </div>

        {if $node.object.data_map.description.has_content}
            <div class="attribute-long">
                {attribute_view_gui attribute=$node.data_map.description}
            </div>
        {/if}

{include uri="design:parts/homepage.tpl" home_page_root_node_id=$node.node_id blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id home_page_fetch_classes=array( 'forum_topic' )}

{*
            {def $page_limit = 10
                 $classes = ezini( 'MenuContentSettings', 'ExtraIdentifierList', 'menu.ini' )
                 $children = array()
                 $children_count = ''}
                 
            {if le( $node.depth, '3')}
                {set $classes = $classes|merge( ezini( 'ChildrenNodeList', 'ExcludedClasses', 'content.ini' ) )}
            {/if}

            {set $children_count=fetch_alias( 'children_count', hash( 'parent_node_id', $node.node_id,
                                                                      'class_filter_type', 'exclude',
                                                                      'class_filter_array', $classes ) )}

            <div class="content-view-children">
                {if $children_count}
                    {foreach fetch_alias( 'children', hash( 'parent_node_id', $node.node_id,
                                                            'offset', $view_parameters.offset,
                                                            'sort_by', $node.sort_array,
                                                            'class_filter_type', 'exclude',
                                                            'class_filter_array', $classes,
                                                            'limit', $page_limit ) ) as $child }
                        {node_view_gui view='line' content_node=$child}
                    {/foreach}
                {/if}
            </div>

            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=$node.url_alias
                     item_count=$children_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}
*}

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>