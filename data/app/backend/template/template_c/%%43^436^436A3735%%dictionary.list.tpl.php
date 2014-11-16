<?php /* Smarty version 2.6.21, created on 2014-10-31 17:05:18
         compiled from dictionary.list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'dictionary.list.tpl', 36, false),)), $this); ?>
<h1>Словарь</h1>

<div class="field-box"><div>
    <form id="search">
        Фильтр: <input type="text" value="<?php echo $this->_tpl_vars['search']; ?>
" style="width: 170px"/> <button type="submit">Фильтровать</button>
    </form>
</div></div>

<script><?php echo '
jQuery(function($){
    $("#search").submit(function(){
        window.location.hash = window.location.hash.toString().replace(/\\?.*/,\'\') + \'?search=\' + $(this).children(\'input\').val()
        return false;
    });
});
'; ?>
</script>

<div style="width: 100%">
    <div class="table_body">
        <table class="text">
            <tr>
                <th>Ключ</th>
                
                <?php $_from = $this->_tpl_vars['cLanguages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iLanguage']):
?>
                <th><?php echo $this->_tpl_vars['iLanguage']->name; ?>
</th>
                <?php endforeach; endif; unset($_from); ?>

                <th width="50px;">&nbsp;</th>
            </tr>
            <?php $_from = $this->_tpl_vars['cDictionary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iDictionary']):
?>
            <tr>

                <td class="mixed"><?php echo $this->_tpl_vars['iDictionary']->keyword; ?>
</td>
                <?php $_from = $this->_tpl_vars['cLanguages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langName'] => $this->_tpl_vars['iLanguage']):
?>
                    <?php echo $this->_tpl_vars['iDictionary']->setLanguage($this->_tpl_vars['iLanguage']); ?>

                    <td><input type='text' id='<?php echo $this->_tpl_vars['name']; ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['iDictionary']->translation->get())) ? $this->_run_mod_handler('htmlentities', true, $_tmp, true, 'UTF-8') : htmlentities($_tmp, true, 'UTF-8')); ?>
' name='data[<?php echo $this->_tpl_vars['iLanguage']->code; ?>
][translation]'></td>
                <?php endforeach; endif; unset($_from); ?>
                <td>
                    <form action="<?php echo $this->_tpl_vars['module']; ?>
/save/" method="get" class='dict'>
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['iDictionary']->getPk(); ?>
">
                        <input class="d-submit ui-icon ui-icon-circle-check" type="submit" style="display: inline-block; border: none;">
                    </form>
                    
                    <a href="javascript: void(0);" 
                        onclick="if (confirm('Вы действительно желаете удалить страницу?')) go('<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['module']; ?>
/delete/?id=<?php echo $this->_tpl_vars['iDictionary']->getPk(); ?>
'); return false;"
                        class="ui-icon ui-icon-circle-close" style="display: inline-block; border: none;">
                        <img src="<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
img/delete_icon.png"  title="удалить" width="16" height="16">
                    </a>
                </td>

            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    <?php if ($this->_tpl_vars['cDictionary']->hasPaginate()): ?>
    <div id="manager_param_paging" class="paging">
        <?php echo $this->_tpl_vars['cDictionary']->showPager(); ?>

        <?php echo '
        <script>
            new Pager("manager_param_paging");
        </script>
        '; ?>

    </div>
    <?php endif; ?>
</div>

<script>
    <?php echo '
        jQuery(function($){
            $("input.d-submit").click(function(){
                var o = $(this).parents("form");
                var f = $("<form></form>").attr({ action:  o.attr("action") });
                
                o.parents("tr").find("input[type=text], input[type=hidden]").each(function(){
                    $(this).clone().appendTo( f );    
                });
                
                $.ajax({
                    url: f.attr("action"),
                    data: f.serialize(),
                    type: "post",
                    success: function( data, status, xhr )
                    {
                        var m = $.parseJSON( xhr.getResponseHeader( "actionmessage" ) );
                        window.showActionMessage( m.message, m.type );
                    }
                });
                return false;
            });
            
            $(".text input").change( function(){
                $(this).data(\'borderColor\', $(this).css(\'borderColor\')).css({borderColor: \'orange\'});
                    
            } );
            $(".text input[type=submit]").click( function(){
                $(this).parents(\'tr\').find(\'input\').each(function(){
                    $(this).css({borderColor: $(this).css(\'borderColor\')});
                });
            });
        });
    '; ?>

</script>