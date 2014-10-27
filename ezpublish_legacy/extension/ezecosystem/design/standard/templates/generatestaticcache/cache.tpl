<div class="generatestaticcache">
<div class="left-column">
<form name="generatestaticcache" action={"generatestaticcache/cache"|ezurl} method="post">

<div class="context-block">

{* DESIGN: Header START *}<div class="box-header"><div class="box-tc"><div class="box-ml"><div class="box-mr"><div class="box-tl"><div class="box-tr">

<h1 class="context-title">{'Generate Static Cache'|i18n('generator')}</h1>

{* DESIGN: Mainline *}<div class="header-mainline"></div>

{* DESIGN: Header END *}</div></div></div></div></div></div>

{* DESIGN: Content START *}<div class="box-ml"><div class="box-mr"><div class="box-content">

<div class="context-attributes">

<div class="block">
    <p>
        This module gnerates static cache for the requested uri or uri subtree.<br />
        The purpose is to regenerate static cache for one or all pages. Typically useful after you have made template changes for an eZ Publish Installation.
    </p>
    <p>
        <em>Warning: This could make a lot of requests to your eZ Publish installation / web server / database, and potentionally give the server high load.</em>
    </p>
</div>

{if $output}
<div class="message-feedback">
<h2>Generate Static Cache Results</h2>
<pre>{$output}</pre>
</div>
{/if}

<div class="block">
    <label>Generate static cahe for the following uri</label>
    <p>
        This is the uri to your user site (Example: / or /Mirror or /GitHub or /Issues)
    </p>

    <p>
        <input name="uri" value="{$uri}" size="45" /><br />
    </p>

    <p>
        <span>{'Siteaccess'|i18n( 'design/admin/visual/toolbar' )}:</span>
        <select name="siteaccess">
            {section var=siteaccess loop=$siteaccess_list}
                {if eq( $current_siteaccess, $siteaccess )}
                    <option value="{$siteaccess}" selected="selected">{$siteaccess}</option>
                {else}
                <option value="{$siteaccess}">{$siteaccess}</option>
            {/if}
        {/section}
        </select>

        <input type="checkbox" name="recursive" value="Recursive"{if $recursive|eq( true() )} checked{/if}> Recursive<br /><br />

        <input class="button" type="submit" name="GenerateButton" value="Generate Static Cache" />
    </p>
</div>

</div>

{* DESIGN: Content END *}</div></div></div>

</div>

</form>

</div>

<div class="right-column">
    <div id="results"></div>
    <iframe name="process-log" src={"/layout/set/blank/cronjobs/logs"|ezurl}></iframe>
</div>

</div>
