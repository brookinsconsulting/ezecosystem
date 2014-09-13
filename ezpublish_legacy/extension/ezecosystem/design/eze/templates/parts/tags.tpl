{def $tag_cloud_limit=140
     $tag_cloud_class_identifier='blog_post'
     $tag_cloud_exclude_tags=array( 'greg@granitehorizon.com (Greg McAvoy-Jensen)', 'greg@granitehorizon.com (Robert Rose)',
                                    'ranitehorizon', '01 May 2008', '08 Mar 2011', '04 Nov 2009', '25 Aug 2009', '30 Sep 2010',
                                    'Thu', '社区委员会', 'wascou' )
     $tag_cloud_exclude_strings=array( 'EZP-', 'COM-' )}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full sidebar-content-container">
    <div class="class-folder">
    <h3>Tags<h3>

    <div class="attribute-tag-cloud">
                       <ul>
                            {* eztagcloud( hash( 'class_identifier', 'blog_post',
                                               'parent_node_id', $current_node_id,
					       'limit', $tag_cloud_limit,
					       'sort_by', array( 'count', false() ) ) ) *}
                            {*
                            {eztagcloud( hash( 'class_identifier', 'blog_post',
                                               'parent_node_id', $current_node_id,
					       'limit', $tag_cloud_limit,
					       'sort_by', array( 'count' ),
                                               'post_sort_by', 'keyword' ) )}
                            *}
                            {eztagcloud_new( hash( 'class_identifier', $tag_cloud_class_identifier,
                                                   'parent_node_id', $current_node_id,
                                                   'limit', $tag_cloud_limit,
                                                   'sort_by', array( 'count' ),
                                                   'post_sort_by', 'keyword',
                                                   'exclude_tags', $tag_cloud_exclude_tags,
                                                   'exclude_strings', $tag_cloud_exclude_strings ) )}
                        </ul>
    </div>

{*
{def $tags = ezkeywordlist()
     $archives=ezarchive()}

    <div class="sidebar-content">
    <ul>
                            {foreach $tags as $keyword}
                                <li><a href={concat( $used_node.url_alias, "/(tag)/", $keyword.keyword|rawurlencode )|ezurl} title="{$keyword.keyword}">{$keyword.keyword} ({fetch( 'content', 'keyword_count', hash( 'alphabet', $keyword.keyword, 'classid', 'blog_post','parent_node_id', $used_node.node_id ) )})</a></li>
                            {/foreach}
    </ul>
    </div>

    <h3>Archive<h3>
    <div class="sidebar-content">
    <ul>
                            {foreach $archives as $archive}
                                <li><a href={concat( $used_node.url_alias, "/(month)/", $archive.month, "/(year)/", $archive.year )|ezurl} title="">{$archive.timestamp|datetime( 'custom', '%F %Y' )}</a></li>
                            {/foreach}
    </ul>
    </div>
*}

	 <div align="right"><a href="#top">Top</a></div>

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>

{*
                        <div class="attribute-tag-cloud">
                        <p>
                            {eztagcloud( hash( 'class_identifier', 'blog_post',
                                               'parent_node_id', $used_node.node_id ) )}
                        </p>
                        </div>

                        <div class="attribute-description">
                            {attribute_view_gui attribute=$used_node.object.data_map.description}
                        </div>

                        <div class="attribute-tags">
                            <h1>{"Tags"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {foreach ezkeywordlist( 'blog_post', $used_node.node_id ) as $keyword}
                                <li><a href={concat( $used_node.url_alias, "/(tag)/", $keyword.keyword|rawurlencode )|ezurl} title="{$keyword.keyword}">{$keyword.keyword} ({fetch( 'content', 'keyword_count', hash( 'alphabet', $keyword.keyword, 'classid', 'blog_post','parent_node_id', $used_node.node_id ) )})</a></li>
                            {/foreach}
                            </ul>
                        </div>

                        <div class="attribute-archive">
                            <h1>{"Archive"|i18n("design/ezwebin/blog/extra_info")}</h1>
                            <ul>
                            {foreach ezarchive( 'blog_post', $used_node.node_id ) as $archive}
                                <li><a href={concat( $used_node.url_alias, "/(month)/", $archive.month, "/(year)/", $archive.year )|ezurl} title="">{$archive.timestamp|datetime( 'custom', '%F %Y' )}</a></li>
                            {/foreach}
                            </ul>
                        </div>

                        {include uri='design:parts/blog/calendar.tpl'}
*}

