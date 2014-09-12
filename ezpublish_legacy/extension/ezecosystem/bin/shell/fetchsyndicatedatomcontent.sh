#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=ezpublishjiraatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=ezcommunityjiraatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=ezpublish-legacygithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=ezpublish-communitygithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=ezpublish-kernelgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=brookinsconsultinggithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=brookinsconsultinggistgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=gggeekgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=jdespatisgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=crevillogithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=andreromgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=dpobelgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=bdunogiergithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=pedroresendegithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=fabienpotencieratomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=yannickrogergithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=lolautruchegithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=peterkeunggithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s $siteaccess --source-handlers=xrowgithubatomimporthandler -vdc;

