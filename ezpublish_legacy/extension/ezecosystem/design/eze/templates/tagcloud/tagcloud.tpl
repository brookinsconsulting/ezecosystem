{def $excluded_tags=array(
     'greg@granitehorizon.com (Greg McAvoy-Jensen)', 'greg@granitehorizon.com (Robert Rose)',
     'ranitehorizon', '01 May 2008', '08 Mar 2011', '04 Nov 2009', '25 Aug 2009', '30 Sep 2010',
     'Thu', '社区委员会', 'wascou'
)}
{foreach $tag_cloud as $index => $tag}
{if $excluded_tags|contains( $tag['tag'] )|not}
<li><a href={concat( "/content2/keyword/", $tag['tag']|rawurlencode, '/(limit)/90' )|ezurl()} class="tag{$tag['font_size']}" style="font-size: {$tag['font_size']}%" title="{$tag['count']} objects tagged with '{$tag['tag']|wash()}'">{$tag['tag']|explode('-')|implode('&#8209;')}</a></li>
{/if}
{/foreach}