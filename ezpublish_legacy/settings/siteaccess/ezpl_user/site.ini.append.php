<?php /* #?ini charset="utf-8"?

[ContentSettings]
StaticCache=enabled

[DebugSettings]
DebugOutput=disabled

[TemplateSettings]
ShowUsedTemplates=disabled

# If you disable some modules or part of a module you can use the
# SiteAccessRules group, this defines a list of rules which are
# run in order.
#
# The following is an example of how to disable content/search
# and the rss module

[SiteAccessRules]
Rules[]
# Set access policy to allowed
Rules[]=access;enable
# Special syntax which means any module
# This means that for now all modules are enabled
Rules[]=moduleall
# Set policy to denied
Rules[]=access;disable
Rules[]=module;user/register
Rules[]=module;content/versionview
Rules[]=module;content/history
Rules[]=module;content/tipafriend

[InformationCollectionSettings]
EmailReceiver=info@brookinsconsulting.com

[Session]
SessionNamePerSiteAccess=disabled

[SiteSettings]
SiteName=eZ Publish Legacy
SiteURL=eZPublishLegacy.com
LoginPage=embedded
AdditionalLoginFormActionURL=http://admin.ezecosystem.org/user/login
# Which page to show when the root index (/) is accessed
IndexPage=/content/view/full/17312/
# What to do when a module does not exists, use either defaultpage or displayerror
# If defaultpage is used, the DefaultPage will be shown when an error occured
ErrorHandler=displayerror
# The default page to show, e.g. after user login this will be used for default redirection
DefaultPage=/content/view/full/17312/
MetaDataArray[author]=eZecosystem
MetaDataArray[copyright]=eZecosystem (except where otherwise noted.)
MetaDataArray[description]=An eZ Publish Download Mirror
MetaDataArray[keywords]=ezpublish, eZ Publish, eZ, tag, community, ecosystem, developer, ezcommunity, ezecosystem, eZ Community, eZ Ecosystem, cms, publish, e-commerce, content management, development framework, share, ezpl, ezpublishlegacy, eZ Publish Legacy, downloads, mirror, packages, files

[UserSettings]
RegistrationEmail=info@brookinsconsulting.com

[SiteAccessSettings]
RequireUserLogin=false
RelatedSiteAccessList[]
RelatedSiteAccessList[]=ezpl_user
RelatedSiteAccessList[]=ezwebin_site_admin
ShowHiddenNodes=false
PathPrefix=eZ-Publish-Legacy

[DesignSettings]
SiteDesign=ezpl
AdditionalSiteDesignList[]
AdditionalSiteDesignList[]=eze
AdditionalSiteDesignList[]=ezwebin
AdditionalSiteDesignList[]=base

[RegionalSettings]
Locale=eng-US
ContentObjectLocale=eng-US
ShowUntranslatedObjects=disabled
SiteLanguageList[]
SiteLanguageList[]=eng-US
TextTranslation=disabled

[FileSettings]
VarDir=var/ezwebin_site

[ContentSettings]
TranslationList=

[MailSettings]
AdminEmail=info@brookinsconsulting.com
EmailSender=info@ezecosystem.org


*/ ?>
