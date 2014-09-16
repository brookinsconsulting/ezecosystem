#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

php ./runcronjobs.php -s ezwebin_site_user rssimport -s $siteaccess -q;
