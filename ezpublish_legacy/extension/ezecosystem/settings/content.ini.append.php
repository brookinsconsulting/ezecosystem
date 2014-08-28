<?php /* #?ini charset="utf-8"?
# eZ publish configuration file for content

# BC: Enable ezxml literal tag usage
[literal]
AvailableClasses[]
# The class 'html' is disabled by default because it gives editors the
# possibility to insert html and javascript code in XML blocks.
# Don't enable the 'html' class unless you really trust all users who has
# privileges to edit objects containing XML blocks.
AvailableClasses[]=html
CustomAttributes[]

[CustomTagSettings]
AvailableCustomTags[]=separator
AvailableCustomTags[]=children_menu
AvailableCustomTags[]=video

[folder]
SummaryInFullView=enabled

[article]
SummaryInFullView=enabled
ImageInFullView=enabled

[children_menu]
CustomAttributes[]=align
CustomAttributes[]=limit
CustomAttributes[]=like
CustomAttributesDefaults[align]=right
CustomAttributesDefaults[limit]=5
CustomAttributesDefaults[like]=left_menu
#menu modes: 'left_menu' | 'top_menu' | 'children' or ''

[video]
CustomAttributes[]=width
CustomAttributes[]=height
CustomAttributes[]=source
CustomAttributes[]=allow_full_screen
CustomAttributes[]=allow_script_access

[ChildrenNodeList]
ExcludedClasses[]=folder
ExcludedClasses[]=link

*/ ?>
