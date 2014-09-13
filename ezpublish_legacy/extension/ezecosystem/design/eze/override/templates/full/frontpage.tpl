{* set scope=global persistent_variable=hash('left_menu', false(),
                                           'extra_menu', false(),
                                           'show_path', false())}

{def $frontpagestyle='noleftcolumn norightcolumn'}

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

{def $blogs_node_id=216
     $blogs_planetarium_id=970
     $blogs_community_id=969}

{* $blogs_node = fetch( 'content', 'node', hash( 'node_id', $blogs_node_id ) )
   $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $blogs_node_id) ) *}

<div class="content-view-full" style="width: 100%">
    <div class="class-frontpage {$frontpagestyle}">
    <div class="columns-frontpage float-break" style="padding: 0 200px 0 246px;">
        <div class="left-column-position" style="width: 586px; margin-left: -246px;">
            <div class="left-column" style="">
            <!-- Content: START -->

{include uri="design:parts/homepage.tpl" blogs_node_id=$blogs_node_id blogs_planetarium_id=$blogs_planetarium_id blogs_community_id=$blogs_community_id}

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
        <div class="right-column-position" style="">
            <div class="right-column" style="float:right">
            <!-- Content: START -->

{include uri="design:parts/blogs.tpl" blogs_node_id=$blogs_node_id}

{cache-block expiry=172800}

{include uri="design:parts/feed.tpl" blogs_node_id=$blogs_node_id}

{include uri="design:parts/community.tpl" blogs_planetarium_id=$blogs_community_id}

{include uri="design:parts/planetarium.tpl" blogs_planetarium_id=$blogs_planetarium_id}

{/cache-block}

{include uri="design:parts/popular.tpl" class_ids=array( 20, 45 )}

{cache-block expiry=172800}
{include uri="design:parts/twitter.tpl"}

{include uri="design:parts/tags.tpl" current_node_id=2}
{/cache-block}
            <!-- Content: END -->
            </div>
        </div>
    </div>

    <div class="attribute-bottom-column">
        {attribute_view_gui attribute=$node.object.data_map.bottom_column}
    </div>

    </div>
</div>



