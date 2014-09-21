#!/bin/bash

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

# Fetch all syndicated content atom and rss
./extension/ezecosystem/bin/shell/fetchsyndicatedcontent.sh $siteaccess;

# Refresh home page(s) static cache
./extension/ezecosystem/bin/shell/refreshhomepagestaticcache.sh $siteaccess;

exit;
