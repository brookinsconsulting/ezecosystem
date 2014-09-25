{def $twitter_sidebar_search_url=ezini('TwitterSidebarSettings','TwitterSearchUrl','ezecosystem.ini')
     $twitter_sidebar_search_title=ezini('TwitterSidebarSettings','TwitterSearchTitle','ezecosystem.ini')}

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full sidebar-content-container">
    <div class="class-folder">
    {* <h3>Twitter<h3> *}
    <div class="twitter-logo"><a href="{$twitter_sidebar_search_url}" style="text-decoration:none"><img src={'logo-twitter.png'|ezimage} alt='Twitter Logo' /></a></div>
    <a class="twitter-timeline" data-dnt="true" href="{$twitter_sidebar_search_url}" data-widget-id="503439438320394240" data-chrome="noheader nofooter" height="1000">{$twitter_sidebar_search_title}</a>

    <script type="text/javascript">{literal}$(window).load(function(){ !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs"); });{/literal}</script>

    </div>
</div>

<h3><div align="right"><a href="#top">Top</a></div></h3>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>
