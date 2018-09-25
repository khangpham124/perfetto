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
        <img src="<?php echo APP_URL; ?>img/subpage/main@manchines.jpg" class="pc" alt="">
        <img src="<?php echo APP_URL; ?>img/subpage/mainsp@manchines.jpg" class="sp" alt="">
    </div>
    <div class="text">
        <h2 class="font_play"><?php echo ${'txt_products_'.$lang_web} ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<?php $current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current category ?>

<div class="wrapContent">
<?php include(APP_PATH."libs/cafeimg.php"); ?>
<ul class="break flexBox flexBox--center">
    <li><a href="<?php echo APP_URL; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><a href="<?php echo APP_URL; ?>products/"><?php echo ${'txt_products_'.$lang_web} ?></a></li>
    <?php if($lang_web=='eng') { ?>
    <li><?php echo $current_term->name; ?></li>
    <?php } else { ?>
    <?php echo get_field( 'category_name_vn', 'productscat_'.$current_term->term_id.''); ?>
    <?php } ?>    
</ul>

<?php
if($current_term->slug=='machines') {
$args=array(
'child_of' => 0,
'orderby' =>'ID',
'order' => 'DESC',
'hide_empty' => 1,
'taxonomy' => 'productsbrand',
'number' => '0',
'pad_counts' => false
);
$categories = get_categories($args);
$i=0;
foreach ( $categories as $category ):
$slug = $category->slug;
$i++;
?>
<?php if($i%2==0) {  ?><div class="bg_color_prod"> <?php } ?>
    <h3 class="h3_top h3_top--large font_play line"><?php echo $category->name; ?></h3>
    <div class="maxW"> 
        <ul id="prod<?php echo $i; ?>" class="listMachines">
            <?php
                $wp_query = new WP_Query();
                $param=array(
                'post_type'=>'products',
                'order' => 'DESC',
                'posts_per_page' => '6',
                'tax_query' => array(
                array(
                'taxonomy' => 'productsbrand',
                'field' => 'slug',
                'terms' => $slug
                )
                )
                );
                $wp_query->query($param);
                if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
                $thumb_img = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_img,'full');
            ?>
            <li>
                <p class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <div>
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo thumbCrop($thumb_url[0],0,530); ?>" class="<?php the_title(); ?>" alt=""></a>
                </div>
            </li>
            <?php endwhile;endif; ?>
        </ul>   
    </div>
    <a href="<?php echo get_term_link($category->slug,'productsbrand');?>" class="btnView">View More</a>
<?php if($i%2==0) { ?></div><?php } ?>
<?php endforeach; ?>

<?php } else { ?>
    <?php if($lang_web=='eng') { ?>
    <h3 class="h3_top h3_top--large font_play line"><?php echo $current_term->name; ?></h3>
    <?php } else { ?>
    <h3 class="h3_top h3_top--large font_play line"><?php echo get_field( 'category_name_vn', 'productscat_'.$current_term->term_id.''); ?></h3>
    <?php } ?>    
    <div class="maxW">
        <ul class="flexBox flexBox--wrap lstItem">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $wp_query = new WP_Query();
                $param=array(
                'post_type'=>'products',
                'order' => 'DESC',
                'posts_per_page' => '16',
                'paged' => $paged,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'productscat',
                    'field' => 'slug',
                    'terms' => $current_term->slug
                    )
                    )
                );
                $wp_query->query($param);
                if($wp_query->have_posts()):while($wp_query->have_posts()) : $wp_query->the_post();
                $thumb_img = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_img,'full');
            ?>
                <li>
                    <div>
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo thumbCrop($thumb_url[0],0,600); ?>" class="<?php the_title(); ?>" alt=""></a>
                        <p class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    </div>
                </li>
            <?php endwhile;endif; ?>
        </ul>
        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </div>
<?php } ?>

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
<script src="<?php echo APP_URL; ?>common/js/slick.min.js"></script>
<?php $countM = count($categories); ?>
<script>
    $(function(){
        <?php for($u=0;$u<=$countM;$u++) { ?>
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
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '80px',
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '80px',
            }
            }
        ]
        });
        <?php } ?>
    });
</script>    

</body>
</html>	