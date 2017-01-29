<?php /* #?ini charset="utf-8"?

[ContentSettings]
StaticCacheHandler=eZecosystemStaticCache

[DatabaseSettings]
## DatabaseImplementation=ezmysql
#DatabaseImplementation=ezmysqli
Database=ezecosystem
Charset=
Socket=disabled
Port=
# Disabled pending further sql performance analysis
#QueryAnalysisOutput=disabled
#SQLOutput=disabled
#SQLOutput=enabled
#SlowQueriesOutput=40

[DebugSettings]
#DebugOutput=enabled
DebugByIP=enabled
DebugIPList[]
DebugIPList[]=172.7.240.131
DebugIPList[]=192.168.1.73
DebugIPList[]=127.0.0.1
DebugIPList[]=::1/32

[TemplateSettings]
# Enabled to see which template files are loaded or disabled to supress debug
# Warning: Will add debug xhtml comments to your source code, including mails!
# Note: No debug on templates starting with <!DOCTYPE to not trigger quirks mode!
# Debug=enabled

[ExtensionSettings]
ActiveExtensions[]
ActiveExtensions[]=ezecosystem
ActiveExtensions[]=ezchangeclass
ActiveExtensions[]=ezsh
ActiveExtensions[]=swark
ActiveExtensions[]=bcupdatecache
ActiveExtensions[]=bcgeneratestaticcache
ActiveExtensions[]=bcdatetimefilter
ActiveExtensions[]=hfpfetchrandom
ActiveExtensions[]=git_manager
ActiveExtensions[]=nl_cronjobs
ActiveExtensions[]=ggsysinfo
ActiveExtensions[]=OWSimpleOperator
ActiveExtensions[]=bcgooglesitemaps
ActiveExtensions[]=ezs3upload
ActiveExtensions[]=sqliimport
ActiveExtensions[]=ezjscore
ActiveExtensions[]=ezoe
##ActiveExtensions[]=ezformtoken
ActiveExtensions[]=ezwt
ActiveExtensions[]=ezstarrating
ActiveExtensions[]=ezgmaplocation
ActiveExtensions[]=ezwebin
ActiveExtensions[]=ezie
ActiveExtensions[]=ezodf
##ActiveExtensions[]=ezprestapiprovider
ActiveExtensions[]=ezmultiupload
##ActiveExtensions[]=eztags
ActiveExtensions[]=ezautosave
ActiveExtensions[]=ezfind

[Session]
RememberMeTimeout=864000
Handler=
SessionTimeout=2592000
ActivityTimeout=2592000
ForceStart=disabled
SessionNameHandler=default
#SessionNameHandler=custom
SessionNamePerSiteAccess=enabled

[SiteSettings]
DefaultAccess=ezwebin_site_user
SiteList[]
SiteList[]=ezwebin_site_user
SiteList[]=eze_user_nocache
SiteList[]=ezwebin_site_admin
SiteList[]=eze_user_local
SiteList[]=eze_user_local_nocache
SiteList[]=eze_user_admin
SiteList[]=ezpl_user
SiteList[]=ezpl_user_local
RootNodeDepth=1

[UserSettings]
LogoutRedirect=/

[SiteAccessSettings]
CheckValidity=false
AvailableSiteAccessList[]
AvailableSiteAccessList[]=ezwebin_site_user
AvailableSiteAccessList[]=ezwebin_site_admin
AvailableSiteAccessList[]=eze_user_local
AvailableSiteAccessList[]=eze_admin_local
AvailableSiteAccessList[]=eze_user_nocache
AvailableSiteAccessList[]=eze_user_local_nocache
AvailableSiteAccessList[]=ezpl_user
AvailableSiteAccessList[]=ezpl_user_local
MatchOrder=host
HostMatchMapItems[]
HostMatchMapItems[]=ezecosystem.org;ezwebin_site_user
HostMatchMapItems[]=www.ezecosystem.org;ezwebin_site_user
HostMatchMapItems[]=admin.ezecosystem.org;ezwebin_site_admin
HostMatchMapItems[]=cache.ezecosystem.org;ezwebin_site_admin
HostMatchMapItems[]=nocache.ezecosystem.org;eze_user_nocache
HostMatchMapItems[]=ezecosystem;eze_user_local
HostMatchMapItems[]=admin.ezecosystem;eze_admin_local
HostMatchMapItems[]=cache.ezecosystem;eze_user_local
HostMatchMapItems[]=nocache.ezecosystem;eze_user_local_nocache
HostMatchMapItems[]=ezecosystem.ccplatform.net;ezwebin_site_user
HostMatchMapItems[]=ezecosystem.ssd.thinkcreativeinternal.net;ezwebin_site_user
HostMatchMapItems[]=admin.ezecosystem.ssd.thinkcreativeinternal.net;ezwebin_site_admin
HostMatchMapItems[]=ezpublishlegacy.com;ezpl_user
HostMatchMapItems[]=www.ezpublishlegacy.com;ezpl_user
HostMatchMapItems[]=ezpublishlegacy;ezpl_user_local
#HostMatchMapItems[]=ezecosystem.com;ezwebin_site_user
#HostMatchMapItems[]=www.ezecosystem.com;ezwebin_site_user
#HostMatchMapItems[]=admin.ezecosystem.com;ezwebin_site_admin
ForceVirtualHost=true

[DesignSettings]
DesignLocationCache=enabled

[RegionalSettings]
TranslationSA[]
#TranslationSA[eng]=Eng

[FileSettings]
VarDir=var/ezwebin_site

[MailSettings]
Transport=sendmail
AdminEmail=info@brookinsconsulting.com
EmailSender=info@ezecosystem.org

[EmbedViewModeSettings]
AvailableViewModes[]
AvailableViewModes[]=embed
AvailableViewModes[]=embed-inline
InlineViewModes[]
InlineViewModes[]=embed-inline
*/ ?>
