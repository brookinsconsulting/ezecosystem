<?php /* #?ini charset="utf-8"?

[ViewCacheSettings]
ClearRelationTypes[]=common
ClearRelationTypes[]=reverse_common
ClearRelationTypes[]=reverse_embedded
ClearRelationTypes[]=reverse_attribute
SmartCacheClear=enabled

[forum_reply]
DependentClassIdentifier[]=frontpage
DependentClassIdentifier[]=forum_topic
DependentClassIdentifier[]=forums
DependentClassIdentifier[]=forum
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
ClearCacheMethod[]=siblings

[forum_topic]
DependentClassIdentifier[]=forum
DependentClassIdentifier[]=forums
DependentClassIdentifier[]=folder
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
AdditionalObjectIDs[]
AdditionalObjectIDs[]=45509
AdditionalObjectIDs[]=37252
AdditionalObjectIDs[]=214

[folder]
DependentClassIdentifier[]=frontpage
DependentClassIdentifier[]=folder
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[gallery]
DependentClassIdentifier[]=folder
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[image]
DependentClassIdentifier[]=gallery
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
ClearCacheMethod[]=siblings

[event]
DependentClassIdentifier[]=event_calendar
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[article]
DependentClassIdentifier[]=folder
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[article_mainpage]
DependentClassIdentifier[]=folder
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[article_subpage]
DependentClassIdentifier[]=article_mainpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
ClearCacheMethod[]=siblings

[product]
DependentClassIdentifier[]=folder
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[infobox]
DependentClassIdentifier[]=folder
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[documentation_page]
DependentClassIdentifier[]=documentation_page
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[banner]
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[geo_article]
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating

[blog_post]
DependentClassIdentifier[]=blog
DependentClassIdentifier[]=folder
DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
AdditionalObjectIDs[]
AdditionalObjectIDs[]=65
AdditionalObjectIDs[]=39345

[issue_post]
DependentClassIdentifier[]=blog
DependentClassIdentifier[]=folder
#DependentClassIdentifier[]=frontpage
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
AdditionalObjectIDs[]
AdditionalObjectIDs[]=39610
#AdditionalObjectIDs[]=65

[release]
DependentClassIdentifier[]=release
DependentClassIdentifier[]=folder
ClearCacheMethod[]=object
ClearCacheMethod[]=parent
ClearCacheMethod[]=relating
AdditionalObjectIDs[]
AdditionalObjectIDs[]=39363
AdditionalObjectIDs[]=39389

*/ ?>