{foreach $tag_cloud as $tag}
{if array( 'greg@granitehorizon.com (Greg McAvoy-Jensen)', 'greg@granitehorizon.com (Robert Rose)' )|contains( $tag['tag'] )|not}
{if $tag['tag']|contains( 'ranitehorizon' )|not}
{if $tag['tag']|contains( '01 May 2008' )|not}
{if $tag['tag']|contains( '08 Mar 2011' )|not}
{if $tag['tag']|contains( '04 Nov 2009' )|not}
{if $tag['tag']|contains( '25 Aug 2009' )|not}
{if $tag['tag']|contains( '30 Sep 2010' )|not}
{if $tag['tag']|contains( 'Thu' )|not}
<a href={concat( "/content2/keyword/", $tag['tag']|rawurlencode, '/(limit)/90' )|ezurl()} style="font-size: {$tag['font_size']}%" title="{$tag['count']} objects tagged with '{$tag['tag']|wash()}'">{$tag['tag']|wash()}</a> 
{/if}
{/if}
{/if}
{/if}
{/if}
{/if}
{/if}
{/if}
{/foreach}