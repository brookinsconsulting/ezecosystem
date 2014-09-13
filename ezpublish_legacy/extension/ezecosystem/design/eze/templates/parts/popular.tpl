{def $popular_nodes=fetch( 'content', 'view_top_list',
                            hash( 'class_id', $class_ids[0],
                                   'limit', 7,
                                   'offset', 0 ) )}
{set $popular_nodes=$popular_nodes|merge( fetch( 'content', 'view_top_list',
                            hash( 'class_id', $class_ids[1],
                                   'limit', 7,
                                   'offset', 0 ) ) )}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full" style="width: 210px;">
    <div class="class-folder">
    <h3>Popular<h3>
    <div style="width: 200px">
    <ul>
        {foreach $popular_nodes as $popular_node}
            <li><a href={$popular_node.url_alias|ezurl} title="{$popular_node.name|wash}">{if $popular_node.name|count_chars|gt( 30 )}{$popular_node.name|extract( 0, 30 )|append(' ...' )|wash}{else}{$popular_node.name|wash}{/if}</a> ({$popular_node.view_count})</li>
        {/foreach}

        {undef $popular_nodes}
    </ul>
    </div>

     <div align="right"><a href="#top">Top</a></div>
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>

