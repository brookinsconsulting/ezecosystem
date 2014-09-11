{* Blog post - Line view *}
<div class="content-view-line">
    <div class="class-blog-post float-break">

    <div class="attribute-header">
        <h1><a href={$node.parent.url_alias|ezurl}>{$node.parent.name}</a></h1>
     </div>
    <div class="attribute-header">
        <h2>> <a href="{$node.data_map.blog_post_url.content}" title="{$node.data_map.title.content|wash}">{if $node.data_map.title.content|count_chars|gt( 70 )}{$node.data_map.title.content|extract( 0, 66 )|append(' ...' )|wash}{else}{$node.data_map.title.content|wash}{/if}</a></h2>
     </div>

    <div class="attribute-byline">
	{if $node.data_map.tags.has_content}
        <p class="tags"> {"Tags:"|i18n("design/ezwebin/line/blog_post")} {foreach $node.data_map.tags.content.keywords as $keyword}
                                           <a href={concat( $node.parent.url_alias, "/(tag)/", $keyword|rawurlencode )|ezurl} title="{$keyword}">{$keyword}</a>
                                           {delimiter}
                                               ,
                                           {/delimiter}
                                     {/foreach}
        </p>
	{/if}
    </div>

    {*
    <div class="attribute-body float-break">
      {attribute_view_gui attribute=$node.data_map.body}
    </div>
    *}

    <div class="attribute-body float-break">

    {* <pre style="white-space:pre-wrap;width:81ex">{$node.data_map.title.content|trim}</pre> *}
    <p>{$node.data_map.title.content|wash}</p>

    {if $node.data_map.blog_post_description_text_block.has_content|eq(true() )}
        {$node.data_map.blog_post_description_text_block.content}
    {/if}
    </div>

    <div class="attribute-url">
	<span>{$node.data_map.publication_date.content.timestamp|l10n(shortdatetime)}</span> &nbsp; <a href={$node.parent.data_map.blog.content|ezurl()}>{$node.parent.data_map.blog.data_text}</a> &nbsp; <a href="{$node.url_alias|ezurl(no)}">Mirror</a> &nbsp; <a href="{$node.data_map.blog_post_url.content}">Link</a>
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