#?ini charset="utf-8"?
# eZ Publish configuration file.
#
# NOTE: It is not recommended to edit this file directly, instead
#       a file in override should be created for setting the
#       values that is required for your site. Either create
#       a file called settings/override/staticcache.ini.append or
#       settings/override/staticcache.ini.append.php for more security
#       in non-virtualhost modes (the .php file may already be present
#       and can be used for this purpose).
[CacheSettings]
# This setting has been deprecated since version 4.4
# Hostname is read from site.ini.[SiteSettings].SiteURL per siteaccess
# defined in staticcache.ini.[CacheSettings].CachedSiteAccesses
# This setting will be removed in future release
HostName=
StaticStorageDir=var/ezwebin_site/static
MaxCacheDepth=8

# A list of url's to cache. You can use the * wildcard to include a whole
# subtree.
CachedURLArray[]
CachedURLArray[]=/
CachedURLArray[]=/Mirror*
CachedURLArray[]=/GitHub
CachedURLArray[]=/Issues
CachedURLArray[]=/About*
CachedURLArray[]=/About-eZ-Publish*
CachedURLArray[]=/Contact-Us*

# A list of site accesses to generate static content for
CachedSiteAccesses[]
#CachedSiteAccesses[]=ezwebin_site_user
CachedSiteAccesses[]=eze_user_local

# A list of locations that will be updated whenever an object is published. You
# can NOT use a wildcard here.
AlwaysUpdateArray[]
#AlwaysUpdateArray[]=/
#AlwaysUpdateArray[]=/Mirror
#AlwaysUpdateArray[]=/Issues
#AlwaysUpdateArray[]=/Mirror/Share.ez.no-Forums

# Defer cache generation to cronjob.
CronjobCacheClear=enabled

# Controls whenever <!-- Generated: YYY-MM-DD HH:MM:SS --> comment
# should be appended into the generated static cache file.
AppendGeneratedTime=true
