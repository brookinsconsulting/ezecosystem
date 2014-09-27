  <!-- Footer area: START -->
  <div id="footer">
    <address>
    <a href="/About">About</a> | <a href="/Contact-Us">Contact Us</a> | <a href="/Downloads">Downloads</a> | <a target="_blank" href="http://webchat.freenode.net/?randomnick=1&channels=ezpublish%2Cezpedia%2Cezcomponents&uio=Mj10cnVlJjQ9dHJ1ZSY5PXRydWUmMTE9MjE12e">Chat About eZ Publish</a> | <a href="/About-eZ-Publish">About eZ Publish</a><br />

    {* if $pagedesign.data_map.hide_powered_by.data_int|not *}
        Powered by <a href="http://share.ez.no" title="eZ Publish&#8482; CMS Open Source Web Content Management">eZ Publish&#8482;</a> &nbsp; <a href="#top"><img src={'bc-icon-footer-sm.png'|ezimage} border="0" width="37" height="27" style="position:relative;top:10px;padding-right:1px;" /></a>
    {* /if *}

    &nbsp; <a href="http://ezpublishlegacy.com" title="eZ Publish Legacy">ezpublishlegacy.com</a>

    {* if $pagedesign.data_map.footer_text.has_content}
        {$pagedesign.data_map.footer_text.content} 
    {/if *}
    
    <div class="hosting-sponsor">Proudly hosted by <br /><a href="http://thinkcreative.com" title="Think Creative">Think Creative</a> <br /> <a href="http://thinkcreative.com"><img src={'tc/tc-icon.png'|ezimage} border="0" {*width="37" height="27"*} style="position:relative;top:3px;padding-right:1px;" /></a></div>
    </address>
  </div>
  <!-- Footer area: END -->
