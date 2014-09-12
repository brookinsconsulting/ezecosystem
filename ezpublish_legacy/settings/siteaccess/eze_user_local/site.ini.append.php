<?php /* #?ini charset="utf-8"?

[DatabaseSettings]
DatabaseImplementation=ezmysqli
Server=127.0.0.1
Port=
User=db
Password=db
Database=ezecosystem
Charset=
Socket=disabled


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

[InformationCollectionSettings]
EmailReceiver=info@brookinsconsulting.com

[Session]
SessionNamePerSiteAccess=disabled

[SiteSettings]
SiteName=eZ Ecosystem
SiteURL=ezecosystem/
LoginPage=embedded
AdditionalLoginFormActionURL=http://admin.ezecosystem/index.php/user/login

[UserSettings]
RegistrationEmail=info@brookinsconsulting.com

[SiteAccessSettings]
RequireUserLogin=false
RelatedSiteAccessList[]
RelatedSiteAccessList[]=ezwebin_site_user
RelatedSiteAccessList[]=eng
RelatedSiteAccessList[]=ezwebin_site_admin
ShowHiddenNodes=false

[DesignSettings]
SiteDesign=eze
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