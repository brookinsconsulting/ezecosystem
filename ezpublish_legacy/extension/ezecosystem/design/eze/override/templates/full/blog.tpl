{* Blog - Full view *}
{set scope=global persistent_variable=hash('left_menu', false(),
                                           'extra_menu', false())}
{def $page_limit = 30
     $blogs_count = 0
     $uniq_id = 0
     $uniq_post = array()
     $mirror_node_id=ezini('NodeIDSettings','MirrorNodeID','ezecosystem.ini')
     $issues_node_id=ezini('NodeIDSettings','IssuesNodeID','ezecosystem.ini')
     $ezp_issues_node_id=ezini('NodeIDSettings','eZPublishIssuesNodeID','ezecosystem.ini')
     $community_issues_node_id=ezini('NodeIDSettings','CommunityIssuesNodeID','ezecosystem.ini')
     $blog_post_fetch_publication_date_identifier=ezini('AttributeIdentifierSettings','blogPostPublicationDate','ezecosystem.ini')
     $issue_post_fetch_publication_date_identifier=ezini('AttributeIdentifierSettings','issuePostPublicationDate','ezecosystem.ini')
     $issue_post_class_identifier=ezini('ClassIdentifierSettings','classIssuePost','ezecosystem.ini')
     $issues_home_page_fetch_classes=array( 'issue_post' )}

<div class="class-blog extrainfo">
    <div class="columns-blog float-break">
        <div class="main-column-position">
            <div class="main-column float-break">
                <div class="border-box">
                <div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
                <div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

                {if and( $node.data_map.inactive|is_set, $node.data_map.inactive.content|eq( 1 ) )}<div style="position: relative; top: 10px; padding-bottom: 20px;">Note: <span style="text-decoration: underline;">This blog has become inactive. New content may not be posted in the future.</span></div>{/if}

{if or( $node.node_id|eq( $issues_node_id ), $node.node_id|eq( $ezp_issues_node_id ), $node.node_id|eq( $community_issues_node_id ) )}
  {def $class_attribute_identifier=$issue_post_fetch_publication_date_identifier}
{else}
  {def $class_attribute_identifier=$blog_post_fetch_publication_date_identifier}
{/if}

{if $view_parameters.tag}
    <p><span class="underline">Selected tag</span>: <b>{$view_parameters.tag}</b></p>
    {if $node.node_id|eq( $issues_node_id )}
    {set $blogs_count = fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                                 'classid', $issue_post_class_identifier,
                                                                 'parent_node_id', $ezp_issues_node_id ) )}
    {if $blogs_count}
        {foreach fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', $issue_post_class_identifier,
                                                    'parent_node_id', $ezp_issues_node_id,
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), $issue_post_fetch_publication_date_identifier ),
                                                    'limit', $page_limit ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
    {elseif $node.node_id|eq( $community_issues_node_id )}
    {set $blogs_count = fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                                 'classid', $issue_post_class_identifier,
                                                                 'parent_node_id', $community_issues_node_id ) )}
    {if $blogs_count}
        {foreach fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', $issue_post_class_identifier,
                                                    'parent_node_id', $community_issues_node_id,
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), $issue_post_fetch_publication_date_identifier ),
                                                    'limit', $page_limit ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
    {else}
    {set $blogs_count = fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                     'classid', 'blog_post',
                                                     'parent_node_id', $node.node_id ) )|sum( fetch( 'content', 'keyword_count', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                     'classid', $issue_post_class_identifier,
                                                     'parent_node_id', $issues_node_id ) ) )}
    {if $blogs_count}
        {foreach fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', 'blog_post',
                                                    'parent_node_id', $node.node_id,
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), $blog_post_fetch_publication_date_identifier ),
                                                    'limit', $page_limit ) )|merge( fetch( 'content', 'keyword', hash( 'alphabet', rawurldecode( $view_parameters.tag ),
                                                    'classid', $issue_post_class_identifier,
                                                    'parent_node_id', $issues_node_id,
                                                    'offset', $view_parameters.offset,
                                                    'sort_by', array( 'attribute', false(), $issue_post_fetch_publication_date_identifier ),
                                                    'limit', $page_limit ) ) ) as $blog}
            {set $uniq_id = $blog.link_object.node_id}
            {if $uniq_post|contains( $uniq_id )|not}
                {node_view_gui view=line content_node=$blog.link_object}
                {set $uniq_post = $uniq_post|append( $uniq_id )}
            {/if}
        {/foreach}
    {/if}
    {/if}
{else}
    {if and( $view_parameters.month, $view_parameters.year )}
        {def $start_date = maketime( 0,0,0, $view_parameters.month, cond( ne( $view_parameters.day , ''), $view_parameters.day, '01' ), $view_parameters.year)
             $end_date = maketime( 23, 59, 59, $view_parameters.month, cond( ne( $view_parameters.day , ''), $view_parameters.day, makedate( $view_parameters.month, '01', $view_parameters.year)|datetime( 'custom', '%t' ) ), $view_parameters.year)}

        {set $blogs_count = fetch( 'content', 'list_count', hash( 'parent_node_id', $node.node_id,
                                                                  'attribute_filter', array( and,
                                                                         array( $class_attribute_identifier, '>=', $start_date ),
                                                                         array( $class_attribute_identifier, '<=', $end_date) ) ) )}
        {if $blogs_count}
            {foreach fetch( 'content', 'list', hash( 'parent_node_id', $node.node_id,
                                                     'offset', $view_parameters.offset,
                                                     'attribute_filter', array( and,
                                                                                 array( $class_attribute_identifier, '>=', $start_date ),
                                                                                 array( $class_attribute_identifier, '<=', $end_date ) ),
                                                     'sort_by', array( 'attribute', false(), $class_attribute_identifier ),
                                                     'limit', $page_limit ) ) as $blog}
                {node_view_gui view=line content_node=$blog}
            {/foreach}
        {/if}
    {else}
        {if $node.node_id|eq( $issues_node_id )}
        {set $blogs_count = fetch( 'content', 'list_count', hash( 'parent_node_id', $ezp_issues_node_id ) )|sum( fetch( 'content', 'list_count', hash( 'parent_node_id', $community_issues_node_id ) ) )}
        {else}
        {set $blogs_count = fetch( 'content', 'list_count', hash( 'parent_node_id', $node.node_id ) )}
        {/if}

        {if $blogs_count}
            {if or( $node.node_id|eq( $issues_node_id ), $node.node_id|eq( $community_issues_node_id ) )}
            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=$node.url_alias
                     item_count=$blogs_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}
            {/if}
        {if $node.node_id|eq( $issues_node_id )}
        {def $blog_posts = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                           'class_filter_type', 'include',
                                                           'class_filter_array', $issues_home_page_fetch_classes,
                                                           'depth', 3,
                                                           'offset', $view_parameters.offset,
                                                           'sort_by', array( 'attribute', false(), $class_attribute_identifier ),
                                                           'limit', $page_limit ) )}
        {else}
        {def $blog_posts = fetch( 'content', 'list', hash( 'parent_node_id', $node.node_id,
                                                           'offset', $view_parameters.offset,
                                                           'sort_by', array( 'attribute', false(), $class_attribute_identifier ),
                                                           'limit', $page_limit ) )}
        {/if}
            {foreach $blog_posts as $blog}
                {node_view_gui view=line content_node=$blog}
            {/foreach}
        {/if}
    {/if}
{/if}

            {include name=navigator
                     uri='design:navigator/google.tpl'
                     page_uri=$node.url_alias
                     item_count=$blogs_count
                     view_parameters=$view_parameters
                     item_limit=$page_limit}

                </div></div></div>
                <div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
                </div>
            </div>
        </div>

        <div class="extrainfo-column-position">
            <div class="extrainfo-column">
                <div class="border-box">
                <div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
                <div class="border-ml"><div class="border-mr"><div class="border-mc float-break">
                        {if $node.node_id|eq( $issues_node_id )}
                        {def $issues_node=fetch( 'content', 'node', hash( 'node_id', $ezp_issues_node_id  ) )}
                        {include uri='design:parts/blog/extra_info.tpl' used_node=$issues_node current_node=$issues_node extra_view=true()}
                        {else}
                        {include uri='design:parts/blog/extra_info.tpl' used_node=$node current_node=$node extra_view=true()}
                        {/if}
                </div></div></div>
                <div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>