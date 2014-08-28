#!/bin/bash

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=atomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=brookinsconsultinggithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=gggeekgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=ezoegithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=gggeekgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=jdespatisgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=crevillogithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=andreromgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=dpobelgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=bdunogiergithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=pedroresendegithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=ezpublish-communitygithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=ezpublish-kernelgithubatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=ezpublishjiraatomimporthandler -vdc;

php ./extension/sqliimport/bin/php/sqlidoimport.php -s ezwebin_site_user --source-handlers=ezcommunityjiraatomimporthandler -vdc;

### php ./clr --clear-all;
### php ./clr --clear-tag=content;

