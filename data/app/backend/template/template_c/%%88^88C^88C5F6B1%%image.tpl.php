<?php /* Smarty version 2.6.21, created on 2014-10-31 17:14:10
         compiled from parse.edit/image.tpl */ ?>
<label style="width: 100%;"><?php echo $this->_tpl_vars['field']->getName(); ?>
 <a href="javascript:void(0);" path="<?php echo $this->_tpl_vars['field']; ?>
" id="href-<?php echo $this->_tpl_vars['field']->getToken(); ?>
" style="border-bottom: 1px dashed #666; color:#666;">проcмотреть файл</a></label>

<div id="prev-<?php echo $this->_tpl_vars['field']->getToken(); ?>
" style="display: none;">
    <img src="<?php echo $this->_tpl_vars['field']; ?>
">

    <a href="javascript:void(0);" class="resize" style="display: none;">Применить</a>
</div>

<div style="float: left;margin-top: 10px">
    <input id="<?php echo $this->_tpl_vars['field']->getToken(); ?>
" name="file_upload" type="file" style="float: left;" />
    <input type="hidden" name="<?php echo $this->_tpl_vars['arrayName']; ?>
[<?php echo $this->_tpl_vars['name']; ?>
]" value="<?php echo $this->_tpl_vars['field']->get(); ?>
" id="val-<?php echo $this->_tpl_vars['field']->getToken(); ?>
" style="float: left;">
    </div>

<br clear="all"/>

<script>
    <?php echo '
    jQuery(function($)
    {
        var o = $(\'#'; ?>
<?php echo $this->_tpl_vars['field']->getToken(); ?>
<?php echo '\');
        var p = $(\'#'; ?>
prev-<?php echo $this->_tpl_vars['field']->getToken(); ?>
<?php echo '\');
        var r = $(\'#'; ?>
val-<?php echo $this->_tpl_vars['field']->getToken(); ?>
<?php echo '\');
        var h = $(\'#'; ?>
href-<?php echo $this->_tpl_vars['field']->getToken(); ?>
<?php echo '\');


        h.click(function(){
            var wrap = p.splash({
                            close: 0,
                            width: \'auto\'
                            });
            var cropApi;
            var prop = {
                        boxWidth: 500,
                        boxHeight: 300,
                        '; ?>

                        <?php if ($this->_tpl_vars['field']->getAspectRatio()): ?>
                        aspectRatio: <?php echo $this->_tpl_vars['field']->getAspectRatio(); ?>
,
                        <?php endif; ?>
                        <?php echo '
                        onSelect: function( coords ){
                                wrap.find("img").eq(0).data({crop: coords});
                                wrap.find("a.resize").fadeIn();
                            }
                        };

            var img = wrap.find("img").eq(0).Jcrop(prop,function(){
                            cropApi = this;
                        });

            wrap.find("a.resize").click(function(){
                        $.ajax({
                            url: "/backend/'; ?>
<?php echo $_REQUEST['module']; ?>
<?php echo '/resize/",
                            type: "post",
                            data: {
                                    path: h.attr("path"),
                                    params: wrap.find("img").eq(0).data("crop")
                                },
                            success: function(){
                                    var path = wrap.find("img").eq(0).attr("src") + "?" + Math.random().toString().replace(".","_");

                                    cropApi.destroy();
                                    img.hide().attr("src",path).Jcrop(prop,function(){
                                                                            cropApi = this;
                                                                        }).show();
                                }
                            });
                    });
        });

        if( ! p.find("img").eq(0).attr("src").length )
            h.hide();

        var uploadPath = "'; ?>
<?php echo $this->_tpl_vars['field']->getTemporalPath(); ?>
<?php echo '";

        o.uploadify({
            uploader  : \'/js/uploader/uploadify.swf\',
            script    : \'/js/uploader/uploadify.php\',
            cancelImg : \'/js/uploader/cancel.png\',
            fileExt   : '; ?>
"<?php echo $this->_tpl_vars['field']->acceptedTypes; ?>
"<?php echo ',
            fileDesc  : '; ?>
"Extensions: <?php echo $this->_tpl_vars['field']->acceptedTypes; ?>
"<?php echo ',
            folder    : uploadPath,
            multi     : false,
            auto      : true,
            onSelect: function()
            {
                window.blockScreen();
            },
            onComplete: function( event, ID, fileObj, response, data )
            {
                $("#contentblocker").fadeOut(300);
                h.attr("path", uploadPath + response).fadeIn();
                p.find("img").eq(0).attr("src", uploadPath + response);
                r.val(response);

                h.click();
            }
        });
    });
    '; ?>

</script>