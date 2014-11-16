<div class="fo" {if $field.hidden}style="display:none;"{/if}>
    <div class="fo1"><label for="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$fvDictionary->get($keyName, $name)}</label></div>
    <div class="fo2 datepicker">
        <label>
            <input {if $field.readonly}readonly="readonly"{/if} type="text" style="width: 80px;" class="{$name}" name="{$formName}[{$name}]" value="{$field.value}" id="{$formName|regex_replace:"/\]|\[/":""}{$name}"/>
            &nbsp;
            <img class="ui-datepicker-trigger" src="/images/calend.jpg" style="vertical-align: middle;">
        </label>
    </div>
    <div class="fo3">
    {if $field.error}
        {assign var=errorKey value=$keyName|cat:"_error_"|cat:$field.error}
        ← {$field.error|translate:$errorKey}
    {/if}
    </div>
</div>
