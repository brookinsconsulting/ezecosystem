{def $slug = 'An eZ Publish Download Archive'}
<div id="logo">
    <a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}"><img src="{'ezpublishlegacy.png'|ezimage('no')}" title="{ezini('SiteSettings','SiteName')|wash} : {$slug}" alt="{ezini('SiteSettings','SiteName')|wash} : {$slug}" width="417" height="127"></a>
    {* <div id="logo-text"><h1><a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}">{ezini('SiteSettings','SiteName')|wash}</a> - {$slug}</h1></div> *}

{* if $pagedesign.data_map.image.content.is_valid|not()}
    <h1><a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}">{ezini('SiteSettings','SiteName')|wash}</a></h1>
{else}
    <a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}"><img src={$pagedesign.data_map.image.content[original].full_path|ezroot} title="{$pagedesign.data_map.image.content[original].text}" alt="{$pagedesign.data_map.image.content[original].text}" width="{$pagedesign.data_map.image.content[original].width}" height="{$pagedesign.data_map.image.content[original].height}" /></a>
{/if *}
</div>