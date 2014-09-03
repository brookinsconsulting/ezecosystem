<?php /* #?ini charset="utf-8"?

[ImportSettings]
AvailableSourceHandlers[]=atomimporthandler
AvailableSourceHandlers[]=brookinsconsultinggithubatomimporthandler
AvailableSourceHandlers[]=gggeekgithubatomimporthandler
AvailableSourceHandlers[]=jdespatisgithubatomimporthandler
AvailableSourceHandlers[]=crevillogithubatomimporthandler
AvailableSourceHandlers[]=andreromgithubatomimporthandler
AvailableSourceHandlers[]=dpobelgithubatomimporthandler
AvailableSourceHandlers[]=bdunogiergithubatomimporthandler
AvailableSourceHandlers[]=pedroresendegithubatomimporthandler
AvailableSourceHandlers[]=ezpublish-communitygithubatomimporthandler
AvailableSourceHandlers[]=ezpublish-kernelgithubatomimporthandler
AvailableSourceHandlers[]=ezpublishjiraatomimporthandler
AvailableSourceHandlers[]=ezcommunityjiraatomimporthandler
AvailableSourceHandlers[]=fabienpotencieratomimporthandler

[atomimporthandler-HandlerSettings]
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

[gggeekgithubatomimporthandler-HandlerSettings]
# Indicates if handler is enabled or not. Mandatory. Must be "true" or "false"
Enabled=true
# Intelligible name
Name=GitHub Brookins Consulting Activity Log Feed
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
Name=GitHub Brookins Consulting Activity Log Feed
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
ATOMFeed=https://jira.ez.no/activity?maxResults=50&streams=key+IS+EZP&providers=issues+thirdparty+dvcs-streams-provider+tempo-provider&title=undefined

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



*/ ?>
