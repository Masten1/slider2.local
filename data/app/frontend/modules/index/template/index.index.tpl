<div class="wrap">
    <script type="text/javascript">
        {literal}
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
        {/literal}
    </script>
    <!-- start-->
    <div class="content-top">
        {foreach from=$galleries item=gallery}
            <div class="col_1_of_projects span_1_of_projects">
                <a href="#">
                    <div class="view view-first">
                        <img src="{$gallery->image->thumb(true, 290, 338, 5)}"/>
                            <div class="mask">
                                <h2>{$gallery->name->get()}</h2>
                                <p>{$gallery->description->get()}</p>
                                <a class="popup-with-zoom-anim" href="#small-dialog{$gallery->getPk()}"> <div class="info">Read More</div></a>
                                <div id="small-dialog{$gallery->getPk()}" class="mfp-hide">
                                    <div class="pop_up2">
                                        <img src="{$gallery->image->thumb(true, 298, 348, 5)}"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
        {/foreach}
        <div class="clear"></div>
    </div>
</div>

