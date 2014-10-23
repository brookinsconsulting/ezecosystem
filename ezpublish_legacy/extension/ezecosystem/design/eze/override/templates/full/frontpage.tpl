{def $root_node_id=ezini('TreeMenu','RootNodeID','contentstructuremenu.ini')
     $mirror_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $blogs_planetarium_id=ezini('NodeIDSettings','SidebarPlanetariumNodeID','ezecosystem.ini')
     $blogs_community_id=ezini('NodeIDSettings','SidebarCommunityNodeID','ezecosystem.ini')
     $popular_class_ids=ezini('PopularSidebarSettings','ClassIDs','ezecosystem.ini')
     $github_node_id=ezini( 'NodeIDSettings', 'GitHubNodeID', 'ezecosystem.ini' )
     $issues_node_id=ezini( 'NodeIDSettings', 'IssuesNodeID', 'ezecosystem.ini' )}

{set scope=global persistent_variable=hash('left_menu', false(),
                                           'extra_menu', false(),
                                           'show_path', true())}

{* def $frontpagestyle='noleftcolumn norightcolumn'}

{if $node.object.data_map.left_column.has_content}
    {set $frontpagestyle='leftcolumn norightcolumn'}
{/if}

{if eq( $frontpagestyle, 'leftcolumn norightcolumn')}
    {if $node.object.data_map.right_column.has_content}
        {set $frontpagestyle='leftcolumn rightcolumn'}
    {/if}
{else}    
    {if $node.object.data_map.right_column.has_content}
        {set $frontpagestyle='noleftcolumn rightcolumn'}
    {/if}
{/if}

<div class="content-view-full">
    <div class="class-frontpage {$frontpagestyle}">

{if $node.object.data_map.billboard.has_content}
    <div class="attribute-billboard">
        {content_view_gui view=billboard content_object=$node.object.data_map.billboard.content}
    </div>
{/if}

    <div class="columns-frontpage float-break">
        <div class="left-column-position">
            <div class="left-column">
            <!-- Content: START -->
                   {attribute_view_gui attribute=$node.object.data_map.left_column}
            <!-- Content: END -->
            </div>
        </div>
        <div class="center-column-position">
            <div class="center-column float-break">
                <div class="overflow-fix">
                <!-- Content: START -->
                    {attribute_view_gui attribute=$node.object.data_map.center_column}
                <!-- Content: END -->
                </div>
            </div>
        </div>
        <div class="right-column-position">
            <div class="right-column">
            <!-- Content: START -->
                  {attribute_view_gui attribute=$node.object.data_map.right_column}
            <!-- Content: END -->
            </div>
        </div>
    </div>

    <div class="attribute-bottom-column">
        {attribute_view_gui attribute=$node.object.data_map.bottom_column}
    </div>

    </div>
</div>
*}
{* def $blogs_node = fetch( 'content', 'node', hash( 'node_id', $mirror_node_id ) )
   $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $mirror_node_id) ) *}

<div class="content-view-full">
    <div class="class-frontpage {$frontpagestyle}">
    <div class="columns-frontpage float-break">
        <div class="left-column-position">
            <div class="left-column">
            <!-- Content: START -->

{if $node.node_id|eq( $github_node_id )}
{def $home_page_fetch_classes=ezini('GitHomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')
     $home_page_exclude_parent_content=ezini('HomePageFetchSettings','ExcludeParentPathString','ezecosystem.ini')}
{include uri="design:parts/homepage.tpl" home_page_root_node_id=$github_node_id home_page_fetch_classes=$home_page_fetch_classes home_page_exclude_parent_content=$home_page_exclude_parent_content current_node_id=$node.node_id blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id}
{elseif $node.node_id|eq( $issues_node_id )}
{def $home_page_fetch_classes=array( 'issue_post' )}
{include uri="design:parts/homepage.tpl" home_page_root_node_id=$issues_node_id home_page_fetch_classes=$home_page_fetch_classes home_page_exclude_parent_content=$home_page_exclude_parent_content current_node_id=$node.node_id blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id}
{else}
{def $home_page_fetch_classes=ezini('HomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')}
{include uri="design:parts/homepage.tpl" home_page_root_node_id=$mirror_node_id home_page_fetch_classes=$home_page_fetch_classes current_node_id=$node.node_id blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id}
{/if}
            <!-- Content: END -->
            </div>
        </div>
{*
        <div class="center-column-position">
            <div class="center-column float-break">
                <div class="overflow-fix">
                <!-- Content: START -->
                    {attribute_view_gui attribute=$node.object.data_map.center_column}
                <!-- Content: END -->
                </div>
            </div>
        </div>
*}
        <div class="right-column-position">
            <div class="right-column">
            <!-- Content: START -->

{include uri="design:parts/sources.tpl" mirror_node_id=$mirror_node_id current_node_id=$node.node_id github_node_id=$github_node_id}

{cache-block expiry=172800}

{include uri="design:parts/feed.tpl" mirror_node_id=$mirror_node_id}

{include uri="design:parts/community.tpl" blogs_planetarium_id=$blogs_community_id}

{include uri="design:parts/planetarium.tpl" blogs_planetarium_id=$blogs_planetarium_id}

{/cache-block}

{cache-block expiry=14400}
{include uri="design:parts/popular.tpl" class_ids=$popular_class_ids}
{/cache-block}

{cache-block expiry=172800}
{include uri="design:parts/twitter.tpl"}

{include uri="design:parts/tags.tpl" current_node_id=$root_node_id}
{/cache-block}
            <!-- Content: END -->
            </div>
        </div>
    </div>

    {*
    <div class="attribute-bottom-column">
        {attribute_view_gui attribute=$node.object.data_map.bottom_column}
    </div>
    *}
    </div>
</div>
