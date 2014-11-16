<div class="fo" {if $field.hidden}style="display:none;"{/if}>
    <div class="fo1"><label for="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$fvDictionary->get($keyName, $name)}</label></div>
    <div class="fo2">
        <input type="password" name="{$formName}[{$name}]" id="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="{$name}"/>
    </div>
    <div class="fo3">
    {if $field.error}
        {assign var=errorKey value=$keyName|cat:"_error_"|cat:$field.error}
        ← {$field.error|translate:$errorKey}
    {/if}
    </div>
</div>