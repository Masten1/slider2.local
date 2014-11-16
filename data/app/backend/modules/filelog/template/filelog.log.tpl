{if !$ajax}
<h1>Лог «{$log}»</h1>

<div class="operation"><a href="{$fvConfig->get('dir_web_root')}{$path}/" onclick="go('{$fvConfig->get('dir_web_root')}{$path}/'); return false;" class="left">вернуться к списку</a><div style="clear: both;"></div></div>

<div id="result">
    {/if}
    <div style="margin: 20px 40px; background: #f0f0f0;">
        <pre style="padding: 30px; font: 78% Consolas, Courier New, monospace; color: #555; overflow: auto">{foreach from=$lines item=line}{$line|escape}{/foreach}</pre>
    </div>
    <script>{literal}
        jQuery(function($){
            var height = $("#result>div>pre").height();
            $("#result>div>pre").css({ height: Math.max(300, $(window.document).height() - 300) }).scrollTop(height);
        });
    {/literal}</script>

    {if !$ajax}
</div>
{/if}