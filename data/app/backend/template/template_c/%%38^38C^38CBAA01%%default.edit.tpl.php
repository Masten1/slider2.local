<?php /* Smarty version 2.6.21, created on 2014-10-31 15:40:50
         compiled from default.edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'parse', 'default.edit.tpl', 24, false),)), $this); ?>
<h1>
    <?php if ($this->_tpl_vars['subject']->isNew()): ?>
        <?php echo $this->_tpl_vars['fvConfig']->getModuleName($this->_tpl_vars['path']); ?>
 → Создание записи
    <?php else: ?>
        <?php echo $this->_tpl_vars['fvConfig']->getModuleName($this->_tpl_vars['path']); ?>
 → Редактирование записи
    <?php endif; ?>
</h1>
<div class="operation"><a href="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['previous']; ?>
/" onclick="go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['previous']; ?>
/'); return false;" class="left">вернутся к списку</a><div style="clear: both;"></div></div>
<form method="post" action="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/save/">
    <?php if ($this->_tpl_vars['subject']->isLanguaged()): ?>
        <div id="tabs" style="dislay: none">
            <ul>
                <li>
                    <a href="#tabs-1">Общая информация</a>
                </li>
                <?php if ($this->_tpl_vars['lLangs']): ?>
                    <?php $_from = $this->_tpl_vars['lLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lang_title'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lang_title']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lang']):
        $this->_foreach['lang_title']['iteration']++;
?>
                        <li><a href="#tabs-<?php echo $this->_foreach['lang_title']['iteration']+1; ?>
"><?php echo $this->_tpl_vars['lang']->name; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </ul>

            <div id="tabs-1" class="form">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('parse', true, $_tmp, 'edit') : smarty_modifier_parse($_tmp, 'edit')); ?>

            </div>
            <?php if ($this->_tpl_vars['lLangs']): ?>
                <?php $_from = $this->_tpl_vars['lLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lang_inner'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lang_inner']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lang']):
        $this->_foreach['lang_inner']['iteration']++;
?>
                    <div id="tabs-<?php echo $this->_foreach['lang_inner']['iteration']+1; ?>
" class="form">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('parse', true, $_tmp, 'edit', $this->_tpl_vars['lang']) : smarty_modifier_parse($_tmp, 'edit', $this->_tpl_vars['lang'])); ?>

                    </div>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="ui-tabs ui-widget ui-widget-content ui-corner-all"><div class="form">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('parse', true, $_tmp, 'edit') : smarty_modifier_parse($_tmp, 'edit')); ?>

            </div></div>
        <?php endif; ?>
    <br/>
    <div class="buttonpanel">
        <input type="hidden" name="previous" value="<?php echo $this->_tpl_vars['previous']; ?>
" />
        <input type="hidden" name="redirect" id="redirect" value="">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['subject']->getPk(); ?>
">
        <input type="submit" name="save" value="Сохранить" class="ui-button"  onclick="$('redirect').value = '';">
        <input type="submit" name="save_and_return" value="Сохранить и выйти" class="ui-button" onclick="$('redirect').value = '1';">
    </div>

</form>

<script>
    <?php echo '
    jQuery(function($) {
        /*$("#phone").mask("+380 (99) 999-99-99");*/
        tinyMCE.init({
            // General options
            mode : "textareas",
            editor_selector: "rich",
            theme : "advanced",
            width: 900,
            height: 400,
            plugins : "imagemanager,filemanager,style,layer,table,save,advhr,advimage,advlink,inlinepopups,preview,media,searchreplace,print,contextmenu,directionality,fullscreen,wordcount,autosave",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,fullscreen",
            theme_advanced_buttons2 : "bullist,numlist,|,link,unlink,anchor,cleanup,code,|,forecolor,backcolor,|, tablecontrols,|,advhr,removeformat,|,insertimage, insertfile, image,charmap,media",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,


            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js"
        });

        $(".date" ).datepicker({ dateFormat: \'yy-mm-dd\' });
        $( "#tabs" ).tabs();
    });

    var new_wnd = new PopUpWindow({
        width: 800,
        height: \'auto\',
        center: true,
        url: \'/backend/\',
        title: "управление содержимым",
        name: \'add_new\',
        zIndex: 100,
        onShow: function (params) {
            new Ajax.Updater(\'add_new_content\', \''; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/editwindow/<?php echo '\', {
                parameters: {entity_name: $(\'add_new\').readAttribute(\'entity\')},
                evalScripts: true
            });
        },
        onOk: function (params) {
            new Ajax.Request(\''; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/saveajax/<?php echo '\', {
                parameters: $(\'add_form\').serialize(),
                onComplete: function (transport) {
                    if ($(\'contentblocker\')) $(\'contentblocker\').hide();
                    if (transport.getHeader(\'actionmessage\')) {
                        eval("var actionMessage = " + transport.getHeader(\'actionmessage\'));
                        window.showActionMessage(actionMessage.message, actionMessage.type);
                    }
                    window.location.reload();
                }
            });
        }
    });

    $(\'add_new\').observe(\'click\', new_wnd.show.bind(new_wnd));


    '; ?>

</script>