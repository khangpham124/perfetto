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
        <h2 class="font_play"><?php echo ${'txt_job_'.$lang_web}; ?></h2>
        <p class="line_text"></p>
    </div>
</div>

<div class="wrapContent">
<ul class="break flexBox flexBox--center">
    <li><a href="<?php echo APP_URL; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
    <li><?php echo ${'txt_job_'.$lang_web}; ?></li>
</ul>

<div class="maxW">
    <?php
    $title_eng = $post->post_title;
    $title_viet = get_field('cf_title_viet');
    ?>
    <h3 class="h3_top font_play line"><?php echo ${'title_'.$lang_web}; ?></h3>    
    <div class="aboutCont">
        <?php 
        while(has_sub_field('jos_desc')):
        $skill_eng = get_sub_field('name');
        $skill_viet = get_sub_field('name_viet');
        $info_eng = get_sub_field('info');
        $info_viet = get_sub_field('info_viet');
        ?>
        <h4><?php echo ${'skill_'.$lang_web}; ?></h4>
        <div class="jobDesc"><?php echo ${'info_'.$lang_web}; ?></div>
        <?php endwhile; ?>
    </div>
    <a href="mailto:" class="btnApply"><?php echo ${'txt_apply_'.$lang_web}; ?></a>
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