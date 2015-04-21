#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

if [[ -z "$2" ]]; then
# This timeout default worked fine until, 2015-04-16 when server performance (execution slowdowns?) or other unknowns caused it to no longer be long enough to complete it's normal execution. So I am leaving this historical note (for me) and increasing the timeout (for further testing)
# timelimitseconds="240";
timelimitseconds="380";
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