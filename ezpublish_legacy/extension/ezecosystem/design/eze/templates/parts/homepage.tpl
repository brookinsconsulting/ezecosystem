{def $page_limit = 30
     $blogs_count = 0
     $uniq_id = 0
     $uniq_post = array()
     $blogs_node = fetch( 'content', 'node', hash( 'node_id', $blogs_node_id ) )}

{*   $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $blogs_node_id) ) *}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full">
    <div class="class-folder">

        {* if $rss_export}
        <div class="attribute-rss-icon">
            <a href="{concat( '/rss/feed/', $rss_export.access_url )|ezurl( 'no' )}" title="{$rss_export.title|wash()}"><img src="{'rss-icon.gif'|ezimage( 'no' )}" alt="{$rss_export.title|wash()}" /></a>
        </div>
        {/if}

        <div class="attribute-header">
            <h1>{attribute_view_gui attribute=$blogs_node.data_map.name}</h1>
        </div>

        {if eq( ezini( 'folder', 'SummaryInFullView', 'content.ini' ), 'enabled' )}
            {if $blogs_node.object.data_map.short_description.has_content}
                <div class="attribute-short">
                    {attribute_view_gui attribute=$blogs_node.data_map.short_description}
                </div>
            {/if}
        {/if}
	*}

        {if $blogs_node.object.data_map.description.has_content}
            <div class="attribute-long">
                {attribute_view_gui attribute=$blogs_node.data_map.description}
            </div>
        {/if}

{if $view_parameters.tag}
    {set $blogs_count = fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                                 'classid', 'blog_post' ) )}
    {if $blogs_count}
        {foreach fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', 'blog_post',
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), 'blog_post/publication_date' ),
                                                    'limit', $page_limit ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
{else}
        {* if $blogs_node.object.data_map.show_children.data_int *}
            {def $classes = array( 'blog_post' ) 
                 $children_count = ''
		 $sort_array_attribute = array( 'attribute', false(), 'blog_post/publication_date' )
		 $sort_array_published = array( 'published', false() )
		 $sort_array = $sort_array_attribute
                 $children = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_node_id,
                                                             'class_filter_type', 'include',
                                                             'class_filter_array', $classes,
							     'language', 'eng-US',
                                                             'offset', $view_parameters.offset,
                                                             'sort_by', $sort_array,
						             'depth', 2,
                                                             'limit', $page_limit ) )}

            {* ezini( 'MenuContentSettings', 'ExtraIdentifierList', 'menu.ini' ) *}
                 
            {* if le( $blogs_node.depth, '3')}
                {set $classes = $classes|merge( ezini( 'ChildrenNodeList', 'ExcludedClasses', 'content.ini' ) )}
            {/if *}

            {set $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $blogs_node.node_id,
                                                                       'class_filter_type', 'include',
                                                                       'class_filter_array', $classes,
                                                                       'language', 'eng-US',
								       'depth', 2 ) )}

            <div style="margin-top:6px;margin-bottom:8px;">
	    {if $node.node_id|eq( 2 )}
	    {def $currentPageUri=''}
	    {else}
	    {def $currentPageUri=concat( '/', $node.url )}
	    {/if}

            <div style="padding-bottom: 10px;"><hr /><span class="underline">New</span>! Checkout our new issues homepage with the latest issue ticket changes. Click the 'Issues' menu item above to follow the progress of the latest changes to eZ Publish!<hr /></div>

            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=concat('http://', ezsys( 'hostname' ), $currentPageUri )|ezurl(no)
                     item_count=$children_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}</div>

            <div class="content-view-children">
                {if $children_count}
                    {foreach $children as $child}
                        {node_view_gui view='line' content_node=$child}
                    {/foreach}
                {/if}
            </div>
{/if}

            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=concat('http://', ezsys( 'hostname' ), $currentPageUri )|ezurl(no)
                     item_count=$children_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}

        {* /if *}
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
