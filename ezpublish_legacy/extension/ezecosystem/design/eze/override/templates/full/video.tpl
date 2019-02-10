{if and( $home_page_root_node_id|is_set|not, $blogs_planetarium_id|is_set|not, $blogs_community_id|is_set|not )}
{def $home_page_root_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $blogs_planetarium_id=ezini('NodeIDSettings','SidebarPlanetariumNodeID','ezecosystem.ini')
     $blogs_community_id=ezini('NodeIDSettings','SidebarCommunityNodeID','ezecosystem.ini')}
{/if}
{def $home_page_fetch_classes=ezini('MirrorHomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')
     $root_node_id=ezini('TreeMenu','RootNodeID','contentstructuremenu.ini')
     $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $node.node_id ) )}

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
        {*
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
        *}

            <div class="content-view-children">
                <div style='position: relative; padding-bottom: 56%; height: 0;'>
                    <iframe src='//app.viloud.tv/player/embed/channel/cf330c868addef03adc29d2dcaf7f0fa?autoplay=1&volume=1&controls=1&title=1&share=1&random=0' style='position: absolute; top: 0; left: 0; width: 100%; height: 100%;' frameborder='0' allow='autoplay' allowfullscreen></iframe>
                </div>
            </div>

        {if $node.object.data_map.description.has_content}
            <div class="attribute-long">
                {attribute_view_gui attribute=$node.data_map.description}
            </div>
        {/if}
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>