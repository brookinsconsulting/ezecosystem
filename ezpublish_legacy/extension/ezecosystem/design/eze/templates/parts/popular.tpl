{def $popular_nodes_count=0
     $popular_nodes_combined_sorted=array()
     $popular_nodes=fetch( 'content', 'view_top_list',
                            hash( 'class_id', $class_ids[0],
                                   'limit', 7,
                                   'offset', 0 ) )}
{set $popular_nodes=$popular_nodes|merge( fetch( 'content', 'view_top_list',
                            hash( 'class_id', $class_ids[1],
                                   'limit', 7,
                                   'offset', 0 ) ) )}
{foreach $popular_nodes as $index => $node}
{set $popular_nodes_combined_sorted=$popular_nodes_combined_sorted|append( array( $node.view_count, $node ) )
     $popular_nodes_count=$popular_nodes_count|sum( 1 )}
{/foreach}
{set $popular_nodes_combined_sorted=$popular_nodes_combined_sorted|ksort}

{if $popular_nodes_combined_sorted|count|gt( 0 )}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full" style="width: 210px;">
    <div class="class-folder">
    <h3>Popular<h3>
    <div style="width: 200px">
    <ul>
        {foreach $popular_nodes_combined_sorted as $node}
            <li><a href={$node[1].url_alias|ezurl} title="{$node[1].name|wash}">{if $node[1].name|count_chars|gt( 30 )}{$node[1].name|extract( 0, 30 )|append(' ...' )|wash}{else}{$node[1].name|wash}{/if}</a> ({$node[0]})</li>
        {/foreach}

        {undef $popular_nodes_combined_sorted}
    </ul>
    </div>

     <div align="right"><a href="#top">Top</a></div>
    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
{/if}