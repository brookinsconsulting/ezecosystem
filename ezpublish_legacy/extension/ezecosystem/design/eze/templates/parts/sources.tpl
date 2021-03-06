{cache-block subtree_expiry=$mirror_node_id keys=array( $current_node_id )}
{def $source_post_objects_unique=array()
     $sources_list_share_ez_no_forum_node_ids=ezini('SourcesSidebarSettings','ShareForumNodeIDs','ezecosystem.ini')
     $blogs_list_publication_date_attribute_name=ezini('AttributeIdentifierSettings','blogPostPublicationDate','ezecosystem.ini')
     $sources_list_fetch_classes=ezini('SourcesSidebarSettings','ClassIdentifiers','ezecosystem.ini')
     $sources_list_fetch_limit=ezini('SourcesSidebarSettings','FetchLimit','ezecosystem.ini')
     $sources_list_github_fetch_limit=ezini('SourcesSidebarSettings','GitHubFetchLimit','ezecosystem.ini')}

{if $current_node_id|eq( $forums_node_id )}
{def $source_post_objects = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                            'attribute_filter', array( array( 'section', '=', '12' ) ),
                                                            'sort_by', array( 'published', false() ),
                                                            'depth', 4,
                                                            'limit', $sources_list_github_fetch_limit ) )}
{elseif $current_node_id|eq( $github_node_id )}
{def $source_post_objects = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                            'attribute_filter', array( 'or', array( 'section', '=', '7' ), array( 'section', '=', '10' ) ),
                                                            'sort_by', array( 'published', false() ),
                                                            'depth', 4,
                                                            'limit', $sources_list_github_fetch_limit ) )}
{else}
{def $source_post_objects = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                            'attribute_filter', array( 'and', array( 'section', '!=', '7' ), array( 'section', '!=', '11' ), array( 'section', '!=', '12' ) ),
                                                            'sort_by', array( 'published', false() ),
                                                            'depth', 4,
                                                            'limit', $sources_list_fetch_limit ) )}
{/if}

{* Deprecated fetch conditions
,
                                                            'class_filter_type', 'include',
                                                            'class_filter_array', $sources_list_fetch_classes,

         $currentTimestampMinusOneMonth = currentdate()|sub( 2678400 )
         $sourceObjects = fetch( 'content', 'list', hash( 'parent_node_id', $mirror_node_id,
                                                        'attribute_filter', array( 'and', array( 'blog/inactive', '=', 0 ), array( 'modified_subnode', '>=', $currentTimestampMinusOneMonth ) ),
                                                        'class_filter_type', 'include',
                                                        'class_filter_array', array( 'blog' ),
                                                        'sort_by', array( 'modified_subnode', false() ),
                                                        'depth', 2,
                                                        'limit', 125 ) )
*}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full sidebar-content-container">
    <div class="class-folder">
    <h3>Sources<h3>
    <div class="sidebar-content">
    <ul>
    {foreach $source_post_objects as $sourceObject}
        {if $sources_list_share_ez_no_forum_node_ids|contains( $sourceObject.parent.node_id )}
          {if $source_post_objects_unique|contains( $sourceObject.parent.parent.node_id )|not}
          {set $source_post_objects_unique = $source_post_objects_unique|append( $sourceObject.parent.parent.node_id )}
	  <li><a href={$sourceObject.parent.parent.url|ezurl}>{$sourceObject.parent.parent.name}</a></li>
	  {/if}
        {else}
          {if and( $sources_list_fetch_classes|contains( $sourceObject.class_identifier ), $source_post_objects_unique|contains( $sourceObject.parent.node_id )|not )}
          {set $source_post_objects_unique = $source_post_objects_unique|append( $sourceObject.parent.node_id )}
          {* <li><a href="{$sourceObject.parent.data_map.blog.content}">{$sourceObject.parent.name}</a></li> *}
	  <li><a href={$sourceObject.parent.url|ezurl}>{$sourceObject.parent.name}</a></li>
	  {/if}
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