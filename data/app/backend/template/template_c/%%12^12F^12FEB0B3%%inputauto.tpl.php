<?php /* Smarty version 2.6.21, created on 2014-10-31 15:40:50
         compiled from parse.edit/inputauto.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'parse.edit/inputauto.tpl', 3, false),)), $this); ?>
<label>
    <?php echo $this->_tpl_vars['field']->getName(); ?>
:
    <input type='text' id='<?php echo $this->_tpl_vars['name']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['field']->get())) ? $this->_run_mod_handler('htmlentities', true, $_tmp, true, 'UTF-8') : htmlentities($_tmp, true, 'UTF-8')); ?>
' name='<?php echo $this->_tpl_vars['arrayName']; ?>
[<?php echo $this->_tpl_vars['name']; ?>
]'>
</label>
<a href='javascript:void(0);' onclick="javascript:window.doGenerateUrl('<?php echo $this->_tpl_vars['name']; ?>
', '<?php echo $this->_tpl_vars['field']->getAuto(); ?>
');">
    <p style='font-size: 12px; color:#5f5f5f; margin-left: 180px; margin-bottom: 3px;'>сгенерировать URL</p>
</a>
<br />

<div id='buffer' style='display:none;'></div>


<script>
    <?php echo '
    Object.extend(window, {
        doGenerateUrl: function(res, source)
        {
            var ajax = new Ajax.Updater(
                    "buffer",
                    "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
transliterate/generateurl<?php echo '",
                    {
                        parameters : {name: $(source).value},
                        asynchronous:true,
                        onComplete: function () {
                            $(res).value = $("buffer").innerHTML;
                        }
                    }
            );
        }
    });

    '; ?>

</script>