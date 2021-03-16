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

<div class="startup_news_area">
    <div class="startup_news_inner">
       <?php foreach($get_post as $post){ ?> 
        <div class="media s_news_item wow fadeInUp" data-wow-duration="1s">
        <?php if(has_post_thumbnail($post->ID)){ ?>
            <div class="startup_post_img">
             <?php echo get_the_post_thumbnail($post->ID, array(100, 100)); ?>
            </div>
        <?php } ?>    
            <div class="media-body">
                <div class="text">
                <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                    <h4><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h4>
                </a>

                <div class="date"><?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . ' ago'; ?></div>
                </div>
                <div class="description">
                <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 15, ''); ?></p>
                <a href="<?php echo esc_url( get_the_permalink( $post->ID) ); ?>" class="post_btn" >
                    <i class="icon-arrow-right-3"></i>
                </a>
                </div>
            </div>
        </div>
       <?php } ?>
      </div>
    </div>
    <?php endif; ?>