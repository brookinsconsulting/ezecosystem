<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full sidebar-content-container">
    <div class="class-folder">
    <h3>Planetarium<h3>

    {def $planetariumLinks = fetch( 'content', 'list', hash( 'parent_node_id', $blogs_planetarium_id,
                                                             'sort_by', array( 'priority', false() ),
                                                             'depth', 2,
                                                             'class_filter_type', 'include',
                                                             'class_filter_array', array( 'link' ),
                                                             'limit', 30 ) )}
    <div class="sidebar-content">
    <ul>
    {foreach $planetariumLinks as $link}
        <li><a href="{$link.data_map.location.content}">{$link.name}</a></li>
    {/foreach}
    </ul>
    </div>

     <div align="right"><a href="#top">Top</a></div>

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
