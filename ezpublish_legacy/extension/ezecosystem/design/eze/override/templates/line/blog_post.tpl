{* Blog post - Line view *}

{def $view_count_enabled=cond( ezini('eZecosystemSettings','ViewCountDisplay','ezecosystem.ini')|eq('enabled'), true() )
     $view_count_threshold=ezini('eZecosystemSettings','ViewCountThreshold','ezecosystem.ini')
     $blogs_ids_with_iframe_problems=ezini('NodeIDSettings','BlogsWithIframeProblemsNodeIDs','ezecosystem.ini')
     $exclude_author_parent_node_ids=ezini('HomePageFetchSettings','ExcludeAuthorParentIDs','ezecosystem.ini')
     $projects_commits_node_id=ezini('NodeIDSettings','ProjectsCommitsNodeID','ezecosystem.ini')}

<div class="content-view-line">
    <div class="class-blog-post float-break">

    <div class="attribute-header">
        <h1><a href={$node.parent.url_alias|ezurl}>{$node.parent.name}</a></h1>
     </div>
    <div class="attribute-header">
        {def $title = $node.data_map.title.content|html_entity_decode}
        <h2>> <a href="{$node.data_map.blog_post_url.content}" title="{$title}">{if $title|count_chars|gt( 71 )}{$title|extract( 0, 67 )|append(' ...' )}{else}{$title}{/if}</a></h2>
     </div>

    <div class="attribute-byline">
    {if $node.parent.node_id|eq( $projects_commits_node_id )}
        {if $node.data_map.blog_post_url.content|contains('://projects.ez.no')}<p class="author">Project: <a href="{concat( 'http://projects.ez.no/', $node.data_map.blog_post_url.content|explode('://projects.ez.no/')[1]|explode('/')[0], '/' )}">{$node.data_map.blog_post_url.content|explode('://projects.ez.no/')[1]|explode('/')[0]}</a></p>{/if}</p>
    {else}
        {if and( $node.object.data_map.blog_post_author.content|contains( 'href' )|not, $node.object.data_map.blog_post_author.content|ne( '' ), $exclude_author_parent_node_ids|contains( $node.parent.node_id )|not )}<p class="author">By: {$node.object.data_map.blog_post_author.content|autolink}</p>{elseif $node.object.data_map.blog_post_author.content|contains( 'href' )}<p class="author">By: {$node.object.data_map.blog_post_author.content}</p>{/if}
    {/if}

    {if $node.data_map.tags.has_content}
        <p class="tags"> {"Tags:"|i18n("design/ezwebin/line/blog_post")} {foreach $node.data_map.tags.content.keywords as $keyword} <a href={concat( $node.parent.url_alias, "/(tag)/", $keyword|rawurlencode )|ezurl} title="{$keyword}">{$keyword}</a>{delimiter},{/delimiter}{/foreach}
        </p>
    {/if}
    </div>

    {*
    <div class="attribute-body float-break">
      {attribute_view_gui attribute=$node.data_map.body}
    </div>
    *}

    <div class="attribute-body float-break">
    {if $node.data_map.blog_post_description_text_block.has_content|eq(true() )}
     {if $blogs_ids_with_iframe_problems|contains( $node.parent.node_id )}
      {def $blog_post_description=$node.data_map.blog_post_description_text_block.content
           $blog_post_description_html5_iframe_replaced=$blog_post_description|html5_iframe_append_closing_tag}
      {$blog_post_description_html5_iframe_replaced}
      {else}
      {$node.data_map.blog_post_description_text_block.content}
      {/if}
    {else}
      {* <pre style="white-space:pre-wrap;width:81ex">{$node.data_map.title.content|trim}</pre> *}
      {$node.data_map.title.content|trim}
    {/if}
    </div>

    <div class="attribute-url">
	<span>{$node.data_map.publication_date.content.timestamp|l10n(shortdatetime)}</span> &nbsp; <a href={$node.parent.data_map.blog.content|ezurl()}>{$node.parent.data_map.blog.data_text}</a> &nbsp; <span class="mirror"><a href="{$node.url_alias|ezurl(no)}">Mirror</a></span> &nbsp; <span class="link"><a href="{$node.data_map.blog_post_url.content}">Link</a></span> &nbsp; {if and( $view_count_enabled, $node.view_count|gt( $view_count_threshold ) )}<span class="views"><a href="javascript:;" style="text-decoration:none;" title="View count @ {$node.view_count}">@{$node.view_count}</a></span>{/if}
    </div>

        {* if $node.data_map.enable_comments.data_int}
        <div class="attribute-comments">
        <p>
        {def $comment_count = fetch( 'content', 'list_count', hash( 'parent_node_id', $node.node_id,
                                                                    'class_filter_type', 'include',
                                                                    'class_filter_array', array( 'comment' ) ) )}
        {if $comment_count|gt( 0 )}
            <a href={concat( $node.url_alias, "#comments" )|ezurl}>{"View comments"|i18n("design/ezwebin/line/blog_post")} ({$comment_count})</a>
        {else}
            <a href={concat( $node.url_alias, "#comments" )|ezurl}>{"Add comment"|i18n("design/ezwebin/line/blog_post")}</a>
        {/if}
        </p>
        </div>
        {/if *}

    </div>
</div>