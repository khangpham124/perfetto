<ul id="prod1" class="listMachines">
    <?php 
        $wp_query = new WP_Query();
        if($slug_brand!='') {
        $param = array (
        'posts_per_page' => '6',
        'post_type' => 'products',
        'post_status' => 'publish',
        'order' => 'DESC',
        'exclude' => $current_post,
        'tax_query' => array(
            array(
            'taxonomy' => 'productsbrand',
            'field' => 'slug',
            'terms' => $slug_brand
            )
            )
        );
        } else {
        $param = array (
            'posts_per_page' => '6',
            'post_type' => 'products',
            'post_status' => 'publish',
            'order' => 'DESC',
            'exclude' => $current_post,
            'tax_query' => array(
                array(
                'taxonomy' => 'productscat',
                'field' => 'slug',
                'terms' => $slug_name
                )
                )
            );    
        }
        $wp_query->query($param);
        if($wp_query->have_posts()): while($wp_query->have_posts()) :$wp_query->the_post();
        $thumb_img = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($thumb_img,'full');
    ?>
    <li>
        <?php if($slug_brand!='') { ?>
        <p class="name"><?php the_title(); ?></p>
        <?php } ?>
        <div>
        <img src="<?php echo thumbCrop($thumb_url[0],0,530); ?>" alt="<?php the_title(); ?>">
        <?php if($slug_name!='') { ?>
        <p class="name nameItem"><?php the_title(); ?></p>
        <?php } ?>    
        </div>
    </li>
    <?php endwhile;endif; ?>    
</ul>