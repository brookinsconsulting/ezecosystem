{def $tag_cloud_limit=ezini('TagSidebarSettings','TagCloudLimit','ezecosystem.ini')
     $tag_cloud_class_identifier=ezini('TagSidebarSettings','TagCloudClassIdentifier','ezecosystem.ini')
     $tag_cloud_exclude_tags=ezini('TagSidebarSettings','TagCloudExcludeTags','ezecosystem.ini')
     $tag_cloud_exclude_strings=array()
     $ezp_issues_node_id=ezini('NodeIDSettings','eZPublishIssuesNodeID','ezecosystem.ini')
     $community_issues_node_id=ezini('NodeIDSettings','CommunityIssuesNodeID','ezecosystem.ini')}

{if or( $used_node.node_id|eq( 4198 ), $used_node.node_id|eq( 9181 ) )}
  {def $class_identifier='issue_post'}
{else}
  {def $class_identifier='blog_post'}
{/if}

{if or( $current_node.node_id|eq( 4198 ), $current_node.node_id|eq( 9181 ) )}
{def $tag_list_keyword_limit=15
     $tag_cloud_limit=15}
{else}
{def $tag_list_keyword_limit=15
     $tag_cloud_limit=25}
{/if}


                        <div class="attribute-tag-cloud">
                        <h1>Tags</h1>
                        <p>
                            {* eztagcloud( hash( 'class_identifier', $class_identifier,
                                               'parent_node_id', $used_node.node_id,
                                               'limit', $tag_cloud_limit,
                                               'sort_by', array( 'count', false() ) ) ) *}
                            {* eztagcloud( hash( 'class_identifier', $class_identifier,
                                                   'parent_node_id', $used_node.node_id,
                                                   'limit', $tag_cloud_limit,
                                                   'sort_by', array( 'count' ),
                                                   'post_sort_by', 'keyword' ) ) *}
                        <ul>
                            {eztagcloud_new( hash( 'class_identifier', $class_identifier,
                                                   'parent_node_id', $used_node.node_id,
                                                   'limit', $tag_cloud_limit,
                                                   'sort_by', array( 'count' ),
                                                   'post_sort_by', 'keyword',
                                                   'exclude_tags', $tag_cloud_exclude_tags,
                                                   'exclude_strings', $tag_cloud_exclude_strings ) )}
                        </ul>
                        </p>
                        </div>

                        <div class="attribute-description">
                            {attribute_view_gui attribute=$used_node.object.data_map.description}
                        </div>

{if $extra_view}
                        <div class="attribute-archive">
                            <h1>{"Archive"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {foreach ezarchive( $class_identifier, $used_node.node_id ) as $archive}
                                <li><a href={concat( $used_node.url_alias, "/(month)/", $archive.month, "/(year)/", $archive.year )|ezurl} title="">{$archive.timestamp|datetime( 'custom', '%F %Y' )}</a></li>
                            {/foreach}
                            </ul>
                        </div>

                        {include uri='design:parts/blog/calendar.tpl'}
                        {*
                        Dissabled due to extream production performance requirements
                        <div class="attribute-tags">
                            <h1>{"Tags list"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {def $keywordlist_filtered=array()}
                            {foreach ezkeywordlist( $class_identifier, $used_node.node_id ) as $item}
                            {if fetch( 'content', 'keyword_count', hash( 'alphabet', $item.keyword, 'classid', 'blog_post','parent_node_id', $used_node.node_id ) )|gt( 2 )}
                            {set $keywordlist_filtered=$keywordlist_filtered|append( $item )}
                            {/if}
                            {/foreach}
                            {if $used_node.node_id|eq( $ezp_issues_node_id, $community_issues_node_id )}{set $keywordlist_filtered=$keywordlist_filtered|reverse}{/if}
                            {foreach $keywordlist_filtered as $index => $keyword}
                                {if $index|le( $tag_list_keyword_limit )}
                                <li><a href={concat( $used_node.url_alias, "/(tag)/", $keyword.keyword|rawurlencode )|ezurl} title="{$keyword.keyword}">{$keyword.keyword} ({fetch( 'content', 'keyword_count', hash( 'alphabet', $keyword.keyword, 'classid', 'blog_post','parent_node_id', $used_node.node_id ) )})</a></li>
                                {/if}
                            {/foreach}
                            </ul>
                        </div>
                        *}

{/if}