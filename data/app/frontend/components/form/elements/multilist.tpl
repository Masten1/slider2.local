<input type="hidden" name="{$formName}[{$name}][]" value="0">
<div class="fo" {if $field.hidden}style="display:none;"{/if}>
    <div class="fo1"><label for="{$formName|regex_replace:"/\]|\[/":""}{$name}">{$fvDictionary->get($keyName, $name)}</label></div>
    {assign var=bubbleKeyName value=$keyName|cat:"_bubble"}
    {assign var=bubbleText value=$fvDictionary->get($bubbleKeyName, "")}
    <div class="fo2 {if $bubbleText!=$bubbleKeyName}bubble" bubble="{$bubbleText|replace:'"':"&quot;"}{/if}">
        <div class="filter">
            {strip}
			<p class="multilist">
                <span>
                    {foreach from=$field.values key=key item=value}
                        {foreach from=$field.value item=item}
                            {if $item == $key}
                                <b class="tag selected" rel="{$key}">{$value}<input type="hidden" name="{$formName}[{$name}][]" value="{$key}" ></b>
                            {/if}
                        {/foreach}
                    {/foreach}
                        <input type="text" source="{$name}" rel="{$formName}[{$name}][]" id="{$formName|regex_replace:"/\]|\[/":""}{$name}" class="ui-autocomplete-input {$name}" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                </span>
            </p>
            {/strip}
        </div>
    </div>
</div>

<script type="text/autocomplete" name="{$name}">
    ([
{foreach from=$field.values key=key item=value name=values}
    {ldelim}label: "{$value|replace:'"':'\"'}", value: {$key}{rdelim}{if !$smarty.foreach.values.last},{/if}

{/foreach}
    ])
</script>