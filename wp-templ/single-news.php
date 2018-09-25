<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
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

<?php 
$title_eng = $post->post_title;
$title_viet = get_field('cf_title');
$content_eng = $post->post_content;
$content_viet = get_field('cf_content');
?>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><a href="<?php echo APP_URL; ?>"><?php echo ${'txt_news_'.$lang_web}; ?></a></li>
    <li><?php echo ${'title_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <p class="time"><?php the_time('d.m.Y'); ?></p>
    <h3 class="titleBlog font_play"><?php echo ${'title_'.$lang_web}; ?></h3>    
    <div class="contentBlog"><?php echo ${'content_'.$lang_web}; ?></div>

    <div class="navBlog flexBox flexBox--center flexBox--between">
        <?php 
            $prev_post = get_previous_post();
            $next_post = get_next_post();
        ?>
        <a href="<?php echo APP_URL; ?>news/<?php echo $prev_post->post_name; ?>" class="prev"><?php echo ${'btn_prev_'.$lang_web}; ?></a>
        <a href="<?php echo APP_URL; ?>news/"><?php echo ${'btn_list_'.$lang_web}; ?></a>
        <a href="<?php echo APP_URL; ?>news/<?php echo $next_post->post_name; ?>" class="next"><?php echo ${'btn_next_'.$lang_web}; ?></a>
    </div>
</div>

<div class="moreBlog">
    <div class="maxW">
    <h3 class="h3_top font_play line">RELATED</h3>   
        <ul class="lstBlog flexBox flexBox--between flexBox--wrap">
            <?php
				$wp_query = new WP_Query();
                $param = array (
                'posts_per_page' => '3',
                'post_type' => 'news',
                'post_status' => 'publish',
                'order' => 'DESC',
                );
                $wp_query->query($param);
                if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
				$thumg_image = get_post_thumbnail_id($post->ID);
				$thumb_url = wp_get_attachment_image_src($thumg_image,'full');
			?>
            <li>
                <?php if($thumb_url!='') { ?>
                <p class="thumb"><img src="<?php echo thumbCrop($thumb_url[0],300,210); ?>" alt="<?php the_title(); ?>"></p>
                <?php } ?>
                <div class="wrap">
                    <p class="date"><?php the_time('d.m.Y'); ?></p>
                    <a href="" class="title"><?php the_title(); ?></a>
                    <div class="desc">
                    <?php
						$content = get_the_content();
						$text= strip_tags($content, '<br />');
						if(mb_strlen($text)>140) { 
						$desc= mb_substr($text,0,400) ; 
						echo $desc ;
						} else {echo $text;}
					?>
                    </div>
                    <a href="" class="linkBtn"><?php echo ${'txt_read_'.$lang_web}; ?></a>
                </div>
            </li>
            <?php endwhile;endif; ?>
        </ul>
    </div>        
</div>


<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->



</body>
</html>	