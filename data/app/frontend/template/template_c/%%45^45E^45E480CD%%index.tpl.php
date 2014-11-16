<?php /* Smarty version 2.6.21, created on 2014-10-31 14:47:49
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'static_loader', 'index.tpl', 12, false),array('function', 'show_block', 'index.tpl', 33, false),)), $this); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="uk">
<head>
    <title><?php echo $this->_tpl_vars['currentPage']->getTitle(); ?>
</title>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="keywords" content="<?php echo $this->_tpl_vars['currentPage']->getKeyWords(); ?>
" />
    <meta name="description" content="<?php echo $this->_tpl_vars['currentPage']->getDescription(); ?>
"/>


    <?php $_from = $this->_tpl_vars['fvConfig']->get('includes.css'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Css']):
?>
        <link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['Css'])) ? $this->_run_mod_handler('static_loader', true, $_tmp) : smarty_modifier_static_loader($_tmp)); ?>
"/>
    <?php endforeach; endif; unset($_from); ?>

    <?php $_from = $this->_tpl_vars['currentPage']->getCss(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
        <link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['file'])) ? $this->_run_mod_handler('static_loader', true, $_tmp) : smarty_modifier_static_loader($_tmp)); ?>
"/>
    <?php endforeach; endif; unset($_from); ?>
    <?php $_from = $this->_tpl_vars['fvConfig']->get('includes.js'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Js']):
?>
        <script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['Js'])) ? $this->_run_mod_handler('static_loader', true, $_tmp) : smarty_modifier_static_loader($_tmp)); ?>
"></script>
    <?php endforeach; endif; unset($_from); ?>

    <?php $_from = $this->_tpl_vars['currentPage']->getJS(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
        <script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['file'])) ? $this->_run_mod_handler('static_loader', true, $_tmp) : smarty_modifier_static_loader($_tmp)); ?>
"></script>
    <?php endforeach; endif; unset($_from); ?>

    <!--[if lte IE 8]>
    <script src="/js/html5.js" ></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <header>
            <?php echo smarty_function_show_block(array('file' => "header.tpl"), $this);?>

        </header>

        <section id="main">
            <?php echo $this->_tpl_vars['currentPage']->getPageContent(); ?>

        </section>

        <footer>
            <?php echo smarty_function_show_block(array('file' => "footer.tpl"), $this);?>

        </footer>
    </div>
</body>
</html>
