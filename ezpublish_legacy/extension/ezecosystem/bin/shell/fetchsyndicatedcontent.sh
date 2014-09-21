#!/bin/bash

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

./extension/ezecosystem/bin/shell/fetchsyndicatedatomcontent.sh $1;

./extension/ezecosystem/bin/shell/fetchrsscontent.sh $1;

exit;
