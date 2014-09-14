{def $popular_nodes_combined_sorted=array()
     $popular_nodes=array()}

{* Fetch popular content *}
{foreach $class_ids as $class_id}
{set $popular_nodes=$popular_nodes|merge( fetch( 'content', 'view_top_list', hash( 'class_id', $class_id, 'limit', 7, 'offset', 0 ) ) )}
{/foreach}


{* Sort popular nodes *}
{foreach $popular_nodes as $index => $node}
{set $popular_nodes_combined_sorted=$popular_nodes_combined_sorted|append( array( $node.view_count, $node ) )}
{/foreach}
{set $popular_nodes_combined_sorted=$popular_nodes_combined_sorted|ksort}

{* Display popular node list *}
{if $popular_nodes_combined_sorted|count|gt( 0 )}
<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full sidebar-content-container">
    <div class="class-folder">
    <h3>Popular<h3>
    <div class="sidebar-container">
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