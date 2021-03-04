<?php

$args = array(
    'numberposts'      => ($dt_posts_per_page != '') ? $dt_posts_per_page : 4,
    'orderby'          => $dt_select_post_orderby,
    'order'            => $dt_select_post_order,
);

if($dt_ignor_stcky != 'yes') {

    $sticky_post = [];

    $get_sticky_posts =  get_posts();

    foreach($get_sticky_posts as $key => $post) {

        if(is_sticky($post->ID)) {
            array_push($sticky_post, $post->ID);
        }

    }

    if(!empty($sticky_post)) {
        $args['exclude'] =   $sticky_post; 
    }
}

if($dt_select_catagory != '' && $dt_category_dispaly == 'yes') {
    $args['category'] =   $dt_select_catagory; 
}

$get_post =  get_posts( $args );

// get sticky post id 


if('' != $get_post) :
?>

<div class="home_news_list_inner dt-vc">
    <?php foreach($get_post as $key => $post){
        $data_delay = '';
        if( $key ) {
            $data_delay = 'data-wow-delay="0.'.$key.'s"';
        }
        if(is_sticky($post->ID)) {
            $feature_post_cla = 'col-lg-6';
            if(!has_post_thumbnail($post->ID)) {
                $feature_post_cla = 'has-no-post-thum';
            }
        ?>
    <div class="home_news_features_item">
        <div class="row align-items-center">
            <div class="<?php echo  esc_attr( $feature_post_cla ); ?>">
                <div class="news_features_content wow fadeInLeft">
                    <h6><?php echo esc_html__('Featured', 'droit-wbpakery-addons') ?></h6>
                    <h2><?php echo get_the_title($post->ID); ?></h2>
                    <p><?php echo get_the_excerpt( $post->ID ); ?></p>
                    <a href="<?php echo esc_url( get_the_permalink( $post-ID) ); ?>" class="agency_learn_btn h_text_btn" data-text="<?php echo esc_attr__('Continue Reading', 'droit-wbpakery-addons'); ?>">
                    <?php echo esc_html__('Continue Reading', 'droit-wbpakery-addons'); ?>
                        <i class="ti-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php if(has_post_thumbnail($post->ID)){ ?>
                <div class="col-lg-6">
                    <div class="news_features_img wow fadeInRight" data-wow-delay="0.2s">
                       <?php echo get_the_post_thumbnail($post->ID, array(400, 365)); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php }else{ ?>
    <div class="media home_news_list_item wow fadeInDown" <?php echo esc_attr($data_delay); ?>>
        <div class="news_post_img">
        <?php if(has_post_thumbnail($post->ID)){ ?>
            <?php echo get_the_post_thumbnail($post->ID, array(170, 120)); ?>
        <?php } ?>
            <div class="news_post_date">
                <?php echo esc_html(get_the_date('d', $post->ID)); ?>
                <span> <?php echo esc_html(get_the_date('F Y', $post->ID)); ?></span>
            </div>
        </div>
        <div class="media-body">
            <div class="text">
                <?php
                 $cats = get_the_category($post->ID);
                 foreach( $cats as $cat ) {
                     ?>
                      <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="news_tag"><?php echo esc_html($cat->name); ?></a>
                     <?php 
                 }
                ?>
                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                    <h3><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h3>
                </a>
            </div>
            <div class="news_btn">
               
                <span><?php echo dt_estimation_reading_count(dt_get_post_content($post->ID)); ?></span>
                <a href="<?php echo esc_url( get_the_permalink( $post-ID) ); ?>" class="agency_learn_btn h_text_btn" data-text="<?php echo esc_attr__('Continue Reading', 'droit-wbpakery-addons'); ?>"><?php echo esc_html__('Continue
                    Reading', 'droit-wbpakery-addons'); ?>
                    <i class="ti-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
 <?php }} ?>
</div>
<?php endif; ?>
