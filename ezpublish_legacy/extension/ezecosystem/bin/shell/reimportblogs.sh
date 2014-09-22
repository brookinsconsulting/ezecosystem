#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

./extension/ezecosystem/bin/php/ezsubtreeremoveallblogs.php;

php ./runcronjobs.php --siteaccess=$siteaccess rssimport;
