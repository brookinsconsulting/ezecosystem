{cache-block subtree_expiry=$blogs_node_id}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full" style="width: 210px;">
    <div class="class-folder">
    <h3>Sources<h3>
    {def $blogsObjectsUnique = array()
         $blogsObjects = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_node_id,
                                                         'sort_by', array( 'attribute', false(), 'blog_post/publication_date' ),
                                                         'depth', 2,
                                                         'class_filter_type', 'include',
                                                         'class_filter_array', array( 'blog_post' ),
                                                         'limit', 500 ) )}
{* $blogsObjects|attribute(show,1) *}
    <div style="width: 200px">
    <ul>
    {foreach $blogsObjects as $blogObject}
        {if $blogsObjectsUnique|contains( $blogObject.parent.node_id )|not}
        {set $blogsObjectsUnique = $blogsObjectsUnique|append( $blogObject.parent.node_id )}
        {* <li><a href="{$blogObject.parent.data_map.blog.content}">{$blogObject.parent.name}</a></li> *}
	<li><a href={$blogObject.parent.url|ezurl}>{$blogObject.parent.name}</a></li>
	{/if}
    {/foreach}
    </ul>
    </div>

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
{/cache-block}