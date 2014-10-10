#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

if [[ -z "$2" ]]; then
timelimitseconds="240";
else
timelimitseconds="$2";
fi

./extension/ezecosystem/bin/shell/timeout.sh $timelimitseconds php ./runcronjobs.php --siteaccess $siteaccess ezerssimport;

# Test to determin if script is not being used on production siteacess
if [[ $siteaccess != "ezwebin_site_user" ]]; then
# Refresh static cache for all importated content
php -d memory_limit=-1 ./runcronjobs.php --siteaccess $siteaccess staticcache_cleanup;
fi

exit;