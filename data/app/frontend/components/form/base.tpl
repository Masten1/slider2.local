<form class="content {$this->getClass()} form-horizontal" method="post" action="{$this->getAction()}">
    <h1>{$this->getTitle()}</h1>

    {if $this->getMessages('error')}
        <div class="messages">
            {foreach from=$this->getMessages('error') item=type}
                <p class="message error {$type}">
                    {assign var=messageKey value=$formKey|cat:"_message_error_"|cat:$type}
                                    {$type|translate:$messageKey}
                </p>
            {/foreach}
        </div>
    {/if}
    {if $this->getMessages('success')}
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Сообщение успешно отправлено, наши менеджеры свяжутся с Вами в ближайшее время.
        </div>
    {/if}

    {foreach from=$this->getFieldsSets() item=set key=name}
        {include
            file='sets/'|cat:$set.type|cat:'.tpl'
            fields=$set.fields
            header=$set.header
            formKey=$formKey
            this=$this
        }
    {/foreach}

    {if $this->isNew()}
        {assign var=buttonKey value=$formKey|cat:"_button_new"}
        {else}
        {assign var=buttonKey value=$formKey|cat:'_button'}
    {/if}

    <div class="control-group">
        <div class="controls">
            {if $this->showSubmitButton()}
                <input type="submit" class="btn btn-success" value="{$fvDictionary->get($buttonKey, "Отправить запрос")}">
            {/if}
        </div>
    </div>
</form>