<div id="logo">
    <a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}"><img src="/extension/ezecosystem/design/eze/images/eZecosystem.png" title="eZecosystem : An eZ Publish Community Planet" alt="eZecosystem : An eZ Publish Community Planet" width="327" height="107"></a>

{* if $pagedesign.data_map.image.content.is_valid|not()}
    <h1><a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}">{ezini('SiteSettings','SiteName')|wash}</a></h1>
{else}
    <a href={"/"|ezurl} title="{ezini('SiteSettings','SiteName')|wash}"><img src={$pagedesign.data_map.image.content[original].full_path|ezroot} title="{$pagedesign.data_map.image.content[original].text}" alt="{$pagedesign.data_map.image.content[original].text}" width="{$pagedesign.data_map.image.content[original].width}" height="{$pagedesign.data_map.image.content[original].height}" /></a>
{/if *}
</div>