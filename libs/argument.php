<?php
$pagename = str_replace(array('/', '.php', '?s='), '', $_SERVER['REQUEST_URI']);
$pagename = str_replace("wp", '', $_SERVER['REQUEST_URI']);
$pagename = $pagename ? $pagename : 'default';

switch ($pagename) {
    default:
		$titlepage = "Perfetto | Nhà phân phối độc quyền các thương hiệu nổi tiếng đến từ Ý |";			
		$desPage = "Perfetto là nhà phân phối độc quyền các thương hiệu hàng đầu đến từ Ý như máy pha cà phê DeLonghi, LaCimbali và thiết bị nhà bếp cao cấp ELBA, Perfetto Việt Nam mang đến những sản phẩm chất lượng nhất đáp ứng nhu cầu của mọi khách hàng.";
		$keyPage = "";
		$txtH1 = "Perfetto Nhà phân phối độc quyền các thương hiệu nổi tiếng đến từ Ý";
}

$menu_list_eng = array('HOME'=>'','PRODUCTS'=>'products/','NEWS'=>'news/','ABOUT US'=>'about-us/','CONTACT'=>'contact/');
$menu_list_viet = array('TRANG CHỦ'=>'','SẢN PHẨM'=>'products/','TIN TỨC'=>'news/','GIỚI THIỆU'=>'about-us/','LIÊN HỆ'=>'contact/');

$post_info = get_post( 19 );
$fb_link  = get_field('cf_facebook',$post_info->ID);
$gg_link  = get_field('cf_google',$post_info->ID);
$tit_link  = get_field('cf_twitter',$post_info->ID);
$youtube_link  = get_field('cf_youtube',$post_info->ID);

$email = get_field('cf_email',$post_info->ID);
$list_office = get_field('cf_location',$post_info->ID);

$address_hcm = $list_office[0]['address'];
$phone_hcm = $list_office[0]['phone'];
$fax_hcm = $list_office[0]['fax'];


//TEXT WEB 
$txt_location_eng = 'Location';
$txt_location_viet = 'Địa chỉ';

$txt_contact_eng = 'Contact';
$txt_contact_viet = 'Liên hệ';

$txt_follow_eng = 'Follow Us';
$txt_follow_viet = 'Kết nối';

$txt_product_eng = 'Products';
$txt_product_viet = 'Sản phẩm';

$txt_discover_eng = 'Discover';
$txt_discover_viet = 'Khám phá';

$txt_news_eng = 'News';
$txt_news_viet = 'Tin tức';

$txt_read_eng = "Read more";
$txt_read_viet = "Chi tiết";

$txt_about_eng = "About";
$txt_about_viet = "Giới thiệu";

$txt_job_eng = "Career";
$txt_job_viet = "Tuyển dụng";

$txt_products_eng = "Products";
$txt_products_viet = "Sản phẩm";

$txt_related_eng = "Related Products";
$txt_related_viet = "Sản phẩm khác";

$txt_tech_eng = 'Technical Info';
$txt_tech_viet = 'Thông số kỹ thuật';

$txt_support_eng = 'Support';
$txt_support_viet = 'Hỗ trợ';

$txt_buy_eng = 'WHERE TO BUY';
$txt_buy_viet = 'MUA HÀNG';

$txt_retail_eng = 'Retail Locator';
$txt_retail_viet = 'Đại lý';

$txt_apply_eng = 'APPLY NOW';
$txt_apply_viet = 'ỨNG TUYỂN';

$txt_location_eng = "Location";
$txt_location_viet = "Địa chỉ";

// $slogan_eng = "We believe the best product is one of the most important,<br>simple pleasures in life";
// $slogan_viet = "Chúng tôi tin rằng sản phẩm tốt nhất là điều quan trọng nhất,<br>niềm vui đơn giản trong cuộc sống";

$btn_prev_eng = 'Prev';
$btn_prev_viet = 'Trước';
$btn_next_eng = 'Next';
$btn_next_viet = 'Sau';
$btn_list_eng = 'BACK TO LIST';
$btn_list_viet = 'TRỞ LẠI';
?>