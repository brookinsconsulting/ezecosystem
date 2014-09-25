#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

php ./runcronjobs.php --siteaccess $siteaccess ezerssimport;

php ./runcronjobs.php --siteaccess $siteaccess staticcache_cleanup;

exit;