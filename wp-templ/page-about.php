<?php /* Template Name: About */ ?>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
</head>

<body id="about">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<div class="mainSub">
    <div class="inner">
        <img src="<?php echo APP_URL; ?>img/subpage/main@about.jpg" class="pc" alt="">
        <img src="<?php echo APP_URL; ?>img/subpage/mainsp@about.jpg" class="sp" alt="">
    </div>
    <div class="text">
        <h2 class="font_play"><?php echo ${'txt_about_'.$lang_web}; ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><?php echo ${'txt_about_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <h3 class="h3_top font_play line"><?php echo ${'slogan_'.$lang_web}; ?></h3>    
    <div class="aboutCont">
        <?php
            $content_eng = $post->post_content;
            $content_viet = get_field('cf_content');
            echo ${'content_'.$lang_web};
        ?>
    </div>
</div>

<div class="boxVideo">
    <div class="inner">
        <iframe width="100%" height="420" src="https://www.youtube.com/embed/g0sZNqAMvAw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>    
</div>

<ul class="lstCareer flexBox flexBox--wrap flexBox--center flexBox--between">
    <?php 
        $wp_query = new WP_Query();
        $param = array (
        'posts_per_page' => '-1',
        'post_type' => 'job',
        'post_status' => 'publish',
        'order' => 'DESC',
        );
        $wp_query->query($param);
        if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
        $thumg_image = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($thumg_image,'full');
    ?>
    <li>
        <img src="<?php echo thumbCrop($thumb_url[0],220,154); ?>" alt="">
        <div class="desc">
            <p class="title"><?php the_title(); ?></p>
            <a href="<?php the_permalink(); ?>"><?php echo ${'txt_read_'.$lang_web}; ?></a>
        </div>
    </li>
    <?php endwhile;endif; ?>
</ul>



<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->



</body>
</html>	