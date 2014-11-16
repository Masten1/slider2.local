<nav id="bottom">
    <ul>
    {foreach from=$menuItems item=menuItem}
        <li>
            <a href="/{$menuItem->link}">
                {$menuItem->name}
            </a>
        </li>
    {/foreach}
    </ul>
</nav>