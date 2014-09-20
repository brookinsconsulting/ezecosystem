{def $feed_main_rss_url=ezini('FeedSidebarSettings','MainRssUrl','ezecosystem.ini')
     $feed_main_rss_title=ezini('FeedSidebarSettings','MainRssTitle','ezecosystem.ini')
     $feed_main_opml_url=ezini('FeedSidebarSettings','MainOpmlUrl','ezecosystem.ini')
     $feed_main_opml_title=ezini('FeedSidebarSettings','MainOpmlTitle','ezecosystem.ini')
     $feed_issues_rss_url=ezini('FeedSidebarSettings','IssuesRssUrl','ezecosystem.ini')
     $feed_issues_rss_title=ezini('FeedSidebarSettings','IssuesRssTitle','ezecosystem.ini')
     $feed_blogs_rss_url=ezini('FeedSidebarSettings','BlogsRssUrl','ezecosystem.ini')
     $feed_blogs_rss_title=ezini('FeedSidebarSettings','BlogsRssTitle','ezecosystem.ini')
     $feed_forum_rss_url=ezini('FeedSidebarSettings','ForumRssUrl','ezecosystem.ini')
     $feed_forum_rss_title=ezini('FeedSidebarSettings','ForumRssTitle','ezecosystem.ini')}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full" style="width: 210px;">
    <div class="class-folder">
    {* <h4>Syndication<h4> *}

    {* <div class="sidebar-content">
	<p> *}

	<div style="position:relative;top:-15px;left:28px;"><a href="{$feed_main_rss_url}" style="" title="{$feed_main_rss_title}"><img src={'feed-icon-28x28.png'|ezimage} border=0 /></a>&nbsp;&nbsp;{if $feed_issues_rss_url|ne( false() )}<a href="{$feed_issues_rss_url}" style="" title="{$feed_issues_rss_title}"><img src={'feed-icon-28x28.png'|ezimage} border=0 /></a>&nbsp;&nbsp;{/if}{if $feed_blogs_rss_url|ne( false() )}<a href="{$feed_blogs_rss_url}" style="" title="{$feed_blogs_rss_title}"><img src={'feed-icon-28x28.png'|ezimage} border=0 /></a>&nbsp;&nbsp;{/if}{if $feed_forum_rss_url|ne( false() )}<a href="{$feed_forum_rss_url}" style="" title="{$feed_forum_rss_title}"><img src={'feed-icon-28x28.png'|ezimage} border=0 /></a>&nbsp;&nbsp;{/if}{if $feed_main_opml_url|ne( false() )}<a href="{$feed_main_opml_url}" style="" title="{$feed_main_opml_title}"><img src={'opml-icon-24x24.png'|ezimage} border=0 /></a>{/if}</div>

        {* </p>
    </div> *}

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
