<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="products">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<div class="mainSub">
    <div class="inner">
        <img src="<?php echo APP_URL; ?>img/subpage/main@product.jpg" class="pc" alt="">
        <img src="<?php echo APP_URL; ?>img/subpage/mainsp@product.jpg" class="sp" alt="">
    </div>
    <div class="text">
        <h2 class="font_play"><?php echo ${'txt_products_'.$lang_web}; ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<div class="wrapContent">
<?php include(APP_PATH."libs/cafeimg.php"); ?>
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><?php echo ${'txt_products_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <ul class="listProducts">
        <?php
            $args=array(
            'child_of' => 0,
            'orderby' =>'ID',
            'order' => 'DESC',
            'hide_empty' => 0,
            'taxonomy' => 'productscat',
            'number' => '0',
            'pad_counts' => false
            );
            $i=0;
            $categories = get_categories($args);
            foreach ( $categories as $category ):
            $slug = $category->slug;
            $term_id=$category->term_id;
            $name_cat_eng = $category->name;
            $name_cat_viet = get_field( 'category_name_vn', 'productscat_'.$term_id.'');
            $desc_cat_eng = $category->description;
            $desc_cat_viet = get_field( 'descripion_viet', 'productscat_'.$term_id.'');
            $img_cate = wp_get_attachment_image_src(get_field( 'category_image', 'productscat_'.$term_id.''),'full');
            $i++;
        ?>
        <li class="flexBox flexBox--center flexBox--between flexBox--wrap <?php if($i%2==0) {?>flexBox--reserve<?php } ?>">
            <div class="thumb">
                <img src="<?php echo thumbCrop($img_cate[0],500,674); ?>" alt="<?php echo ${'name_cat_'.$lang_web}; ?>">
            </div>
            <div class="overflow">
                    <p class="font_play title"><?php echo ${'name_cat_'.$lang_web}; ?></p>
                    <div class="content"><?php echo ${'desc_cat_'.$lang_web}; ?></div>
                    <a href="<?php echo get_term_link($category->slug,'productscat');?>" class="hover-arrow"><?php echo ${'txt_discover_'.$lang_web}; ?></a>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</div>


<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.min.js"></script>
<script>
$(document).ready(function() {
    setTimeout(function() {
        // $('.wrapLoad').fadeOut(200);
        TweenMax.to(".largeText", 0.5, {ease: Back.easeOut.config(1.5), y:0 });
        TweenMax.to(".linkText", 0.5, {ease: Back.easeOut.config(1.5), y:0,delay:0.1});
    }, 800);
});
</script>


</body>
</html>	