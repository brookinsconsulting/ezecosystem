#!/bin/bash

if [[ -z "$1" ]]; then
siteaccess="ezwebin_site_user";
else
siteaccess="$1";
fi

echo "Using siteaccess $siteaccess";
echo "";

if [[ -z "$2" ]]; then
type="index";
else
type="$2";
fi

if [[ -z "$3" ]]; then
subtree="";
echo "Caching indexes only";
echo "";
else
echo "Caching subtree with *";
echo "";
subtree="$3";
fi

if [[ "$type" = "index" ]]; then
echo "Generating indexes ...";
echo "";
# Refresh Home Page Indexes

php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/$subtree --force -s $siteaccess;

php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror$subtree --force -s $siteaccess;

php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Issues$subtree --force -s $siteaccess;

elif [[ "$type" = "blogindex" ]]; then
echo "Generating blog indexes ...";
echo "";

# Refresh Mirror Blog Indexes

php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror$subtree --children --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/BC-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Jerome-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/CR-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Projects-Commits$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Projects.ez.no-New$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Damien-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Share.ez.no-Blogs$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Xrow-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/BD-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/YR-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/JD-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/GG-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Pedro-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Publish-Commits$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Andre-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZP-Kernel-Commits$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Community-Issues$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Systems-Blog$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZP-Legacy-Commits$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Peter-GitHub$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Symfony-Blog$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Mugo-Web$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Projects.ez.no-News$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Netgen$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZpedia$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Share.ez.no-Articles$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Kaliop-Blog$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Publish-Meetup$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Fabien-Potencier$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Symfony-Planet$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Damien-Pobel$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/NXC-Blog$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Derick-Rethans$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Guillaume-Kulakowski$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/ez-publish-blog.de$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Publish-Builds$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Publish-Jobs$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Systems-News$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Planet-eZ-Publish.fr$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Publish-Youtube$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Granite-Horizon$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/eZ-Roadmap$subtree --force -s $siteaccess;

# php ./extension/bcgeneratestaticcache/bin/php/bcgeneratestaticcache.php --subtree=/Mirror/Projects.ez.no-Forums$subtree --force -s $siteaccess;

fi

exit;
# END