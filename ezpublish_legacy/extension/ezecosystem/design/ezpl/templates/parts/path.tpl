{if or( $root_node_id|is_set|not, $github_node_id|is_set|not )}
{def $root_node_id=ezini('TreeMenu','RootNodeID','contentstructuremenu.ini')
     $github_node_id=ezini( 'NodeIDSettings', 'GitHubNodeID', 'ezecosystem.ini' )}
{/if}
{if and( $current_node_id|ne( $root_node_id ), $current_node_id|ne( $github_node_id ) )}
{def $pagedata_path_array_contstrained=$pagedata.path_array|remove( 0 )}
  <!-- Path content: START -->
  <p>
  {foreach $pagedata_path_array_contstrained as $path}
  {if $path.url}
    <a href={cond( is_set( $path.url_alias ), $path.url_alias,
                                        $path.url )|ezurl}>{$path.text|wash}</a>
  {else}
    <span class="path-text">{$path.text|wash}</span>
  {/if}
  {delimiter}<span class="path-separator">/</span>{/delimiter}
  {/foreach}
  </p>
  <!-- Path content: END -->
{/if}