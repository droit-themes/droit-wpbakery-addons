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
 <section class="portfolio_area_two custom_pad">
    <div class="row protfolio_custom_row" id="masonry">
        <?php
            $i = 1;
            foreach($posts as $key=>$post){ 
        ?>
        <div class="col-lg-4 col-sm-6 protfolio_custom_col">
            <div class="portfolio_item" data-parallax='{"x": 0, "y": -20}'>
                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?></a>
                <div class="portfolio_content text-center">
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                        <h3><?php echo esc_attr( get_the_title($post->ID) ); ?></h3>
                    </a>
                    <?php 
                        foreach($terms as $term) {
                            echo '<a href="#" class="p_category">'.$term->name.'</a>';
                        }
                    ?>
                    </a>
                </div>
            </div>
        </div>
        <?php  
        $i++;
        } 
        ?>
    </div>
    <div class="load_btn_center">
        <a href="#" class="load_btn"></a>
    </div>
</section>