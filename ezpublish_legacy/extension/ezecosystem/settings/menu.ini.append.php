<?php /*

[MenuContentSettings]
TopIdentifierList[]=folder
TopIdentifierList[]=feedback_form
TopIdentifierList[]=gallery
TopIdentifierList[]=forum
TopIdentifierList[]=documentation_page
TopIdentifierList[]=forums
TopIdentifierList[]=event_calendar
TopIdentifierList[]=multicalendar
TopIdentifierList[]=link
TopIdentifierList[]=blog
TopIdentifierList[]=frontpage

LeftIdentifierList[]=folder
LeftIdentifierList[]=feedback_form
LeftIdentifierList[]=gallery
LeftIdentifierList[]=forum
LeftIdentifierList[]=documentation_page
LeftIdentifierList[]=forums
LeftIdentifierList[]=event_calendar
LeftIdentifierList[]=multicalendar
#LeftIdentifierList[]=link
LeftIdentifierList[]=blog
LeftIdentifierList[]=frontpage

# Classes to use in extra menu (infobox)
#ExtraIdentifierList[]
ExtraIdentifierList[]=infobox

# Control extra menu visibility depening on
# available subitems for current node
ExtraMenuSubitemsCheck=enabled

# DEPRICATED: use persistent_variable in node full veiw instead
# {set scope=global persistent_variable=hash('left_menu', false(),
#                                            'extra_menu', false(),
#                                            'show_path', false())}
[MenuSettings]
#HideLeftMenuClasses[]
HideLeftMenuClasses[]=frontpage
HideLeftMenuClasses[]=blog
HideLeftMenuClasses[]=blog_post

# true or false, while set to false menus can be hide in certain cases
AlwaysAvailable=false

[NavigationPart]
Part[generatestaticcachepart]=Static Cache

[TopAdminMenu]
Tabs[]=generatestaticcache

[Topmenu_generatestaticcache]
NavigationPartIdentifier=generatestaticcachepart
Name=Static Cache
Tooltip=Regenerate static cache
URL[]
URL[default]=generatestaticcache/cache
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[edit]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]=generatestaticcache/cache

[Leftmenu_setup]
Links[generatestaticcache]=generatestaticcache/cache
LinkNames[generatestaticcache]=Static Cache

*/ ?>