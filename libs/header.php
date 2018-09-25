<!--Google Tag Manager-->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-57374525-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>	
<!--End Google Tag Manager-->

<header id="header" class="">
    <div class="pc">
        <div class="headerInner flexBox flexBox--center flexBox--between">
            <p id="logo"><a href="<?php echo APP_URL; ?>"><img src="<?php echo APP_URL; ?>common/img/header/logo.svg" alft=""></a></p>
            <div class="rightHead flexBox flexBox--center">
                <ul class="flexBox flexBox--center gNavi">
                    <?php
                        $menulist = ${'menu_list_'.$lang_web}; 
                        foreach($menulist as $menus => $link) { 
                    ?>						
                    <li><a href="<?php echo APP_URL; ?><?php echo $link; ?>"><?php echo $menus; ?></a></li>
                    <?php } ?>
                </ul>
                <ul class="langBar">
                    <li><?php echo $lang_web; ?></li>
                </ul>
            </div>
        </div> 
    </div>
    <div class="sp">
        <div class="headerSp flexBox flexBox--center flexBox--between">
            <p class="logo_sp"><a href="<?php echo APP_URL; ?>"><img src="<?php echo APP_URL; ?>common/img/header/logo.svg" alft=""></a></p>
            <button class="hamburger hamburger--collapse" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
</header>

<div class="naviSp">
    <div class="wrap">
        <ul class="naviList">
            <?php
                $menulist = ${'menu_list_'.$lang_web}; 
                foreach($menulist as $menus => $link) { 
            ?>						
            <li><a href="<?php echo APP_URL; ?><?php echo $link; ?>"><?php echo $menus; ?></a></li>
            <?php } ?>
        </ul>
        <ul class="langBar">
            <li><?php echo $lang_web; ?></li>
        </ul>
    </div>
</div>

