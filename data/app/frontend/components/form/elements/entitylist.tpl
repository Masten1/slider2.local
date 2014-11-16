<input type="hidden" name="{$formName}[{$name}][]" value="">
<label {if $field.hidden}style="display:none;"{/if}>
    <span class="description">{$fvDictionary->get($keyName, $name)}</span>
    <span>
        <select multiple="multiple" name="{$formName}[{$name}][]" class="{$name}">
            {foreach from=$field.values item=value}
                {assign var=key value=$value->getPk()}
                <option value="{$key}" {foreach from=$field.value item=k}{if $k == $key}selected="selected"{/if}{/foreach}>{$value}</option>
            {/foreach}
        </select>
    </span>
</label>
