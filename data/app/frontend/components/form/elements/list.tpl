<div class="control-group">
    <label for="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="control-label">
        {$fvDictionary->get($keyName, $name)}
    </label>
    <div class="controls">
        <select id="{$formName|regex_replace:"/\]|\[/":""}{$name}" name="{$formName}[{$name}]" class="{$name}">
            {foreach from=$field.values item=value key=key}
                <option value="{$key}" {if $field.value == $key}selected="selected"{/if}>{$value}</option>
            {/foreach}
        </select>
        {if $field.error}
            {assign var=errorKey value=$formName|cat:"_error_"|cat:$field.error}
            <span class="error-description">{$field.error|translate:$errorKey}</span>
        {/if}
    </div>
</div>