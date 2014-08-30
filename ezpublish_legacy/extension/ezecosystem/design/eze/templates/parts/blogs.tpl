{cache-block subtree_expiry=$blogs_node_id}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full" style="width: 210px;">
    <div class="class-folder">
    <h3>Sources<h3>
    {def $blogPostObjectsUnique = array()
         $currentTimestampMinusOneMonth = currentdate()|sub( 2678400 )
         $blogObjects = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_node_id,
                                                        'attribute_filter', array( 'and', array( 'blog/inactive', '=', 0 ), array( 'modified_subnode', '>=', $currentTimestampMinusOneMonth ) ),
                                                        'class_filter_type', 'include',
                                                        'class_filter_array', array( 'blog' ),
                                                        'sort_by', array( 'modified_subnode', false() ),
                                                        'depth', 2,
                                                        'limit', 125 ) )}
{*
         $blogPostObjects = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_node_id,
                                                            'sort_by', array( 'attribute', false(), 'blog_post/publication_date' ),
                                                            'depth', 2,
                                                            'class_filter_type', 'include',
                                                            'class_filter_array', array( 'blog_post' ),
                                                            'limit', 500 ) )
*}
    <div style="width: 200px">
    <ul>
    {foreach $blogObjects as $blogObject}
	<li><a href={$blogObject.url|ezurl}>{$blogObject.name}</a></li>
    {/foreach}

    {*
    {foreach $blogPostObjects as $blogObject}
        {if $blogPostObjectsUnique|contains( $blogObject.parent.node_id )|not}
        {set $blogPostObjectsUnique = $blogPostObjectsUnique|append( $blogObject.parent.node_id )} *}
        {* <li><a href="{$blogObject.parent.data_map.blog.content}">{$blogObject.parent.name}</a></li> *}
	{* <li><a href={$blogObject.parent.url|ezurl}>{$blogObject.parent.name}</a></li>
	{/if}
    {/foreach}
    *}
    </ul>
    </div>

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
{/cache-block}