<?php /* Smarty version 2.6.21, created on 2014-10-31 15:40:50
         compiled from parse.edit/input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'parse.edit/input.tpl', 3, false),)), $this); ?>
<label>
    <?php echo $this->_tpl_vars['field']->getName(); ?>
:
    <input type='text' id='<?php echo $this->_tpl_vars['name']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['field']->get())) ? $this->_run_mod_handler('htmlentities', true, $_tmp, true, 'UTF-8') : htmlentities($_tmp, true, 'UTF-8')); ?>
' name='<?php echo $this->_tpl_vars['arrayName']; ?>
[<?php echo $this->_tpl_vars['name']; ?>
]'>
</label>
<br />