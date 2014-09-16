#!/bin/bash

# Define import source handler arrays
atom_jira_sources=( ezpublishjiraatomimporthandler ezcommunityjiraatomimporthandler )
atom_github_sources=( ezpublish-legacygithubatomimporthandler ezpublish-communitygithubatomimporthandler ezpublish-kernelgithubatomimporthandler brookinsconsultinggithubatomimporthandler brookinsconsultinggistgithubatomimporthandler gggeekgithubatomimporthandler jdespatisgithubatomimporthandler crevillogithubatomimporthandler andreromgithubatomimporthandler dpobelgithubatomimporthandler bdunogiergithubatomimporthandler pedroresendegithubatomimporthandler fabienpotencieratomimporthandler yannickrogergithubatomimporthandler lolautruchegithubatomimporthandler peterkeunggithubatomimporthandler xrowgithubatomimporthandler )

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

# Iterate throug jira sources and run atom content import
for source in "${atom_jira_sources[@]}"
do
php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=$source;
done

# Iterate throug github sources and run atom content import
for source in "${atom_github_sources[@]}"
do
php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=$source;
done

# Clear view cache for all importated content
php -d memory_limit=-1 ./runcronjobs.php -s $siteaccess sqliimport_cleanup;
