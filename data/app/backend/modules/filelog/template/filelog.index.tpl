{if !$ajax}
<h1>{$fvConfig->getModuleName($path)}</h1>



<div id="result">
    {/if}
    <div class="table_body" style="font-size: 95%; width: 900px; margin: 20px auto;">
        <table>
            <tr>
                <th>Имя лога</th>
                <th>Дата обновления</th>
                <th>Размер файла</th>
                <th></th>
            </tr>
            {foreach from=$logs item=log}
                <tr>
                    <td class="mixed">{$log.name}</td>
                    <td class="mixed">{$log.modified|date_format:"%d-%m-%Y"} <small>{$log.modified|date_format:"%H:%m"}</small></td>
                    <td class="mixed">{$log.size|readable_bytes}</td>
                    <td>
                        <a href="{$fvConfig->get('dir_web_root')}{$path}/view/?log={$log.name}"
                            onclick="go('{$fvConfig->get('dir_web_root')}{$path}/view/?log={$log.name}'); return false;">
                            <img src="{$fvConfig->get('dir_web_root')}img/edit_icon.png"/>
                        </a>
                        <a href="javascript: void(0);"
                            onclick="if (confirm('Вы действительно желаете очистить этот лог?')) go('{$fvConfig->get('dir_web_root')}{$path}/truncate/?log={$log.name}'); return false;"
                            >
                            <img src="{$fvConfig->get('dir_web_root')}img/delete_icon.png" title="удалить" width="16" height="16">
                        </a>
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>

    {if !$ajax}
</div>
{/if}