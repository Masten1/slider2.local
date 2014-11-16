<?php /* Smarty version 2.6.21, created on 2014-10-31 15:40:50
         compiled from parse.edit/checkbox.tpl */ ?>
<input type='hidden' value='0' name='<?php echo $this->_tpl_vars['arrayName']; ?>
[<?php echo $this->_tpl_vars['name']; ?>
]'>
<label><?php echo $this->_tpl_vars['field']->getName(); ?>

    <input type='checkbox' id='<?php echo $this->_tpl_vars['name']; ?>
' value='1' <?php if ($this->_tpl_vars['field']->get()): ?>checked='checked'<?php endif; ?> name='<?php echo $this->_tpl_vars['arrayName']; ?>
[<?php echo $this->_tpl_vars['name']; ?>
]'>
</label>
<br />
<br />