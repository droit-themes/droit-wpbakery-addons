<?php 

$args = array(
    'numberposts'      => 3,
    'orderby'          => ($dt_select_protflow_orderby != '') ? $dt_select_protflow_orderby : 'date',
    'order'            => ($dt_select_protflow_orderby != '') ? $dt_select_protflow_orderby : 'DESC',
    'post_type'        => 'portfolio',
);

if($dt_select_catagory != '' && $dt_category_dispaly == 'yes') {
    $args['tax_query'] =  [
            [
                'taxonomy' => 'portfolio_cat',
                'terms' => $dt_select_catagory,
            ]
        ];
}

$posts = get_posts($args);

?>


<div class="arch_work_area">
    <div class="container">
    <?php $i = 1;  foreach($posts as $key=>$post){ ?>
        <div class="row flex-row-reverse arch_work_item">
            <div class="col-lg-8">
                <div class="arch_work_img">
                    <div class="image_mask wow slideInLeft" data-wow-duration="1.8s">
                    </div>
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="arch_work_content wow fadeInLeft" data-wow-delay="0.<?php echo esc_attr( $i); ?>s">
                    <div class="number"><?php echo esc_html($i); ?></div>
                    <div class="image_name"><?php echo esc_attr( get_the_title($post->ID) ); ?></div>
                    <div class="location">London, UK</div>
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="agency_learn_btn arch_learn_btn" data-text="Discover More">
                        Discover More
                        <i class="icon-arrow-right-2"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php $i++; } ?>    
    </div>
</div>