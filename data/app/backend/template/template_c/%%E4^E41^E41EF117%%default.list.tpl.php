<?php /* Smarty version 2.6.21, created on 2014-10-31 14:45:14
         compiled from default.list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'parse', 'default.list.tpl', 6, false),)), $this); ?>
<?php if (! $this->_tpl_vars['ajax']): ?>
<h1><?php echo $this->_tpl_vars['fvConfig']->getModuleName($this->_tpl_vars['path']); ?>
</h1>  


<?php echo ((is_array($_tmp=$this->_tpl_vars['collection'])) ? $this->_run_mod_handler('parse', true, $_tmp, 'filter', $this->_tpl_vars['filterConfig']) : smarty_modifier_parse($_tmp, 'filter', $this->_tpl_vars['filterConfig'])); ?>


<div id="result">
    <?php endif; ?>
    
        <?php echo ((is_array($_tmp=$this->_tpl_vars['collection'])) ? $this->_run_mod_handler('parse', true, $_tmp, 'table') : smarty_modifier_parse($_tmp, 'table')); ?>

        
    <?php if (! $this->_tpl_vars['ajax']): ?>
</div>
<?php endif; ?>

<script>
    <?php echo '
    jQuery(function($){

        $(".activator").click(function(){
            var f = $(this).parents("form");
            var tr = $(this).parents("tr").eq(0);
            $.ajax({
                url: f.attr("action"),
                data: f.serialize(),
                type: "post",
                success: function( data, status, xhr )
                {
                    tr.effect(\'highlight\', 600 );
                    var m = $.parseJSON( xhr.getResponseHeader( "actionmessage" ) );
                    window.showActionMessage( m.message, m.type );

                }
            });
        });



    });
    '; ?>

</script>

<script> 
    <?php echo '
    Object.extend(window, {

        doSendForm: function () 
        {
            if($(\'clear\').value == 1)
                {
                $(\'filter\').reset();
            }
            $(\'page\').value = 0;
            window.blockScreen(); 
            var data = Form.serialize("filter") + "&ajax=1";      
            new Ajax.Updater(
            "result", 
            "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['action']; ?>
<?php echo '", 
            {
                parameters: data,                    
                onComplete: function(transport){ window.completeRequest(transport); window.parseForms(); jQuery( "#zebra" ).zebra(); },
            });
        },
        doPager: function (page) 
        {
            var hash = window.location.hash.toString(); 
            if( hash.match(/\\?.*page=/) )
                window.location.hash = hash.replace(/page=\\d+/, \'page=\' + page);
            else if( hash.match(/\\?/) )
                window.location.hash = hash.replace(/&$/, \'\') + \'&page=\' + page;
            else
                window.location.hash = hash + \'?page=\' + page;
                /*
            /*if($(\'clear\').value == 1)
                {
                $(\'filter\').reset();
            }
            $(\'page\').value = page;
            var data = Form.serialize("filter")+ "&ajax=1";      
            window.blockScreen();
            var data = "page="+page+"&ajax=1&search=123";
            new Ajax.Updater(
            "result", 
            "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['action']; ?>
<?php echo '", 
            {
                parameters: data,                    
                onComplete: function(transport){window.completeRequest(transport);window.parseForms();  jQuery( "#zebra" ).zebra(); },
            });*/
        },
        doChangeActive: function(id_element,active)
        {

            if($(\'clear\').value == 1)
                {
                $(\'filter\').reset();
            }
            $(\'page\').value = 0;

            window.blockScreen(); 

            var data = Form.serialize("filter")+ "&ajax=1";      
            new Ajax.Updater(
            "result", 
            "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/changeactive<?php echo '", 
            {
                evalScripts: true,
                parameters: data+"&id_elemetn="+id_element+"&active="+active,
                onComplete: function(transport){window.completeRequest(transport);window.parseForms();},
            });

        },
        doChangeWeight: function(id_element,arrow)
        {

            if($(\'clear\').value == 1)
                {
                $(\'filter\').reset();
            }
            $(\'page\').value = 0;

            window.blockScreen(); 

            var data = Form.serialize("filter")+ "&ajax=1";
            new Ajax.Updater(
            "result", 
            "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/changeweight<?php echo '", 
            {
                evalScripts: true,
                parameters: data+"&id_elemetn="+id_element+"&arrow="+arrow,
                onComplete: function(transport){window.completeRequest(transport);window.parseForms();},
            });

        },
        doSort: function (field, direct) 
        {
            if($(\'clear\').value == 1)
                {
                $(\'filter\').reset();
            }
            
            window.blockScreen(); 
            $(\'direct\').value = direct;
            $(\'field\').value = field;
            var data = Form.serialize("filter")+ "&ajax=1";
            new Ajax.Updater(
            "result", 
            "'; ?>
<?php echo $this->_tpl_vars['fvConfig']->get('dir_web_root'); ?>
<?php echo $this->_tpl_vars['path']; ?>
/<?php echo $this->_tpl_vars['action']; ?>
<?php echo '", 
            {
                parameters: data,                    
                onComplete: function(transport){window.completeRequest(transport);window.parseForms();  jQuery( "#zebra" ).zebra(); },
            });
        },        

    });
    '; ?>

</script>