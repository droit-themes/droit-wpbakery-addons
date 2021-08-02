<?php 

$args = array(
    'numberposts'      => ($dt_portfolio_show_post != '') ? $dt_portfolio_show_post : '5',
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
 <section class="portfolio_metro_area">
            <div class="container-fluid pl-0 pr-0">
                <div class="row portfolio_metro_gallery" id="home_pr_masonry">
                    <div class="grid-sizer custom_col_20"></div>
                    <?php
                    $i = 1;
                    foreach($posts as $key=>$post){
                    if($i == 2 || $i == 6 || $i == 7 || $i == 9){
                        $cal = "custom_col_40"; 
                    }
                    else{
                        $cal = "custom_col_20";
                    } 
                    ?>
                    <div class="<?php echo $cal; ?> portfolio_metro_item">
                        <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="portfolio_info">
                            <div class="text">
                                <h3 class="portfolio-title" data-hover="<?php echo esc_attr( get_the_title($post->ID) ); ?>">
                                    <span><?php echo esc_attr( get_the_title($post->ID) ); ?></span>
                                </h3>
                                <div class="portfolio-cat">
                                    <?php 
                                    foreach($terms as $term) {
                                        echo '<span class="cat">'.$term->name.'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php  
                     $i++;
                    } 
                    ?>
                </div>
                <div class="load_btn_center">
                    <a href="#" class="load_btn"></a>
                </div>
            </div>
        </section>