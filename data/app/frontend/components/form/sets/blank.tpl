{if $set.header}
    {assign var=headerKey value=$formKey|cat:"_header_"|cat:$set.header}
    <h4>{$set.header|translate:$headerKey}</h4>
{/if}

{foreach from=$fields item=field key=name}
    {include
        file='elements/'|cat:$field.type|cat:'.tpl'
        field=$field
        formName=$this->getContainerName()
        name=$name
        keyName=$formKey|cat:"_"|cat:$name
    }
{/foreach}