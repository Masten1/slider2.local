<div class="control-group">
    <label for="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="control-label">
        {$fvDictionary->get($keyName, $name)}
    </label>
    <div class="controls">
        <input type="text" {if $field.readonly}readonly="readonly"{/if} name="{$formName}[{$name}]" value="{$field.value}" id="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="{$name}-field"/>
        {if $field.error}
            {assign var=errorKey value=$formName|cat:"_error_"|cat:$field.error}
            <span class="error-description">{$field.error|translate:$errorKey}</span>
        {/if}
    </div>
</div>