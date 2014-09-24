#!/bin/bash

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

./extension/ezecosystem/bin/shell/fetchsyndicatedatomcontent.sh $siteaccess;

./extension/ezecosystem/bin/shell/fetchsyndicatedrsscontent.sh $siteaccess;

exit;
