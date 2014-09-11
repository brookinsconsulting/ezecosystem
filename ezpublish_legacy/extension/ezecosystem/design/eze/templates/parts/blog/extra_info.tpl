{def $tag_cloud_limit=190}
{if or( $used_node.node_id|eq( 4198 ), $used_node.node_id|eq( 9181 ) )}
  {def $class_identifier='issue_post'}
{else}
  {def $class_identifier='blog_post'}
{/if}

                        <div class="attribute-tag-cloud">
                        <h1>Tag cloud</h1>
                        <p>
                            {* eztagcloud( hash( 'class_identifier', $class_identifier,
                                               'parent_node_id', $used_node.node_id,
                                               'limit', $tag_cloud_limit,
                                               'sort_by', array( 'count', false() ) ) ) *}
                        <ul>
                            {eztagcloud( hash( 'class_identifier', $class_identifier,
                                               'parent_node_id', $used_node.node_id,
                                               'limit', $tag_cloud_limit,
                                               'sort_by', array( 'count' ),
                                               'post_sort_by', 'keyword' ) )}
                        </ul>
                        </p>
                        </div>

                        <div class="attribute-description">
                            {attribute_view_gui attribute=$used_node.object.data_map.description}
                        </div>

                        <div class="attribute-archive">
                            <h1>{"Archive"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {foreach ezarchive( $class_identifier, $used_node.node_id ) as $archive}
                                <li><a href={concat( $used_node.url_alias, "/(month)/", $archive.month, "/(year)/", $archive.year )|ezurl} title="">{$archive.timestamp|datetime( 'custom', '%F %Y' )}</a></li>
                            {/foreach}
                            </ul>
                        </div>

                        {include uri='design:parts/blog/calendar.tpl'}

                        <div class="attribute-tags">
                            <h1>{"Tags"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {foreach ezkeywordlist( $class_identifier, $used_node.node_id )|reverse() as $index => $keyword}
                                {if $index|le( 150 )}
                                <li><a href={concat( $used_node.url_alias, "/(tag)/", $keyword.keyword|rawurlencode )|ezurl} title="{$keyword.keyword}">{$keyword.keyword} ({fetch( 'content', 'keyword_count', hash( 'alphabet', $keyword.keyword, 'classid', 'blog_post','parent_node_id', $used_node.node_id ) )})</a></li>
                                {/if}
                            {/foreach}
                            </ul>
                        </div>

