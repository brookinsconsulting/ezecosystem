{* Forum post - Line view *}

{def $view_count_enabled=cond( ezini('eZecosystemSettings','ViewCountDisplay','ezecosystem.ini')|eq('enabled'), true() )
     $view_count_threshold=ezini('eZecosystemSettings','ViewCountThreshold','ezecosystem.ini')
     $sources_list_share_ez_no_forum_node_ids=ezini('SourcesSidebarSettings','ShareForumNodeIDs','ezecosystem.ini')
     $projects_forum_node_id=ezini('NodeIDSettings', 'ProjectsForumNodeID', 'ezecosystem.ini')}

<div class="content-view-line">
    <div class="class-blog-post float-break">

    <div class="attribute-header">
        {if $sources_list_share_ez_no_forum_node_ids|contains( $node.parent.node_id )}
          <h1><a href={$node.parent.url_alias|ezurl}>{$node.parent.parent.name} : {$node.parent.name}</a></h1>
        {else}
          <h1><a href={$node.parent.url_alias|ezurl}>{$node.parent.name}</a></h1>
        {/if}
     </div>
    <div class="attribute-header">
        <h2>> <a href="{$node.data_map.link.content}" title="{$node.data_map.subject.content}">{if $node.data_map.subject.content|count_chars|gt( 70 )}{$node.data_map.subject.content|extract( 0, 66 )|append(' ...' )|wash}{else}{$node.data_map.subject.content}{/if}</a></h2>
     </div>
    
    <div class="attribute-byline">
	{if $node.data_map.forum_topic_author.has_content}
        <p class="author">By: {if $node.parent.node_id|eq( $projects_forum_node_id )}{$node.data_map.forum_topic_author.content|explode('community@ez.no (')|implode('')|explode(')')|implode('')|autolink}{else}{$node.data_map.forum_topic_author.content|autolink}{/if}</p>
	{/if}
    </div>
    {* <div class="attribute-byline">
	{if $node.data_map.tags.has_content}
        <p class="tags"> {"Tags:"|i18n("design/ezwebin/line/blog_post")} {foreach $node.data_map.tags.content.keywords as $keyword}
                                           <a href={concat( $node.parent.url_alias, "/(tag)/", $keyword|rawurlencode )|ezurl} title="{$keyword}">{$keyword}</a>
                                           {delimiter}
                                               ,
                                           {/delimiter}
                                     {/foreach}
        </p>
	{/if}
    </div> *}

    {*
    <div class="attribute-body float-break">
      {attribute_view_gui attribute=$node.data_map.body}
    </div>
    *}

    <div class="attribute-body float-break">

    {* <pre style="white-space:pre-wrap;width:81ex">{$node.data_map.title.content|trim}</pre> *}
    <p>{$node.data_map.title.content}</p>

    {if $node.data_map.message.has_content|eq(true() )}
        {if $sources_list_share_ez_no_forum_node_ids|contains( $node.parent.node_id )}
          {$node.data_map.message.content|autolink}
        {else}
          {$node.data_map.message.content|simpletags|autolink}
        {/if}
    {/if}
    </div>

    <div class="attribute-url">
        {if $sources_list_share_ez_no_forum_node_ids|contains( $node.parent.node_id )}
	<span>{$node.data_map.publication_date.content.timestamp|l10n(shortdatetime)}</span> &nbsp; <a href={$node.parent.url|ezurl()}>{$node.parent.parent.name} : {$node.parent.name}</a> &nbsp; <a href="{$node.url_alias|ezurl(no)}">Mirror</a> &nbsp; <a href="{$node.data_map.link.content}">Link</a> {if and( $view_count_enabled, $node.view_count|gt( $view_count_threshold ) )}<span class="views"><a href="#" style="text-decoration:none;" title="View count @ {$node.view_count}">@{$node.view_count}</a></span>{/if}
        {else}
        <span>{$node.data_map.publication_date.content.timestamp|l10n(shortdatetime)}</span> &nbsp; <a href={$node.parent.url|ezurl()}>{$node.parent.name}</a> {if $node.object.data_map.link.content|contains('://projects.ez.no')}&nbsp; <a href="{concat( 'http://projects.ez.no/', $node.object.data_map.link.content|explode('://projects.ez.no/')[1]|explode('/')[0] )}">Project</a> &nbsp;{/if} <a href="{$node.url_alias|ezurl(no)}">Mirror</a> &nbsp; <a href="{$node.data_map.link.content}">Link</a> {if and( $view_count_enabled, $node.view_count|gt( $view_count_threshold ) )}<span class="views"><a href="#" style="text-decoration:none;" title="View count @ {$node.view_count}">@{$node.view_count}</a></span>{/if}
        {/if}
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