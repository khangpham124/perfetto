<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="blog">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<div class="mainSub">
    <div class="inner">
        <img src="<?php echo APP_URL; ?>img/subpage/main@blog.jpg" class="pc" alt="">
        <img src="<?php echo APP_URL; ?>img/subpage/mainsp@blog.jpg" class="sp" alt="">
    </div>
    <div class="text">
        <h2 class="font_play"><?php echo ${'txt_news_'.$lang_web}; ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><?php echo ${'txt_news_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <div class="flexBox flexBox--wrap  flexBox--start flexBox--between flexBox--sp_reserve">
        <?php
            $wp_query = new WP_Query();
            $param = array (
            'posts_per_page' => '1',
            'post_type' => 'news',
            'post_status' => 'publish',
            'order' => 'DESC',
            'meta_query' => array(
            array(
            'key' => 'feature',
            'value' => 'yes',
            'compare' => '='
            ))
            
            );
            $wp_query->query($param);
            if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
            $thumg_image = get_post_thumbnail_id($post->ID);
            $thumb_url = wp_get_attachment_image_src($thumg_image,'full');
            $title_eng = $post->post_title;
            $title_viet = get_field('cf_title');
            $content_eng = $post->post_content;
            $content_viet = get_field('cf_content');
		?>
            <div class="leftBlog">
                <p class="date"><?php the_time('d.m.Y'); ?></p>
                <p class="title font_play"><?php echo ${'title_'.$lang_web}; ?></p>
                <div class="content">
					<?php
						$content = ${'content_'.$lang_web};
						$text= strip_tags($content, '<br />');
						if(mb_strlen($text)>140) { 
						$desc= mb_substr($text,0,400) ; 
						echo $desc ;
						} else {echo $text;}
					?>
                </div>
                <a href="<?php the_permalink(); ?>" class="linkBtn"><?php echo ${'txt_read_'.$lang_web}; ?></a>
            </div>
			<div class="rightBlog"><img src="<?php echo thumbCrop($thumb_url[0],500,500); ?>" alt="<?php the_title(); ?>"></div>
			<?php endwhile;endif; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<div class="moreBlog">
    <div class="maxW">
        <ul class="lstBlog flexBox flexBox--between flexBox--wrap">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts($query_string . '&orderby=post_date&order=desc&posts_per_page=3&paged=' . $paged); 
                if(have_posts()):while(have_posts()) : the_post();
                $thumg_image = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($thumg_image,'full');
                $title_eng = $post->post_title;
                $title_viet = get_field('cf_title');
                $content_eng = $post->post_content;
                $content_viet = get_field('cf_content');
            ?>    
            <li>
                <?php if($thumb_url!='') { ?>
                <p class="thumb"><img src="<?php echo thumbCrop($thumb_url[0],300,210); ?>" alt="<?php the_title(); ?>"></p>
                <?php } ?>
                <div class="wrap">
                    <p class="date"><?php the_time('d.m.Y') ?></p>
                    <a href="<?php the_permalink(); ?>" class="title"><?php echo ${'title_'.$lang_web}; ?></a>
                    <div class="desc">
                    <?php
						$content = ${'content_'.$lang_web};
						$text= strip_tags($content, '<br />');
						if(mb_strlen($text)>140) { 
						$desc= mb_substr($text,0,400) ; 
						echo $desc ;
						} else {echo $text;}
					?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="linkBtn"><?php echo ${'txt_read_'.$lang_web}; ?></a>
                </div>
            </li>
            <?php endwhile;endif; ?>
        </ul>

        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </div>
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