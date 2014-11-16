<?php /* Smarty version 2.6.21, created on 2014-10-31 14:44:40
         compiled from index.index.tpl */ ?>
<div style="margin-top: 30px;">
<h1>Список меню</h1>
    <div class="table_body">
        <table class="text">
            <?php $_from = $this->_tpl_vars['currentModuleTree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <?php if (count ( $this->_tpl_vars['item']['child_nodes'] ) > 0): ?>
                    <tr >
                        <td>
                            <h3><?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
                        </td>
                        <td style="width: 80%;vertical-align: middle;">
                                <?php $_from = $this->_tpl_vars['item']['child_nodes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_key'] => $this->_tpl_vars['child']):
?>
                                    <div style="float: left;margin-right: 10px; text-decoration: underline;">
                                        <a href="<?php echo $this->_tpl_vars['child']['href']; ?>
" onclick="go('<?php echo $this->_tpl_vars['child']['href']; ?>
'); return false;">
                                        <?php if (strlen ( trim ( $this->_tpl_vars['child']['image_name'] ) ) > 0): ?>
                                            <img src="/backend/img/menu_icons/<?php echo $this->_tpl_vars['child']['image_name']; ?>
" alt="<?php echo $this->_tpl_vars['child']['name']; ?>
" align="left" style="margin-right: 5px;">
                                        <?php endif; ?>
                                            <?php echo $this->_tpl_vars['child']['name']; ?>

                                        </a>
                                    </div>
                                <?php endforeach; endif; unset($_from); ?>
                        </td>
                    </tr>
                <?php endif; ?>                         
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
</div>