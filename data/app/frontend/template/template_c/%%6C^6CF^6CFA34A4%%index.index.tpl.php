<?php /* Smarty version 2.6.21, created on 2014-11-04 18:18:06
         compiled from index.index.tpl */ ?>
<div class="wrap">
    <script type="text/javascript">
        <?php echo '
        $(document).ready(function() {
            $(\'.popup-with-zoom-anim\').magnificPopup({
                type: \'inline\',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: \'auto\',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: \'my-mfp-zoom-in\'
            });
        });
        '; ?>

    </script>
    <!-- start-->
    <div class="content-top">
        <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
            <div class="col_1_of_projects span_1_of_projects">
                <a href="#">
                    <div class="view view-first">
                        <img src="<?php echo $this->_tpl_vars['gallery']->image->thumb(true,290,338,5); ?>
"/>
                            <div class="mask">
                                <h2><?php echo $this->_tpl_vars['gallery']->name->get(); ?>
</h2>
                                <p><?php echo $this->_tpl_vars['gallery']->description->get(); ?>
</p>
                                <a class="popup-with-zoom-anim" href="#small-dialog<?php echo $this->_tpl_vars['gallery']->getPk(); ?>
"> <div class="info">Read More</div></a>
                                <div id="small-dialog<?php echo $this->_tpl_vars['gallery']->getPk(); ?>
" class="mfp-hide">
                                    <div class="pop_up2">
                                        <img src="<?php echo $this->_tpl_vars['gallery']->image->thumb(true,298,348,5); ?>
"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
        <?php endforeach; endif; unset($_from); ?>
        <div class="clear"></div>
    </div>
</div>
