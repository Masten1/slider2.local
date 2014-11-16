<nav id="top">
    <ul>
    {foreach from=$menuItems item=menuItem}
        <li>
            <a {if $menuItem->isActive()}active{/if} href="/{$menuItem->link}">
                {$menuItem->name}
            </a>
        </li>
    {/foreach}
    </ul>
</nav>