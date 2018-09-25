<p id="pageTop"><a href="javascript:void(0)"><img src="<?php echo APP_URL; ?>common/img/footer/ico_top.png" alt=""></a></p>

<footer id="footer">
    <div class="subFooter flexBox flexBox--center flexBox--between flexBox--wrap">
        <ul class="flexBox flexBox--center lstFoot flexBox--wrap">
            <?php
                $menulist = ${'menu_list_'.$lang_web}; 
                foreach($menulist as $menus => $link) { 
            ?>						
            <li><a href="<?php echo APP_URL; ?><?php echo $link; ?>"><?php echo $menus; ?></a></li>
            <?php } ?>
        </ul>

        <ul class="flexBox flexBox--center lstSocial">
            <li><a href="<?php echo $fb_link ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $gg_link ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $tit_link ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo $youtube_link ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <div class="maxW">
        <ul class="flexBox flexBox--between flexBox--center flexBox--wrap listLogo">
            <li><a href="https://www.cimbali.vn/" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand1.png" alt=""></a></li>
            <li><a href="https://www.delonghi.com/vi-vn" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand2.png" alt=""></a></li>
            <li><a href="http://www.elba.com.vn/home.aspx" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand3.png" alt=""></a></li>
            <li><a href="" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand4.png" alt=""></a></li>
            <li><a href="https://www.eversys.com/" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand5.png" alt=""></a></li>
            <li><a href="" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand6.png" alt=""></a></li>
        </ul>
    </div>
    <p class="copyright">© 2018 Perfetto. All Rights Reserved - Develop by <a href="http://vnese-freelance.co/" target="_blank"><img src="<?php echo APP_URL; ?>img/subpage/logo_vnese.svg" alt="Vnese Group"></a></p>
</footer>

<div class="loading">
    <div class="logo"><img src="<?php echo APP_URL; ?>common/img/header/logo.svg" alft=""></div>
</div>
<div class="overlay"></div>
<ul class="iconLang">
    <li <?php if($lang_web=='eng') { ?>class="active"<?php } ?>><a href="javascript:void(0)" data-lang="eng">ENG</a></li>
    <li <?php if($lang_web=='viet') { ?>class="active"<?php } ?>><a href="javascript:void(0)" data-lang="viet">VIET</a></li>
</ul>
<script src="<?php echo APP_URL; ?>common/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/biggerlink.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="<?php echo APP_URL; ?>common/js/common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script>
$(function(){    
    var h_main = $('.mainSub .inner').height();
    $('.mainSub').css('height',h_main);
    $(window).resize(function(){
        var h_main = $('.mainSub .inner').height();
        $('.mainSub').css('height',h_main);
    });
});    
</script>

