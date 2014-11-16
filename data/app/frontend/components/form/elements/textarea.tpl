<div class="control-group">
    <label for="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="control-label">
        {$fvDictionary->get($keyName, $name)}
    </label>
    <div class="controls">
        <textarea {if $field.readonly}readonly="readonly"{/if} name="{$formName}[{$name}]" class="{$name}" cols="" rows="" id="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$field.value}</textarea>
        {if $field.error}
            {assign var=errorKey value=$formName|cat:"_error_"|cat:$field.error}
            <span class="error-description">{$field.error|translate:$errorKey}</span>
        {/if}
    </div>
</div>