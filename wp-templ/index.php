<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="top" class="noScroll web_<?php echo $lang_web; ?>">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->

<div class="wrapSlide">
    <div class="inner">
        <ul id="slider">
            <li><img src="<?php echo APP_URL; ?>img/top/slide1.jpg" class="pc" alt="">
            <img src="<?php echo APP_URL; ?>img/top/slide1@sp.jpg" class="sp" alt="">
                <div class="text">
                    <h3 class="largeText">The best coffee<br>
                    Collection</h3>
                    <a class="linkText" href="">Discover</a>
                </div>
            </li>
            <li><img src="<?php echo APP_URL; ?>img/top/slide2.jpg" class="pc" alt="">
            <img src="<?php echo APP_URL; ?>img/top/slide2@sp.jpg" class="sp" alt="">
                <div class="text">
                    <h3 class="largeText">Distinta Breakfast<br>
                    Collection</h3>
                    <a class="linkText" href="">Discover</a>
                </div>
            </li>
            <li><img src="<?php echo APP_URL; ?>img/top/slide3.jpg" class="pc" alt="">
            <img src="<?php echo APP_URL; ?>img/top/slide3@sp.jpg" class="sp" alt="">
                <div class="text  text--center">
                    <h3 class="largeText">Welcome to Coffee World</h3>
                    <a class="linkText" href="">Discover</a>
                </div>
            </li>
        </ul>
    </div>
</div>


<div class="wrapTop">
<?php include(APP_PATH."libs/cafeimg.php"); ?>

<h2 class="h2_page"><?php echo ${'txt_product_'.$lang_web}; ?></h2>
<h3 class="h3_top font_play"><?php echo ${'slogan_'.$lang_web}; ?></h3>

<div class="maxW">
    <ul class="flexBox flexBox--wrap flexBox--between  flexBox--center lstTop flexBox--nosp">
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
			$categories = get_categories($args);
			foreach ( $categories as $category ):
			$slug = $category->slug;
			$term_id=$category->term_id;
			$img_cate = wp_get_attachment_image_src(get_field( 'category_image', 'productscat_'.$term_id.''),'full');
		?>
		<li class="biggerlink <?php if($slug=="accessories") { ?>noneDis<?php } ?>">
            <div class="thumb">
                <img src="<?php echo $img_cate[0]; ?>" alt="">
            </div>
            <div class="name flexBox flexBox--between">
                <?php if($lang_web == 'eng') { ?>
                    <p><?php echo $category->name; ?></p>
                <?php } else { ?>
                    <p><?php echo get_field( 'category_name_vn', 'productscat_'.$category->term_id.''); ?></p>
                <?php } ?>    
                <a href="<?php echo get_term_link($category->slug,'productscat');?>"><?php echo ${'txt_discover_'.$lang_web}; ?></a>
            </div>
		</li>
			<?php endforeach; ?>
    </ul>
</div>

<h3 class="h3_spec font_play"><?php echo ${'txt_product_'.$lang_web}; ?></h3>
<div class="wrapVideo">
<div class="pc">
<?php include(APP_PATH."libs/cafeimg.php"); ?>
</div>
    <div class="boxVideo">
        <div class="inner">
        <iframe width="100%" height="420" src="https://www.youtube.com/embed/g0sZNqAMvAw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>    
    </div>
</div>


<div class="wrapBlog">
<h2 class="h2_page"><?php echo ${'txt_news_'.$lang_web}; ?></h2>
<div class="pc">
<?php include(APP_PATH."libs/cafeimg.php"); ?>
</div>
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
			?>
            <div class="leftBlog">
                <p class="date"><?php the_time('d.m.Y'); ?></p>
                <p class="title font_play"><?php the_title(); ?></p>
                <div class="content">
					<?php
						$content = get_the_content();
						$text= strip_tags($content, '<br />');
						if(mb_strlen($text)>140) { 
						$desc= mb_substr($text,0,400) ; 
						echo $desc ;
						} else {echo $text;}
					?>
				</div>
            </div>
			<div class="rightBlog"><img src="<?php echo thumbCrop($thumb_url[0],500,500); ?>" alt="<?php the_title(); ?>"></div>
			<?php endwhile;endif; ?>
        </div>

    </div>
</div>

<div class="contactBox">
    <img src="<?php echo APP_URL; ?>img/top/cup.png" class="imgCup" alt="">
    <h2 class="h2_page font_play"><?php echo ${'txt_contact_'.$lang_web}; ?></h2>
    <div class="maxW">
        <div id="map"></div>
        <ul class="flexBox flexBox--between flexBox--center listLogo">
            <li><a href="https://www.cimbali.vn/" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand1.png" alt=""></a></li>
            <li><a href="https://www.delonghi.com/vi-vn" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand2.png" alt=""></a></li>
            <li><a href="http://www.elba.com.vn/home.aspx" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand3.png" alt=""></a></li>
            <li><a href="" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand4.png" alt=""></a></li>
            <li><a href="https://www.eversys.com/" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand5.png" alt=""></a></li>
            <li><a href="" target="_blank"><img src="<?php echo APP_URL; ?>common/img/footer/brand6.png" alt=""></a></li>
        </ul>
        <ul class="lstContact flexBox flexBox--between flexBox--wrap flexBox--nosp">
            <li>
                <h4 class="font_play"><?php echo ${'txt_location_'.$lang_web}; ?></h4>
                <p><?php echo $address_hcm; ?></p>
            </li>
            <li>
                <h4 class="font_play"><?php echo ${'txt_contact_'.$lang_web}; ?></h4>
                <p>
                <i class="fa fa-phone" aria-hidden="true"></i><?php echo $phone_hcm; ?><br>
                <i class="fa fa-fax" aria-hidden="true"></i><?php echo $fax_hcm; ?><br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="<?php echo $email; ?>"><?php echo $email; ?></a>
                </p>
            </li>
            <li>
                <h4 class="font_play"><?php echo ${'txt_follow_'.$lang_web}; ?></h4>
                <p>
                <a href="<?php echo $fb_link; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="<?php echo $gg_link; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a href="<?php echo $tit_link; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="<?php echo $youtube_link; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </p>
            </li>
        </ul>
        
    </div>
    <p class="copyright">© 2018 Perfetto. All Rights Reserved - Develop by <a href="http://vnese-freelance.co/" target="_blank"><img src="<?php echo APP_URL; ?>img/subpage/logo_vnese.svg" alt="Vnese Group"></a></p>
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


<script>
    $(function(){
$('#slider').slick({
  dots: false,
  infinite: true,
  arrows:false,
  speed: 1200,
  autoplay: true,
  fade: true,
  pauseOnFocus: false,
  autoplaySpeed: 2800,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
				arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
				arrows: false,
        slidesToScroll: 1
      }
    }
  ]
});

    $(window).resize(function(){
        var h_slide = $('.wrapSlide .inner').height();
        $('.wrapSlide').css('height',h_slide + 30);
    });
});

$("#slider").on('beforeChange', function(event, slick, nextSlide){
    TweenMax.to(".largeText", 0, {ease: Back.easeOut.config(1), opacity:0, y:120 });
    TweenMax.to(".linkText", 0, {ease: Back.easeOut.config(1),opacity:0, y:120});
});

$("#slider").on('afterChange', function(event, slick, currentSlide){
    TweenMax.to(".largeText", 0.5, {ease: Back.easeOut.config(1),opacity:1, y:0 });
    TweenMax.to(".linkText", 0.5, {ease: Back.easeOut.config(1),opacity:1, y:0,delay:0.1});
});
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV7fW4OF5FqFFlLakpTOvf1Kuq_qHXcqY"></script>
<script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,
					scrollwheel: false,
					scaleControl: false,
					draggable: true,
					clickableIcons: false,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(10.804326, 106.637733),

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                   styles: [{"featureType":"all","elementType":"all","stylers":[{"saturation":-120},{"gamma":0.8}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(10.804326, 106.637733),
                    map: map,
					icon: new google.maps.MarkerImage('http://vnese-freelance.co/projects/perfetto/img/top/pin.png',null,null, null,new google.maps.Size(40,38))
                });
            }
</script>
</body>
</html>	