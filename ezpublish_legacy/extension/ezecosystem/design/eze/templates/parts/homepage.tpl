{if and( $root_node_id|is_set|not, $blogs_node_id|is_set|not )}
{def $root_node_id=ezini('TreeMenu','RootNodeID','contentstructuremenu.ini')
     $blogs_node_id=ezini('NodeIDSettings','BlogsNodeID','ezecosystem.ini')}
{/if}
{def $home_page_forum_topic_publication_date=ezini('AttributeIdentifierSettings','forumTopicPublicationDate','ezecosystem.ini')
     $homePageBlogPostPublicationDateAttributeName=ezini('AttributeIdentifierSettings','blogPostPublicationDate','ezecosystem.ini')
     $homePageFetchClasses=ezini('HomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')
     $page_limit = 30
     $blogs_count = 0
     $uniq_id = 0
     $uniq_post = array()
     $blogs_node = fetch( 'content', 'node', hash( 'node_id', $blogs_node_id ) )
     $notifications_node_id=ezini('NodeIDSettings','NotificationNodeID','ezecosystem.ini')
     $notifications_class=array( ezini('ClassIdentifierSettings','classNotification','ezecosystem.ini') )
     $homePagePostFetchLanguage='eng-US'}

{if $node.node_id|eq( $root_node_id )}
{def $currentPageUri=''}
{else}
{def $currentPageUri=concat( '/', $node.url )}
{/if}

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
                                                    'sort_by', array( 'attribute', false(), $homePageBlogPostPublicationDateAttributeName ),
                                                    'limit', $page_limit ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
{else}
            {def $children_count = ''
		 $sort_array_attribute_ext = array( array( 'attribute', false(), $homePageBlogPostPublicationDateAttributeName ), array( 'attribute', false(), $home_page_forum_topic_publication_date ) )
		 $sort_array_attribute_blog_only = array( array( 'attribute', false(), $homePageBlogPostPublicationDateAttributeName ), array( 'published', false() ) )
		 $sort_array_attribute_forum_only = array( array( 'attribute', false(), $home_page_forum_topic_publication_date ), array( 'published', false() ) )
		 $sort_array_published = array( 'published', false() )
		 $sort_array = $sort_array_published
                 $children = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_node_id,
                                                             'class_filter_type', 'include',
                                                             'class_filter_array', $homePageFetchClasses,
							     'language', $homePagePostFetchLanguage,
                                                             'offset', $view_parameters.offset,
                                                             'sort_by', $sort_array,
						             'depth', 2,
                                                             'limit', $page_limit ) )}

            {* ezini( 'MenuContentSettings', 'ExtraIdentifierList', 'menu.ini' ) *}
            {* if le( $blogs_node.depth, '3')}
                {set $homePageFetchClasses = $homePageFetchClasses|merge( ezini( 'ChildrenNodeList', 'ExcludedClasses', 'content.ini' ) )}
            {/if *}

            {set $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $blogs_node.node_id,
                                                                       'class_filter_type', 'include',
                                                                       'class_filter_array', $homePageFetchClasses,
                                                                       'language', $homePagePostFetchLanguage,
								       'depth', 2 ) )}

            <div style="margin-top:6px;margin-bottom:8px;">
            {* Site notice area *}
            {def $notifications=fetch( 'content', 'list', hash( 'parent_node_id', $notifications_node_id,
                                                                'class_filter_type', 'include',
                                                                'class_filter_array', $notifications_class,
                                                                'order_by', array( 'published', false() ),
                                                                'limit', 1 ) )}
            {if $notifications|is_array}
            <div style="padding-bottom: 10px;">
            {foreach $notifications as $notification}
            <hr />
            {$notification.data_map.intro.content.output.output_text}
            <hr />
            {/foreach}
            </div>
            {/if}

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
