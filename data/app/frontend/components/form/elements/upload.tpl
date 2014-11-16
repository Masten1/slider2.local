<div class="fo" {if $field.hidden}style="display:none;"{/if}>
    <div class="fo1"><label for="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$fvDictionary->get($keyName, $name)}</label></div>
    <div class="fo2">
        <div class="manual-upload" allowedExtensions="{','|implode:$field.values}" {if $field.additionalInfo.autoSubmit}autoSubmit="1"{/if}>{$fvDictionary->get($keyName, $name)}</div>
        <input type="hidden" class="{$name}" name="{$formName}[{$name}]"  id="{$formName|regex_replace:"/\]|\[/":""}{$name}" value="">
    </div>
    <div class="fo3">
    {if $field.error}
        {assign var=errorKey value=$keyName|cat:"_error_"|cat:$field.error}
        ← {$field.error|translate:$errorKey}
    {/if}
    </div>
</div>
<script type="text/javascript" src="/js/fileuploader.js"></script>
