<h1>
    {$fvConfig->getModuleName($path)}

</h1>
<form method="post" id="add_form" action="{$fvConfig->get('dir_web_root')}{$path}/save/">
    {if $subject->isLanguaged()}
        <div id="tabs" style="dislay: none">
            <ul>
                <li>
                    <a href="#tabs-1">Общая информация</a>
                </li>
                {if $lLangs }
                    {foreach from=$lLangs item=lang name=lang_title}
                        <li><a href="#tabs-{$smarty.foreach.lang_title.iteration+1}">{$lang->name}</a></li>
                    {/foreach}
                {/if}
            </ul>

            <div id="tabs-1" class="form">
                {$subject|parse:edit}
            </div>
            {if $lLangs }
                {foreach from=$lLangs item=lang name=lang_inner}
                    <div id="tabs-{$smarty.foreach.lang_inner.iteration+1}" class="form">
                        {$subject|parse:edit:$lang}
                    </div>
                {/foreach}
            {/if}
        </div>
    {else}
        <div class="ui-tabs ui-widget ui-widget-content ui-corner-all"><div class="form">
                {$subject|parse:edit}
            </div></div>
    {/if}
    <br/>
    <input type="hidden" name="id" value="{$subject->getPk()}">
    <input type="hidden" name="win_entity" value="{$win_entity}">
</form>

<script>
    {literal}
    jQuery(function($) {
        $(".date" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#tabs" ).tabs();
    });
    {/literal}
</script>