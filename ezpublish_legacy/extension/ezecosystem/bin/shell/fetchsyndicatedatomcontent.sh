#!/bin/bash

# Define import source handler arrays
atom_jira_sources=( ezpublishjiraatomimporthandler ezcommunityjiraatomimporthandler )
atom_alt_sources=( stackoverflowtagezpublishatomimporthandler partialcontentatomimporthandler fabienpotencieratomimporthandler )
atom_github_sources=( ezpublish-legacygithubatomimporthandler ezpublish-communitygithubatomimporthandler ezpublish-kernelgithubatomimporthandler ezcommunitygithubatomimporthandler ezsystemsgithubatomimporthandler brookinsconsultinggithubatomimporthandler brookinsconsultinggistgithubatomimporthandler ezpublishlegacygithubatomimporthandler gggeekgithubatomimporthandler jdespatisgithubatomimporthandler crevillogithubatomimporthandler andreromgithubatomimporthandler dpobelgithubatomimporthandler bdunogiergithubatomimporthandler pedroresendegithubatomimporthandler yannickrogergithubatomimporthandler lolautruchegithubatomimporthandler peterkeunggithubatomimporthandler xrowgithubatomimporthandler thiagocamposvianagithubatomimporthandler joaoinaciogithubatomimporthandler glyegithubatomimporthandler pspanjagithubatomimporthandler xinyuexrowgithubatomimporthandler xrowkristinagithubatomimporthandler emodricgithubatomimporthandler )

# Combine source arrays in order
all_atom_sources=( "${atom_jira_sources[@]}" "${atom_alt_sources[@]}" "${atom_github_sources[@]}" )

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

# Iterate throug jira, github and alt sources and run atom content import
for source in "${all_atom_sources[@]}"
do
php ./extension/sqliimport/bin/php/sqlidoimport.php --siteaccess=$siteaccess --source-handlers=$source;
done

# Clear the sqliimport ezsite_data status entry / row
php ./extension/ezecosystem/bin/php/ezesqliimportstatusreset.php;

# Clear view cache for all importated content
php -d memory_limit=-1 ./runcronjobs.php --siteaccess $siteaccess sqliimport_cleanup;

# Test to determin if script is not being used on production siteacess
if [[ $siteaccess != "ezwebin_site_user" ]]; then
# Refresh static cache for all importated content
php -d memory_limit=-1 ./runcronjobs.php --siteaccess $siteaccess staticcache_cleanup;
fi

exit;