{* Forum Topic - Full view *}
{set scope=global persistent_variable=hash('left_menu', false(),
                                           'extra_menu', false())}

{def $view_count_enabled=cond( ezini('eZecosystemSettings','ViewCountDisplay','ezecosystem.ini')|eq('enabled'), true() )
     $view_count_threshold=ezini('eZecosystemSettings','ViewCountThreshold','ezecosystem.ini')
     $sources_list_share_ez_no_forum_node_ids=ezini('SourcesSidebarSettings','ShareForumNodeIDs','ezecosystem.ini')
     $projects_forum_node_id=ezini('NodeIDSettings', 'ProjectsForumNodeID', 'ezecosystem.ini')
     $stackoverflow_ezpublish_forum_node_id=ezini('NodeIDSettings', 'StackOverflowTagEzPublishNodeID', 'ezecosystem.ini')
     $stackoverflow_ezplatform_forum_node_id=ezini('NodeIDSettings', 'StackOverflowTagEzPlatformNodeID', 'ezecosystem.ini')}

<div class="class-blog extrainfo">
    <div class="columns-blog float-break">
        <div class="main-column-position">
            <div class="main-column float-break">
                <div class="border-box">
                <div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
                <div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

                        <div class="content-view-full">
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
                                    <p class="date">{$node.data_map.publication_date.content.timestamp|l10n(shortdatetime)}</p>
                                    <p class="author">By: {if $node.parent.node_id|eq( $projects_forum_node_id )}{$node.data_map.forum_topic_author.content|explode('community@ez.no (')|implode('')|explode(')')|implode('')|autolink}{elseif or( $node.parent.node_id|eq( $stackoverflow_ezpublish_forum_node_id ), $node.parent.node_id|eq( $stackoverflow_ezplatform_forum_node_id ) )}{$node.data_map.forum_topic_author.content}{else}{$node.data_map.forum_topic_author.content|autolink}{/if}</p>
                                </div>

                                    {if and( $view_count_enabled, $node.view_count|gt( $view_count_threshold ) )}<p class="views"><a href="javascript:;" style="text-decoration:none;" title="View count @ {$node.view_count}">Views: {$node.view_count}</a></p>{/if}

				    {* if $$node.data_map.tags.has_content}
                                    <p class="tags"> {"Tags:"|i18n("design/ezwebin/full/blog_post")}
                                         {foreach $node.data_map.tags.content.keywords as $keyword}
                                             <a href={concat( $node.parent.url_alias, "/(id)/", $node.parent.node_id, "/(tag)/", $keyword|rawurlencode )|ezurl} title="{$keyword}">{$keyword}</a>
                                             {delimiter}
                                               ,
                                             {/delimiter}
                                         {/foreach}
                                    </p>
				    {/if *}
                                </div>

                                <div class="attribute-byline">
				    <br /><div><a href="{$node.data_map.link.content}">Read Original Item</a></div>
                                </div>

				<div class="attribute-body float-break">
                                  <p>{$node.data_map.title.content}</p>

                                  {if $node.data_map.message.has_content|eq(true() )}
                                    {if or( $node.parent.node_id|eq( $stackoverflow_ezpublish_forum_node_id ), $node.parent.node_id|eq( $stackoverflow_ezplatform_forum_node_id ) )}
                                      {$node.data_map.message.content}
                                    {elseif $sources_list_share_ez_no_forum_node_ids|contains( $node.parent.node_id )}
                                      {$node.data_map.message.content|autolink}
                                    {else}
                                      {$node.data_map.message.content|simpletags|autolink}
                                    {/if}
                                  {/if}
				</div>

                                {* include uri='design:parts/related_content.tpl' *}

                                <div class="attribute-byline">
				    <div><a href="{$node.data_map.link.content}">Read Original Item</a></div>
                                </div>

                                {* if $node.data_map.enable_comments.data_int}
                                <div class="attribute-comments">
                                    <a name="comments" id="comments"></a>
                                    <h1>{"Comments"|i18n("design/ezwebin/full/blog_post")}</h1>
                                    <div class="content-view-children">
                                        {foreach fetch_alias( comments, hash( parent_node_id, $node.node_id ) ) as $comment}
                                            {node_view_gui view='line' content_node=$comment}
                                        {/foreach}
                                    </div>

                                   {if fetch( 'content', 'access', hash( 'access', 'create', 'contentobject', $node, contentclass_id, 'comment' ) )}
                                   <form method="post" action={"content/action"|ezurl}>
                                       <input type="hidden" name="ClassIdentifier" value="comment" />
                                       <input type="hidden" name="NodeID" value="{$node.object.main_node.node_id}" />
                                       <input type="hidden" name="ContentLanguageCode" value="{ezini( 'RegionalSettings', 'ContentObjectLocale', 'site.ini')}" />
                                       <input class="button new_comment" type="submit" name="NewButton" value="{'New comment'|i18n( 'design/ezwebin/full/article' )}" />
                                   </form>
                                   {else}
                                       {if ezmodule( 'user/register' )}
                                           <p>{'%login_link_startLog in%login_link_end or %create_link_startcreate a user account%create_link_end to comment.'|i18n( 'design/ezwebin/full/blog_post', , hash( '%login_link_start', concat( '<a href="', '/user/login'|ezurl(no), '">' ), '%login_link_end', '</a>', '%create_link_start', concat( '<a href="', "/user/register"|ezurl(no), '">' ), '%create_link_end', '</a>' ) )}</p>
                                       {else}
                                           <p>{'%login_link_startLog in%login_link_end to comment.'|i18n( 'design/ezwebin/article/comments', , hash( '%login_link_start', concat( '<a href="', '/user/login'|ezurl(no), '">' ), '%login_link_end', '</a>' ) )}</p>
                                       {/if}
                                   {/if}
                                </div>
                                {/if *}
                            </div>
                        </div>

                </div></div></div>
                <div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
                </div>
            </div>
        </div>
        {*
        <div class="extrainfo-column-position">
            <div class="extrainfo-column">
                <div class="border-box">
                <div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
                <div class="border-ml"><div class="border-mr"><div class="border-mc float-break">
                        {include uri='design:parts/blog/extra_info.tpl' used_node=$node.parent}
                </div></div></div>
                <div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
                </div>
            </div>
        </div> *}
    </div>
</div>