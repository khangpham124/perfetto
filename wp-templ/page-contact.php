<?php
include($_SERVER["DOCUMENT_ROOT"] . "/projects/perfetto_wp/app_config.php");
include(APP_PATH."libs/head.php"); 
?>
<link rel="stylesheet" href="<?php echo APP_URL;?>common/css/slick.css">
</head>

<body id="contact">
<!--===================================================-->
<div id="wrapper">
<!--===================================================-->
<!--Header-->
<?php include(APP_PATH."libs/header.php"); ?>
<!--/Header-->
<div class="mainSub">
    <div class="inner">
        <img src="<?php echo APP_URL; ?>img/subpage/main@contact.jpg" class="pc" alt="">
        <img src="<?php echo APP_URL; ?>img/subpage/mainsp@contact.jpg" class="sp" alt="">
    </div>
    <div class="text">
        <h2 class="font_play"><?php echo ${'txt_contact_'.$lang_web}; ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href=""><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><?php echo ${'txt_contact_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <?php $page_contact = get_post( 19 ); ?>
    <ul class="tabItem flexBox flexBox--center flexBox--wrap">
        <?php
            $list_location = get_field('cf_location',$page_contact->ID);
            $i=0;
            while(has_sub_field('cf_location',$page_contact->ID)):
            $i++;
        ?>
        <li><a href="javascript:void(0)"  data-id="tab<?php echo $i; ?>"><?php echo get_sub_field('name'); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <div class="tabContent">
        <?php 
        $i=0;
        while(has_sub_field('cf_location',$page_contact->ID)):
        $i++;
        ?>
        <div class="tabBox" id="tab<?php echo $i; ?>">
            <ul class="listContact flexBox flexBox--top flexBox--wrap ">
                <li>
                    <h3 class="font_play"><?php echo ${'txt_location_'.$lang_web}; ?></h3>
                    <p><?php echo get_sub_field('address'); ?></p>
                </li>
                <li>
                    <h3 class="font_play"><?php echo ${'txt_contact_'.$lang_web}; ?></h3>
                    <p>
                    T : <?php echo get_sub_field('phone'); ?>
                    <br>
                    F : <?php echo get_sub_field('fax'); ?>
                    <br>
                    E : <?php echo $email; ?>
                    </p>
                </li>    
            </ul>
            <div class="frameMap"><?php echo get_sub_field('map'); ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<img src="<?php echo APP_URL; ?>img/top/cup.png" class="imgCup" alt="">

<!--Footer-->
<?php include(APP_PATH."libs/footer.php"); ?>
<!--/Footer-->
<!--===================================================-->
</div>
<!--/wrapper-->
<!--===================================================-->
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
    $('#tab1').show();
    $('.tabItem li:nth-child(1)').addClass('active');
    $('.tabItem li').click(function() {
        $('.tabItem li').removeClass('active');
        $(this).toggleClass('active');
        var tabId = $(this).find('a').attr('data-id');
        $('.tabBox').fadeOut(200);
        $('#'+tabId).fadeIn(200);
    });        
</script>


</body>
</html>	