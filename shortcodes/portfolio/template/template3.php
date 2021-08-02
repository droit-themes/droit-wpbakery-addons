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
 <section class="portfolio_area_four">
    <div class="container">
        <div class="row agency_portfolio_gallery" id="masonry2">
        <?php
           $i = 1;
           foreach($posts as $key=>$post){
            if($i % 2 == 0){
                $cal = "offset-lg-2"; 
            }
            else{
                $cal = "";
            } 
            
            ?>
            <div class="col-lg-5 <?php echo $cal; ?> col-sm-6">
                <div class="portfolio_item">
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                    </a>
                    <div class="portfolio_content">
                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                            <h3> 
                                <?php 
                                foreach($terms as $term) {
                                    echo '<span>'.$term->name.'</span>';
                                }
                                ?>
                            </h3>
                        </a>
                        <p><?php echo esc_attr( get_the_title($post->ID) ); ?></p>
                    </div>
                </div>
            </div>
            <?php  
            $i++;
            } 
            ?>
            
        </div>
        <!--
        <div class="load_btn_center">
            <a href="#" class="load_btn"><img src="assets/img/portfolio-two/loading.png" alt=""></a>
        </div>
        -->
    </div>
</section>