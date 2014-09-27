{if and( $home_page_root_node_id|is_set|not, $blogs_planetarium_id|is_set|not, $blogs_community_id|is_set|not )}
{def $home_page_root_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $blogs_planetarium_id=ezini('NodeIDSettings','SidebarPlanetariumNodeID','ezecosystem.ini')
     $blogs_community_id=ezini('NodeIDSettings','SidebarCommunityNodeID','ezecosystem.ini')}
{/if}
{def $home_page_fetch_classes=ezini('GitHomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')
     $github_node_id=ezini( 'NodeIDSettings', 'GitHubNodeID', 'ezecosystem.ini' )}
{def $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $node.node_id ) )}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full">
    <div class="class-folder">

        {if $rss_export}
        <div class="attribute-rss-icon">
            <a href="{concat( '/rss/feed/', $rss_export.access_url )|ezurl( 'no' )}" title="{$rss_export.title|wash()}"><img src="{'rss-icon.gif'|ezimage( 'no' )}" alt="{$rss_export.title|wash()}" /></a>
        </div>
        {/if}

        <div class="attribute-header">
            <h1>{attribute_view_gui attribute=$node.data_map.name}</h1>
        </div>

        {if eq( ezini( 'folder', 'SummaryInFullView', 'content.ini' ), 'enabled' )}
            {if $node.object.data_map.short_description.has_content}
                <div class="attribute-short">
                    {attribute_view_gui attribute=$node.data_map.short_description}
                </div>
            {/if}
        {/if}

        {if $node.object.data_map.description.has_content}
            <div class="attribute-long">
                {attribute_view_gui attribute=$node.data_map.description}
            </div>
        {/if}

        {if $node.object.data_map.show_children.data_int}
        {include uri="design:parts/homepage.tpl" home_page_root_node_id=$github_node_id home_page_fetch_classes=$home_page_fetch_classes home_page_exclude_parent_content=ezini('HomePageFetchSettings','ExcludeParentPathString','ezecosystem.ini') blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id}
        {/if}
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>