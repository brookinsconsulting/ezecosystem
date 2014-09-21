#!/bin/bash

# Test for optional siteacecss shell argument
if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

# Refresh static cache of the root node and it's children
./extension/ezecosystem/bin/shell/generatestaticcacheindexes.sh $siteaccess /;

# Refresh static cache of the /Mirror node and it's children
./extension/ezecosystem/bin/shell/generatestaticcacheindexes.sh $siteaccess /Mirror;

# Refresh static cache of the /Mirror node and it's children
./extension/ezecosystem/bin/shell/generatestaticcacheindexes.sh $siteaccess /Mirror/Share.ez.no-Forums;

exit;
