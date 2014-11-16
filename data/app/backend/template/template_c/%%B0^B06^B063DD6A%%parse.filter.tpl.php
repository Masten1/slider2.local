<?php /* Smarty version 2.6.21, created on 2014-10-31 14:45:14
         compiled from parse.filter.tpl */ ?>
<?php if ($this->_tpl_vars['type'] == 'simple'): ?>
    <div class="field-box">
        <div>
            <form id="search">
                <input type="text" value="<?php echo $this->_tpl_vars['search']; ?>
" style="width: 200px"/>
                <button type="submit" class="small">Фильтровать</button> <a class="ajax" href="#/backend/<?php echo $_REQUEST['__url']; ?>
">Сбросить</a>
            </form>
        </div>
    </div>

    <script><?php echo '
    jQuery(function($){
        $("#search").submit(function(){
            window.location.hash = window.location.hash.toString().replace(/\\?.*/,\'\') + \'?search=\' + $(this).children(\'input\').val()
                return false;
        });
    });
    '; ?>
</script>
<?php else: ?>
<?php endif; ?>