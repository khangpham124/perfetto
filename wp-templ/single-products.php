<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="products" class="productDetail">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<?php 
$brand = get_the_terms($post->ID, 'productsbrand');
foreach($brand as $term) { 
 $brand_name = $term->name;
 $slug_brand = $term->slug;
}
$cate = get_the_terms($post->ID, 'productscat');
foreach($cate as $term) { 
 $cate_name = $term->name;
 $cate_name_viet = get_field( 'category_name_vn', 'productscat_'.$term->term_id.'');
 $slug_name = $term->slug;
}
$current_post = $post->ID;
?>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><a href=""><?php echo ${'txt_products_'.$lang_web} ?></a></li>
    <li><a href=""><?php if($brand_name!='') {echo $brand_name;} else {
       if($lang_web=='eng') { 
            echo $cate_name;
        } else {
            echo $cate_name_viet;
        }
    } ?></a></li>
    <li><?php the_title(); ?></li>
</ul>

<div class="contetnDetail ItemPart flexBox flexBox--wrap flexBox--between">
    <div class="leftDetail">
        <h2 class="nameProd font_play sp"><?php the_title(); ?></h2>
        <div class="clearfix">
            <?php if($slug_name=='machines') { ?>
            <ul id="slideProImg">
                <?php 
                while(has_sub_field('list_image')):
                $image = wp_get_attachment_image_src(get_sub_field('img'),'full');
                ?>
                <li><img src="<?php echo $image[0]; ?>" class="" alt=""></li>
                <?php endwhile; ?>
            </ul>
            <ul id="slideProFor">
                <?php 
                while(has_sub_field('list_image')):
                $image_large = wp_get_attachment_image_src(get_sub_field('img'),'full');
                ?>
                <li><img src="<?php echo thumbCrop($image_large[0],0,90); ?>" class="" alt=""></li>
                <?php endwhile; ?>
            </ul>
            <?php } else { ?>
            <?php 
            $thumb_img = get_post_thumbnail_id($post->ID);
            $thumb_url = wp_get_attachment_image_src($thumb_img,'full');    
            ?>
            <img src="<?php echo $thumb_url[0]; ?>" class="imgMax" alt="<?php the_title(); ?>">
            <?php } ?>    
        </div>
    </div>
    <div class="rightDetail">
        <h2 class="nameProd font_play pc"><?php the_title(); ?></h2>
        <?php
            $cont_intro_eng = $post->post_content;
            $cont_intro_viet = get_field('cf_content_viet');;
        ?>
        <div class="descProd"><?php echo ${'cont_intro_'.$lang_web}; ?></div>
        <a href="javascript:void(0)" class="btnBuy"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo ${'txt_buy_'.$lang_web}; ?></a>
    </div>
</div>

<?php if($slug_name=='machines') { ?>
<ul class="tabItem flexBox flexBox--center flexBox--wrap">
    <li><a href="javascript:void(0)"  data-id="tab1"><?php echo ${'txt_tech_'.$lang_web} ?></a></li>
    <li><a href="javascript:void(0)"  data-id="tab2"><?php echo ${'txt_support_'.$lang_web} ?></a></li>
</ul>
<div class="infoTech">
    <div class="tabContent">
        <div class="tabBox" id="tab1">
            <?php
            $desc_info_eng = get_field('cf_description_info');
            $desc_info_viet = get_field('cf_description_info_viet');
            echo ${'desc_info_'.$lang_web};
            ?>
            <table>
                <?php if($lang_web == 'eng') { ?>
                <?php
                    while(has_sub_field('cf_technical_info')):
                ?>
                <tr>
                    <th><?php echo get_sub_field('name'); ?></th>
                    <td><?php echo get_sub_field('info'); ?></td>
                </tr>
                <?php endwhile; ?>
                <?php } else { ?>
                <?php
                    while(has_sub_field('cf_technical_info_viet')):
                ?>
                <tr>
                    <th><?php echo get_sub_field('name'); ?></th>
                    <td><?php echo get_sub_field('info'); ?></td>
                </tr>
                <?php endwhile; ?>    
                <?php } ?>    
            </table>
        </div>
        <div class="tabBox" id="tab2">
            <?php
            $supp_info_eng = get_field('cf_support_info');
            $supp_info_viet = get_field('cf_support_info_viet');
            echo ${'supp_info_'.$lang_web};
            ?>
            <ul class="flexBox flexBox--center flexBox--wrap flexBox--between lstVideo">
            <?php
            while(has_sub_field('cf_video')):
            ?>
            <li><iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_sub_field('youtube_video'); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>

<div class="maxW">
    <h3 class="h3_top font_play line"><?php echo ${'txt_related_'.$lang_web} ?></h3>
    <?php include(APP_PATH."libs/related.php"); ?>
</div>



<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<div class="popup">
    <dic class="inner">
        <div class="title font_play flexBox flexBox--center"><img src="<?php echo APP_URL; ?>img/subpage/arrow_back.png" class="btnClose" alt=""><p><?php the_title(); ?></p></div>
        <ul class="flexBox flexBox--between flexBox--wrap flexBox--nosp">
            <?php 
                $showroom = get_field('cf_showroom');
                if( $showroom !=='' ) {
            ?>
            <li>
                <div class="head">
                    <img src="<?php echo APP_URL; ?>img/subpage/icon_showroom.png" class="" alt="">
                    <h5>ShowRoom</h5>
                </div>
                <ul>
                    <?php
                        foreach( $showroom as $sr) {
                    ?>
                    <li><?php echo $sr->post_content; ?></li>
                    <?php }?>
                </ul>
            </li>
            <?php } ?>
            <?php
            if(get_field('cf_shop_online')) {
            ?>
            <li>
                <div class="head">
                    <img src="<?php echo APP_URL; ?>img/subpage/icon_online.png" class="" alt="">
                    <h5>Online</h5>
                </div>
                <?php
                    while(has_sub_field('cf_shop_online')):
                    $image_logo = wp_get_attachment_image_src(get_sub_field('logo'),'full');
                ?>
                <p class="iconOnline"><a href="<?php echo get_sub_field('url'); ?>"><img src="<?php echo $image_logo[0]; ?>" class="" alt=""></p>
                <?php endwhile; ?>
            </li>
            <?php } ?>
            <?php 
            $showroom = get_field('cf_retail_locator');    
            if( $showroom !=='' ) { ?>
                <li>
                    <div class="head">
                        <img src="<?php echo APP_URL; ?>img/subpage/icon_retail.png" class="" alt="">
                        <h5><?php echo ${'txt_retail_'.$lang_web} ?></h5>
                    </div>
                    <ul>
                        <?php
                            foreach( $retail as $re) {
                        ?>
                        <li><?php echo $re->post_content; ?></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.min.js"></script>
<script>
$(document).ready(function() {
    $('#slideProImg').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '#slideProFor'
		});
    $('#slideProFor').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#slideProImg',
        vertical: true,
        focusOnSelect: true,
        responsive: [
            {
            breakpoint: 767,
            settings: {
                vertical: false,
            }
            },
        ]
	});
    $('#tab1').show();
    $('.tabItem li:nth-child(1)').addClass('active');
    $('.tabItem li').click(function() {
        $('.tabItem li').removeClass('active');
        $(this).toggleClass('active');
        var tabId = $(this).find('a').attr('data-id');
        $('.tabBox').fadeOut(200);
        $('#'+tabId).fadeIn(200);
    });
    $('#prod1').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
            }
        ]
    });
    $(".overlay").click(function() {
        $(this).fadeOut(200);
        $('.popup').fadeOut(200);
    });
    $(".btnClose").click(function() {
        $('.overlay').fadeOut(200);
        $('.popup').fadeOut(200);
    });
});
</script>            

</body>
</html>	