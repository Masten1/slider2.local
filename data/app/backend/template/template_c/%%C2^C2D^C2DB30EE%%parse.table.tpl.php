<?php /* Smarty version 2.6.21, created on 2014-10-31 14:45:16
         compiled from parse.table.tpl */ ?>
    <div style="width: 100%">

        <?php if ($this->_tpl_vars['collection']->hasPaginate()): ?>
            <div id="manager_param_paging" class="paging">
                <?php echo $this->_tpl_vars['collection']->showPagerAjax(false,'doPager'); ?>

            </div>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['create']): ?>
            <div class="operation">
                <a href="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/" onclick="go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/'); return false;" class="add">добавить</a>
                <div style="clear: both;"></div>
            </div>
        <?php endif; ?>

        <div class="table_body">
            <table class="text" id="zebra">
                <tr>
                <?php $_from = $this->_tpl_vars['entityFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['field']):
?>
                    <?php if ($this->_tpl_vars['field']->isListable()): ?>
                        <th>
                            <?php if ($this->_tpl_vars['field']->isSortable()): ?>
                                <a href="#<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $_REQUEST['__url']; ?>
?<?php echo $this->_tpl_vars['queryString']; ?>
&sort=<?php echo $this->_tpl_vars['name']; ?>
&order=<?php if ($_REQUEST['order'] == 1): ?>0<?php else: ?>1<?php endif; ?>"><?php echo $this->_tpl_vars['field']->getName(); ?>
 <?php if ($_REQUEST['sort'] == $this->_tpl_vars['name']): ?><img src="/backend/img/<?php if ($_REQUEST['order']): ?>asc<?php else: ?>desc<?php endif; ?>.gif"/><?php endif; ?></a>
                                <?php else: ?>
                                <?php echo $this->_tpl_vars['field']->getName(); ?>

                            <?php endif; ?>
                        </th>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                    <th width="75px">&nbsp;</th>
                </tr>
            <?php $_from = $this->_tpl_vars['collection']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <tr >
                    <?php $_from = $this->_tpl_vars['entityFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fieldName'] => $this->_tpl_vars['fieldType']):
?>
                    <?php $this->assign('field', $this->_tpl_vars['item']->getField($this->_tpl_vars['fieldName'])); ?>

                        <?php if ($this->_tpl_vars['field']->isListable()): ?>
                            <td class="mixed">
                                <?php echo $this->_tpl_vars['item']->getFieldAdorned($this->_tpl_vars['fieldName']); ?>

                            </td>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <td style="align: center;">
                        <?php if ($this->_tpl_vars['edit']): ?>
                        <a  href="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/?id=<?php echo $this->_tpl_vars['item']->getPk(); ?>
"
                            onclick="go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/?id=<?php echo $this->_tpl_vars['item']->getPk(); ?>
'); return false;"
                                >
                            <img src="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
img/edit_icon.png" title="редактировать" width="16" height="16">
                        </a>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['delete']): ?>
                        <a href="javascript: void(0);"
                           onclick="if (confirm('Вы действительно желаете удалить страницу?')) go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/delete/?id=<?php echo $this->_tpl_vars['item']->getPk(); ?>
'); return false;"
                                >
                            <img src="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
img/delete_icon.png" title="удалить" width="16" height="16">
                        </a>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['statistics']): ?>
                            <a  href="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/statistics/?id=<?php echo $this->_tpl_vars['item']->getPk(); ?>
"
                                onclick="go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/statistics/?id=<?php echo $this->_tpl_vars['item']->getPk(); ?>
'); return false;"
                                    >
                                <img src="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
img/menu_icons/vote.gif" title="Статистика" width="16" height="16">
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
            </table>
        </div>
    <?php if ($this->_tpl_vars['collection']->hasPaginate()): ?>
        <div id="manager_param_paging" class="paging">
            <?php echo $this->_tpl_vars['collection']->showPagerAjax(false,'doPager'); ?>

        </div>
    <?php endif; ?>
        <?php if ($this->_tpl_vars['create']): ?>
        <div class="operation">
            <a href="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/" onclick="go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/edit/'); return false;" class="add">добавить</a>
            <div style="clear: both;"></div>
        </div>
        <?php endif; ?>
    </div>