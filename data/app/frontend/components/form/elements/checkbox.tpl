<div class="fo" {if $field.hidden}style="display:none;"{/if}>
    <div class="fo1"><label for="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$fvDictionary->get($keyName, $name)}</label></div>
    <div class="fo2">
        <div class="chech2 {if $field.value}on{/if}">
            <input type="hidden" name="{$formName}[{$name}]" value="0"/>
            <input type="checkbox" class="switcher {$name}" style="display: none;" name="{$formName}[{$name}]" {if $field.value}checked="checked" {/if} id="{$formName|regex_replace:"/\]|\[/":""}{$name}"/>

            {if $field.labels.on}
                {assign var=onLabel value=$fvDictionary->get($field.labels.on, $field.labels.on)}
            {else}
                {assign var=onLabel value=$fvDictionary->get("onCheckbox", "On")}
            {/if}

            {if $field.labels.off}
                {assign var=offLabel value=$fvDictionary->get($field.labels.off, $field.labels.off)}
            {else}
                {assign var=offLabel value=$fvDictionary->get("offCheckbox", "Off")}
            {/if}

            <p>{$onLabel}</p>
            <div></div>
            <p>{$offLabel}</p>
        </div>
    </div>
    <div class="fo3"></div>
</div>