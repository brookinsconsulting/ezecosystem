{if $home_page_root_node_id|is_set|not}
{def $home_page_root_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $home_page_fetch_classes=ezini('HomePageFetchSettings','ClassIdentifiers','ezecosystem.ini')
     $home_page_exclude_parent_content=ezini('HomePageFetchSettings','ExcludeParentPathString','ezecosystem.ini')}
{/if}
{if $github_node_id|is_set|not}
{def $github_node_id=ezini( 'NodeIDSettings', 'GitHubNodeID', 'ezecosystem.ini' )}
{/if}
{if $forums_node_id|is_set|not}
{def $forums_node_id=ezini( 'NodeIDSettings', 'ForumsNodeID', 'ezecosystem.ini' )}
{def $forums_node_ids=ezini( 'SourcesSidebarSettings', 'ShareForumNodeIDs', 'ezecosystem.ini' )}
{def $share_forums_node_id=ezini( 'NodeIDSettings', 'ShareForumsNodeID', 'ezecosystem.ini' )}
{def $projects_forum_node_id=ezini( 'NodeIDSettings', 'ProjectsForumNodeID', 'ezecosystem.ini' )}
{def $stackoverflow_forums_node_id=ezini( 'NodeIDSettings', 'StackOverflowForumsNodeID', 'ezecosystem.ini' )}
{/if}
{def $home_page_forum_topic_publication_date=ezini('AttributeIdentifierSettings','forumTopicPublicationDate','ezecosystem.ini')
     $home_page_blog_post_publication_date_attribute_name=ezini('AttributeIdentifierSettings','blogPostPublicationDate','ezecosystem.ini')
     $home_page_fetch_depth=ezini('HomePageFetchSettings','FetchDepth','ezecosystem.ini')
     $page_limit = 30
     $blogs_count = 0
     $uniq_id = 0
     $uniq_post = array()
     $current_node = fetch( 'content', 'node', hash( 'node_id', $home_page_root_node_id ) )
     $notifications_node_id=ezini('NodeIDSettings','NotificationNodeID','ezecosystem.ini')
     $notifications_class=array( ezini('ClassIdentifierSettings','classNotification','ezecosystem.ini') )
     $home_page_post_fetch_language='eng-US'
     $home_page_section_forums=ezini('HomePageSectionSettings','ForumsSectionID','ezecosystem.ini')
     $home_page_section_issues=ezini('HomePageSectionSettings','IssuesSectionID','ezecosystem.ini')
     $home_page_section_homepageandgithub=ezini('HomePageSectionSettings','HomePageAndGitHubSectionID','ezecosystem.ini')
     $home_page_section_github=ezini('HomePageSectionSettings','GitHubSectionID','ezecosystem.ini')
     $home_page_section_planet=ezini('HomePageSectionSettings','PlanetSectionID','ezecosystem.ini')
}

{if $mirror_node_id|is_set|not}
{def $mirror_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')}
{/if}

{if $node.node_id|eq( $root_node_id )}
{def $currentPageUri=''}
{else}
{def $currentPageUri=concat( '/', $node.url )}
{/if}

{set-block scope=global variable=cache_ttl}0{/set-block}

{* $rss_export = fetch( 'rss', 'export_by_node', hash( 'node_id', $home_page_root_node_id) ) *}

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
            <h1>{attribute_view_gui attribute=$current_node.data_map.name}</h1>
        </div>

        {if eq( ezini( 'folder', 'SummaryInFullView', 'content.ini' ), 'enabled' )}
            {if $current_node.object.data_map.short_description.has_content}
                <div class="attribute-short">
                    {attribute_view_gui attribute=$current_node.data_map.short_description}
                </div>
            {/if}
        {/if}
    *}

        {* if $current_node.object.data_map.description.has_content}
            <div class="attribute-short">
                {attribute_view_gui attribute=$current_node.data_map.description}
            </div>
        {/if *}

{if $view_parameters.tag}
    {set $blogs_count = fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                                 'classid', 'blog_post' ) )}
    {if $blogs_count}
        {foreach fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', 'blog_post',
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), $home_page_blog_post_publication_date_attribute_name ),
                                                    'limit', $page_limit ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
{else}
    {* ELSE - Tag View Parameter is not available - AKA - Default *}

            {* ezini( 'MenuContentSettings', 'ExtraIdentifierList', 'menu.ini' ) *}
            {* if le( $current_node.depth, '3')}
                {set $home_page_fetch_classes = $home_page_fetch_classes|merge( ezini( 'ChildrenNodeList', 'ExcludedClasses', 'content.ini' ) )}
            {/if *}

            {* Forums Root Node *}
            {if $home_page_root_node_id|eq( $forums_node_id )}
                {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $mirror_node_id,
                                                                           'class_filter_type', 'exclude',
                                                                           'class_filter_array', array( 'forum', 'forums' ),
                                                                           'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                           'depth', $home_page_fetch_depth ) )}
                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                                 'class_filter_type', 'exclude',
                                                                 'class_filter_array', array( 'forum', 'forums' ),
                                                                 'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* Share.ez.no Forums Root Node *}
            {elseif $home_page_root_node_id|eq( $share_forums_node_id )}
                {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $share_forums_node_id,
                                                                           'class_filter_type', 'exclude',
                                                                           'class_filter_array', array( 'forum', 'forums' ),
                                                                           'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                           'depth', $home_page_fetch_depth ) )}
                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $share_forums_node_id,
                                                                 'class_filter_type', 'exclude',
                                                                 'class_filter_array', array( 'forum', 'forums' ),
                                                                 'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* StackOverflow Forums Root Node *}
            {elseif $home_page_root_node_id|eq( $stackoverflow_forums_node_id )}
                {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $home_page_root_node_id,
                                                                           'class_filter_type', 'exclude',
                                                                           'class_filter_array', array( 'forum', 'forums' ),
                                                                           'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                           'depth', $home_page_fetch_depth ) )}
                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $home_page_root_node_id,
                                                                 'class_filter_type', 'exclude',
                                                                 'class_filter_array', array( 'forum', 'forums' ),
                                                                 'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* Forums Subtree Root Nodes *}
            {elseif $forums_node_ids|contains( $home_page_root_node_id )}
                {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $home_page_root_node_id,
                                                                           'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                           'depth', $home_page_fetch_depth ) )}
                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $home_page_root_node_id,
                                                                 'class_filter_type', 'include',
                                                                 'class_filter_array', $home_page_fetch_classes,
                                                                 'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* Projects.ez.no Forums Root Node *}
            {elseif $home_page_root_node_id|eq( $projects_forum_node_id )}
                {def $children_count=fetch( 'content', 'list_count', hash( 'parent_node_id', $projects_forum_node_id,
                                                                           'class_filter_type', 'include',
                                                                           'class_filter_array', $home_page_fetch_classes,
                                                                           'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                           'depth', $home_page_fetch_depth ) )}
                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $projects_forum_node_id,
                                                                 'class_filter_type', 'include',
                                                                 'class_filter_array', $home_page_fetch_classes,
                                                                 'attribute_filter', array( array( 'section', '=', $home_page_section_forums ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* GitHub Root Node *}
            {elseif $home_page_root_node_id|eq( $github_node_id )}
                {* Deprecated fetch conditions
                                                                'class_filter_type', 'include',
                                                                'class_filter_array', $home_page_fetch_classes,
                                                                'language', $home_page_post_fetch_language,
                                                                'ignore_visibility', false(),
                *}

                {def $children_count=fetch( 'content2', 'list_count', hash( 'parent_node_id', $mirror_node_id,
                                                                            'attribute_filter', array( 'or', array( 'section', '=', $home_page_section_github ), array( 'section', '=', $home_page_section_homepageandgithub ) ),
                                                                            'depth', $home_page_fetch_depth ) )}

                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                                 'class_filter_type', 'include',
                                                                 'class_filter_array', $home_page_fetch_classes,
                                                                 'attribute_filter', array( 'or', array( 'section', '=', $home_page_section_github ), array( 'section', '=', $home_page_section_homepageandgithub ) ),
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {* Mirror Root Nodes *}
            {elseif $current_node_id|eq( $mirror_node_id )}
                {* Deprecated fetch conditions
                                                                'class_filter_type', 'include',
                                                                'class_filter_array', $home_page_fetch_classes,
                                                                'language', $home_page_post_fetch_language,
                                                                'ignore_visibility', false(),
                *}
                {def $children_count=fetch( 'content2', 'list_count', hash( 'parent_node_id', $mirror_node_id,
                                                        'depth', $home_page_fetch_depth ) )}

                {def $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                                 'class_filter_type', 'include',
                                                                 'class_filter_array', $home_page_fetch_classes,
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'ignore_visibility', false(),
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
            {*  Homepage Root Node - AKA - Default Page *}
            {else}
                {* Deprecated fetch conditions
                                                                'parent_node_id', $current_node.node_id,
                                                                'class_filter_type', 'include',
                                                                'class_filter_array', array( $home_page_fetch_classes[0] ),
                                                                'language', $home_page_post_fetch_language,
                                                                'depth', $home_page_fetch_depth,
                                                                'ignore_visibility', false()
                *}

                {def $children_count=fetch( 'content2', 'list_count', hash( 'parent_node_id', $home_page_root_node_id,
                                                                            'attribute_filter', array( 'and', array( 'section', '!=', $home_page_section_github ), array( 'section', '!=', $home_page_section_planet ), array( 'section', '!=', $home_page_section_issues ), array( 'section', '!=', $home_page_section_forums ) ),
                                                                            'extended_attribute_filter', hash( 'id', 'BcDateTimeExtendedFilter', 'params', hash( 'published', makedate( 1, 1, currentdate()|datetime( 'custom', '%Y' ) ) ) ),
                                                                            'depth', $home_page_fetch_depth
                                                                         ) )}
                {* <b>{$children_count} -- {$page_limit}</b> <hr /> *}
                {* Deprecated fetch conditions

                                                             'class_filter_type', 'include',
                                                             'class_filter_array', $home_page_fetch_classes,
                                                             'ignore_visibility', false(),
                *}

                {def $home_page_fetch_sort_array_attribute_ext = array( array( 'attribute', false(), $home_page_blog_post_publication_date_attribute_name ), array( 'attribute', false(), $home_page_forum_topic_publication_date ) )
                     $home_page_fetch_sort_array_attribute_blog_only = array( array( 'attribute', false(), $home_page_blog_post_publication_date_attribute_name ), array( 'published', false() ) )
                     $home_page_fetch_sort_array_attribute_forum_only = array( array( 'attribute', false(), $home_page_forum_topic_publication_date ), array( 'published', false() ) )
                     $home_page_fetch_sort_array_published = array( 'published', false() )
                     $home_page_fetch_sort_array = $home_page_fetch_sort_array_published
                     $children = fetch( 'content2', 'list', hash( 'parent_node_id', $home_page_root_node_id,
                                                                 'attribute_filter', array( 'and', array( 'section', '!=', $home_page_section_github ), array( 'section', '!=', $home_page_section_planet ), array( 'section', '!=', $home_page_section_issues ), array( 'section', '!=', $home_page_section_forums ) ),
                                                                 'extended_attribute_filter', hash( 'id', 'BcDateTimeExtendedFilter', 'params', hash( 'published', makedate( 1, 1, currentdate()|datetime( 'custom', '%Y' ) ) ) ),
                                                                 'class_filter_type', 'include',
                                                                 'class_filter_array', $home_page_fetch_classes,
                                                                 'offset', $view_parameters.offset,
                                                                 'sort_by', $home_page_fetch_sort_array,
                                                                 'depth', $home_page_fetch_depth,
                                                                 'limit', $page_limit ) )}
                {* <b>{$children|count}</b><hr /> *}
                {* Deprecated path exclusion:                    'attribute_filter', array( 'and', array( 'section', '!=', '7' ), array( 'path', 'not_like', '*/220/*' --- "$home_page_exclude_parent_content*" ) ), *}
            {/if}

            <div class="homepage-head">
            {* Site notice area *}
            {* Deprecated single notification fetch
                {def $notifications=fetch( 'content', 'list', hash( 'parent_node_id', $notifications_node_id,
                                                                    'class_filter_type', 'include',
                                                                    'class_filter_array', $notifications_class,
                                                                    'sort_by', array( 'published', false() ),
                                                                    'limit', 1 ) )}
                *}
            {def $notifications=fetch( 'hfpfetchrandom', 'list', hash( 'parent_node_id', $notifications_node_id,
                                                                       'class_filter_type', 'include',
                                                                       'class_filter_array', $notifications_class,
                                                                       'sort_by', array( 'published', false() ),
                                                                       'limit', 1 ) )}
            {cache-block keys=$notifications expiry=2}
            {if and( $notifications|is_array, or( $node.node_id|eq( $mirror_node_id ), $node.node_id|eq( $root_node_id ) ) )}
            <div class="notification-container">
            {foreach $notifications as $notification}
            <hr />
            {$notification.data_map.intro.content.output.output_text}
            <hr />
            {/foreach}
            </div>
            {/if}
            {/cache-block}
            {cache-block keys=$children expiry=2}
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
                {else}
                    Sorry, this category currently has no content. Please try again later.
                {/if}
            </div>
            {/cache-block}
{/if}

            {cache-block keys=$children expiry=2}
            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=concat('http://', ezsys( 'hostname' ), $currentPageUri )|ezurl(no)
                     item_count=$children_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}
            {/cache-block}

        {* /if *}
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
