<ul>
    {foreach from=$List item=item}
        <li>
            <a {if $item->isActive()}class="active"{/if} href="/{$item->link->get()}">{$item->name->get()}</a>
        </li>
    {/foreach}
</ul>