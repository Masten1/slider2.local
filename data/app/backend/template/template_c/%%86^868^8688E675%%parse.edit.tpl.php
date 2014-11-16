<?php /* Smarty version 2.6.21, created on 2014-10-31 15:40:50
         compiled from parse.edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'parse.edit.tpl', 9, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['field']):
?>
    <?php if ($this->_tpl_vars['field']->isReadonly()): ?>
        <label>
            <?php echo $this->_tpl_vars['field']->getName(); ?>
:<br>
            <div class="readonly"><?php echo $this->_tpl_vars['entity']->getFieldAdorned($this->_tpl_vars['name']); ?>
</div>
        </label>
        <br />
    <?php elseif ($this->_tpl_vars['field']->isEditable()): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='parse.edit/')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field']->getEditMethod()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field']->getEditMethod())))) ? $this->_run_mod_handler('cat', true, $_tmp, ".tpl") : smarty_modifier_cat($_tmp, ".tpl")), 'smarty_include_vars' => array('field' => $this->_tpl_vars['field'],'name' => $this->_tpl_vars['name'],'arrayName' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='data')) ? $this->_run_mod_handler('cat', true, $_tmp, "[") : smarty_modifier_cat($_tmp, "[")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['section']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['section'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "]") : smarty_modifier_cat($_tmp, "]")))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>