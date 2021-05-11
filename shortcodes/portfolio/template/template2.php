<?php 
$dt_portfolio_title     = vc_param_group_parse_atts($dt_portfolio_title);
$dt_portfolio_sub_title = vc_param_group_parse_atts($dt_portfolio_sub_title);
$dt_portfolio_button    = vc_param_group_parse_atts($dt_portfolio_button);
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
 <section class="portfolio_area_three">
            <ul class="list-unstyled about_dot left">
                <li data-parallax='{"x": 0, "y": 100}'></li>
                <li data-parallax='{"x": 0, "y": 40}'></li>
                <li data-parallax='{"x": 10, "y": -40}'></li>
            </ul>
            <div class="container">
                <div class="row agency_portfolio_gallery" id="work_gallery">
                    <div class="col-md-6">
                        <div class="portfolio_banner_title">
                            <?php if(!empty( $dt_portfolio_title )): ?>
                            <h2><?php echo dt_extention_wp_kses($dt_portfolio_title); ?></h2>
                            <?php endif; ?>
                            <?php if(!empty( $dt_portfolio_sub_title )): ?>
                            <p>
                                <?php echo dt_extention_wp_kses($dt_portfolio_sub_title); ?>
                            </p>
                            <?php endif; ?>
                            <?php if(!empty( $dt_portfolio_button )): ?>
                            <a href="#" class="agency_learn_btn h_text_btn" data-text="Work with us"><?php echo dt_extention_wp_kses($dt_portfolio_button); ?> <i
                                    class="ti-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php  $i = 1;  foreach($posts as $key=>$post){ ?>
                    <div class="col-md-6">
                        <div class="agency_portfolio_item">
                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="p_img">
                                <?php  echo get_the_post_thumbnail($post->ID, 'full'); ?>
                                <div class="portfolio_overlay"></div>
                                <div class="content">
                                    <div class="brand_category">
                                    <?php 
                                        foreach($terms as $term) {
                                            echo '<span>'.$term->name.'</span>';
                                        }
                                    ?>
                                    </div>
                                    
                                    <h5><?php echo esc_attr( get_the_title($post->ID) ); ?></h5>
                                    <i class="ti-arrow-right arrow"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php  
                    $i++;
                    } 
                    ?>
                   
                </div>
                <div class="load_btn_center">
                    <a href="#" class="load_btn"><img src="assets/img/portfolio-two/loading.png" alt=""></a>
                </div>
            </div>
        </section>