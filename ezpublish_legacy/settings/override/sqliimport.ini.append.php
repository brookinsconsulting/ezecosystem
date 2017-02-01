<?php /* #?ini charset="utf-8"?

[ImportSettings]
AvailableSourceHandlers[]=ezpublishjiraatomimporthandler
AvailableSourceHandlers[]=ezcommunityjiraatomimporthandler
AvailableSourceHandlers[]=ezpublish-legacygithubatomimporthandler
AvailableSourceHandlers[]=ezcommunitygithubatomimporthandler
AvailableSourceHandlers[]=ezsystemsgithubatomimporthandler
AvailableSourceHandlers[]=stackoverflowtagezpublishatomimporthandler
AvailableSourceHandlers[]=stackoverflowtagezplatformatomimporthandler
AvailableSourceHandlers[]=brookinsconsultinggithubatomimporthandler
AvailableSourceHandlers[]=brookinsconsultinggistgithubatomimporthandler
AvailableSourceHandlers[]=ezpublishlegacygithubatomimporthandler
AvailableSourceHandlers[]=ezecosystemgithubatomimporthandler
AvailableSourceHandlers[]=gggeekgithubatomimporthandler
AvailableSourceHandlers[]=jdespatisgithubatomimporthandler
AvailableSourceHandlers[]=crevillogithubatomimporthandler
AvailableSourceHandlers[]=andreromgithubatomimporthandler
AvailableSourceHandlers[]=dpobelgithubatomimporthandler
AvailableSourceHandlers[]=bdunogiergithubatomimporthandler
AvailableSourceHandlers[]=pedroresendegithubatomimporthandler
AvailableSourceHandlers[]=ezpublish-communitygithubatomimporthandler
AvailableSourceHandlers[]=ezpublish-kernelgithubatomimporthandler
AvailableSourceHandlers[]=fabienpotencieratomimporthandler
AvailableSourceHandlers[]=yannickrogergithubatomimporthandler
AvailableSourceHandlers[]=lolautruchegithubatomimporthandler
AvailableSourceHandlers[]=peterkeunggithubatomimporthandler
AvailableSourceHandlers[]=xrowgithubatomimporthandler
AvailableSourceHandlers[]=thiagocamposvianagithubatomimporthandler
AvailableSourceHandlers[]=joaoinaciogithubatomimporthandler
AvailableSourceHandlers[]=glyegithubatomimporthandler
AvailableSourceHandlers[]=pspanjagithubatomimporthandler
AvailableSourceHandlers[]=xinyuexrowgithubatomimporthandler
AvailableSourceHandlers[]=xrowkristinagithubatomimporthandler
AvailableSourceHandlers[]=emodricgithubatomimporthandler
AvailableSourceHandlers[]=partialcontentatomimporthandler

[ezpublishjiraatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Jira eZ Publish Issues Feed (SQLIJiraATOMImportHandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIJiraATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4198
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://jira.ez.no/activity?maxResults=75&streams=key+IS+EZP&providers=issues+thirdparty+dvcs-streams-provider+tempo-provider&title=undefined

[ezcommunityjiraatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Jira eZ Community Issues Feed (SQLIJiraATOMImportHandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIJiraATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=9181
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://jira.ez.no/activity?maxResults=50&streams=key+IS+COM&providers=issues+thirdparty+dvcs-streams-provider+tempo-provider&title=undefined

[ezpublish-legacygithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZ Publish Legacy Commit Log Feed (atomGitHubeZPublisheZSystemsCommitLogimporthandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4399
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezsystems/ezpublish-legacy/commits/master.atom

[ezcommunitygithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZ Community Activity Log Feed (atomGitHubeZCommunityActivityLogimporthandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=19086
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezcommunity.atom

[ezsystemsgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZ Systems Activity Log Feed (atomGitHubeZSystemsActivityLogimporthandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=19087
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezsystems.atom

[stackoverflowtagezpublishatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=StackOverflow Tag ezpublish New Questions Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIStackOverflowTagATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=44628
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=http://stackoverflow.com/feeds/tag/ezpublish

[stackoverflowtagezplatformatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=false
# Intelligible name
Name=StackOverflow Tag ezplatform New Questions Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIStackOverflowTagATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=44630
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=http://stackoverflow.com/feeds/tag/ezplatform

[brookinsconsultinggithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub Brookins Consulting Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4440
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/brookinsconsulting.atom

[brookinsconsultinggistgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub Brookins Consulting Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGistGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4440
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://gist.github.com/brookinsconsulting.atom

[ezpublishlegacygithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZPublishLegacy Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=21259
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezpublishlegacy.atom

[ezecosystemgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZecosystem Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=65864
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezecosystem.atom

[gggeekgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GGGeek GitHub Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4652
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/gggeek.atom

[jdespatisgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub jdespatis Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4719
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/jdespatis.atom

[andreromgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub andrerom Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=11675
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/andrerom.atom

[dpobelgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub dpobel Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=11676
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/dpobel.atom

[bdunogiergithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub bdunogier Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=11677
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/bdunogier.atom

[pedroresendegithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub pedroresende Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=11678
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/pedroresende.atom

[crevillogithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=crevillo GitHub Activity Log Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=4720
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/crevillo.atom

[ezpublish-communitygithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZ Publish Community Commit Log Feed (atomGitHubeZPublisheZSystemsCommitLogimporthandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=9204
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezsystems/ezpublish-community/commits/master.atom

[ezpublish-kernelgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub eZ Publish API Commit Log Feed (atomGitHubeZPublisheZSystemsCommitLogimporthandler)
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=9205
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/ezsystems/ezpublish-kernel/commits/master.atom

[fabienpotencieratomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Fabien Potencier Symfony Blog Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=12357
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=http://feeds.fabien.potencier.org/aidedecamp

[yannickrogergithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Yannick ROGER GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=12389
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/yannickroger.atom

[lolautruchegithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Jérôme Vieilledent GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=12426
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/lolautruche.atom

[peterkeunggithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Peter Keung GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=12458
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/peterkeung.atom

[xrowgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Xrow GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=12917
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/xrow.atom

[thiagocamposvianagithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Thiago Campos Viana GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=16220
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/thiagocamposviana.atom

[joaoinaciogithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=João Inácio GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23614
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/joaoinacio.atom

[glyegithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Gunnstein Lye GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23646
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/glye.atom

[pspanjagithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Petar Španja GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23681
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/pspanja.atom

[xinyuexrowgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=xinyuexrow GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23683
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/xinyuexrow.atom

[xrowkristinagithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=xrowkristina GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23682
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/xrowkristina.atom

[emodricgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Edi Modrić GitHub Activity Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIGitHubATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=23776
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=https://github.com/emodric.atom

[partialcontentatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=Partial Content Blog Feed
# Class for source handler. Must implement ISQLIImportSourceHandler and extend SQLIImportAbstractSourceHandler
ClassName=SQLIPartialContentATOMImportHandler
# Facultative. Indicates whether debug is enabled or not
Debug=enabled
# Same as [ImportSettings]/DefaultParentNodeID, but source handler specific
DefaultParentNodeID=44631
# StreamTimeout, handler specific. If empty, will take [ImportSettings]/StreamTimeout
StreamTimeout=
# Below you can add your own settings for your source handler
ATOMFeed=http://partialcontent.com/feed/pc

*/ ?>