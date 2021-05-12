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
<section class="portfolio_area_five">
    <div class="container">
        <?php
            $i = 1;
            foreach($posts as $key=>$post){
            if($i % 2 == 0){
                $cal = "flex-row-reverse"; 
            }
            else{
                $cal = "";
            } 
        
        ?>
        <div class="row align-items-center <?php echo $cal; ?> portfolio_item_five">
            <div class="col-lg-7">
                <div class="portfolio_img">
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="portfolio_content_info">
                    <h5>
                        <?php 
                        foreach($terms as $term) {
                            echo '<span>'.$term->name.'</span>';
                        }
                        ?>
                    </h5>
                    <h2><?php echo esc_attr( get_the_title($post->ID) ); ?></h2>
                    <p>Risus commodo viverra maecenas lacus accumsan ven dacises. </p>
                    <div class="portfolio_information">
                        <div class="item">
                            <h5>Client</h5>
                            <p>Google Singapore</p>
                        </div>
                        <div class="item">
                            <h5>Role</h5>
                            <p>Development</p>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="agency_learn_btn h_text_btn"
                        data-text="Discover More">Discover More
                        <i class="ti-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php  
        $i++;
        } 
        ?>
        
        <div class="load_btn_center">
            <a href="#" class="load_btn"><img src="assets/img/portfolio-two/loading.png" alt=""></a>
        </div>
    </div>
</section>