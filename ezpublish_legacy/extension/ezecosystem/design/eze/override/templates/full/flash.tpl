{* Flash - Full view *}

{def $attribute=$node.data_map.file
     $videoFile=concat("content/download/",$attribute.contentobject_id,"/",$attribute.content.contentobject_attribute_id,"/",$attribute.content.original_filename)|ezurl('no')
     $videoPlayerSourceDirectory="/extension/justbeu/design/justbeu/flv/example/"
     $videoPlayerSourceScriptDirectory=concat($videoPlayerSourceDirectory,"Scripts/")
     $videoSkinFile=concat($videoPlayerSourceDirectory,"Corona_Skin_3")
     $swfObjectDirectory=concat("/extension/justbeu/design/ezwebin/javascript/","swfobject/")
}

{* <script src="{concat($videoPlayerSourceScriptDirectory,"swfobject_modified.js")}" type="text/javascript"></script> *}
<script src="{concat($swfObjectDirectory,"swfobject.js")}" type="text/javascript"></script>

<div class="border-box">
<div class="border-tl"><div class="border-tr"><div class="border-tc"></div></div></div>
<div class="border-ml"><div class="border-mr"><div class="border-mc float-break">

<div class="content-view-full">
    <div class="class-flash">

    <div class="attribute-header">
        <h1>{$node.name|wash()}</h1>
    </div>

    <div class="attribute-short">
        {attribute_view_gui attribute=$node.data_map.description}
    </div>

    <div class="content-media">
	{*
        <object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0"
                {section show=$attribute.content.width|gt( 0 )}width="{$attribute.content.width}"{/section} {section show=$attribute.content.height|gt( 0 )}height="{$attribute.content.height}"{/section} id="objectid{$node.object.id}">
        <param name="movie" value={concat($videoPlayerSourceDirectory,"FLVPlayer_Progressive",".swf")} />
        <param name="quality" value="{$attribute.content.quality}" />
        <param name="wmode" value="opaque" />

        <param name="scale" value="noscale" />
        <param name="salign" value="lt" />
        <param name="FlashVars" value="&amp;MM_ComponentVersion=1&amp;skinName={$videoSkinFile}&amp;streamName={$videoFile}&amp;autoPlay=false&amp;autoRewind=false" />
        <param name="swfversion" value="8,0,0,0" />

        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don.t want users to see the prompt. -->
        <param name="expressinstall" value="{concat($videoPlayerSourceScriptDirectory,"expressInstall.swf")}" />

        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->

        <param name="play" value="{section show=$attribute.content.is_autoplay}true{/section}" />
        <param name="loop" value="{section show=$attribute.content.is_loop}true{/section}" />
        <embed src={concat("content/download/",$attribute.contentobject_id,"/",$attribute.content.contentobject_attribute_id,"/",$attribute.content.original_filename)|ezurl}
               type="application/x-shockwave-flash"
               quality="{$attribute.content.quality}" pluginspage="{$attribute.content.pluginspage}"
               {section show=$attribute.content.width|gt( 0 )}width="{$attribute.content.width}"{/section} {section show=$attribute.content.height|gt( 0 )}height="{$attribute.content.height}"{/section} play="{section show=$attribute.content.is_autoplay}true{/section}"
               loop="{section show=$attribute.content.is_loop}true{/section}" name="objectid{$node.object.id}" data="{concat($videoPlayerSourceDirectory,"FLVPlayer_Progressive",".swf")}">
		<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. --> *}

        <div id="objectid{$node.object.id}">
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
        </div>

	{*
        </embed>
        </object> *}

	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp; </p>
	<script type="text/javascript">
	{literal}
            var flashvars = {};
	        flashvars.MM_ComponentVersion = "1";{/literal}
                flashvars.skinName = "{$videoSkinFile}";
                flashvars.streamName = "{$videoFile}";{literal}
                flashvars.autoPlay = "false";
                flashvars.autoRewind = "false";

	    var params = {
                  menu: "false",
                  allowScriptAccess : "sameDomain",
                  allowFullScreen : "true",
                  play : "false",
                  loop : "false",
                  quality : "best",
                  scale : "noscale",
                  salign : "lt",
                  bgcolor : "#FFFFFF"
                };
            var attributes = {
		  {/literal}
                  id: "objectid{$node.object.id}",
                  name: "objectid{$node.object.id}"
                };

	    swfobject.embedSWF("{concat($videoPlayerSourceDirectory,"FLVPlayer_Progressive",".swf")}", "objectid{$node.object.id}", "{if $attribute.content.width|gt( 0 )}width="{$attribute.content.width}"{else}570{/if}", "{if $attribute.content.height|gt( 0 )}height="{$attribute.content.height}"{else}480{/if}", "9.0.0","{concat($videoPlayerSourceScriptDirectory,"expressInstall.swf")}", flashvars, params, attributes);

	{* /* swfobject.registerObject("objectid{$node.object.id}"); */
              flashvars: "&amp;MM_ComponentVersion=1&amp;skinName={$videoSkinFile}&amp;streamName={$videoFile}&amp;autoPlay=false&amp;autoRewind=false" *}
	</script>
    </div>

    </div>
</div>

</div></div></div>
<div class="border-bl"><div class="border-br"><div class="border-bc"></div></div></div>
</div>