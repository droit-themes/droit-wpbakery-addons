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

if('' != $get_post) : ?>


<div class="education_blog_area sec_pad_two">
    <div class="row">
    <?php foreach($get_post as $post){ ?> 
        <div class="education_blog_info">
            <div class="media education_blog_item">
            <?php if(has_post_thumbnail($post->ID)){ 
                echo get_the_post_thumbnail($post->ID, array(200, 200));  
            } ?>       
                <div class="media-body">
                    <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                        <h4><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h4>
                    </a>
                    <div class="post_date"> <?php echo get_the_date( 'M  d  Y',  $post->ID); ?></div>
                    <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 11, ''); ?></p>
                </div>
            </div>
        </div>
        <?php } ?> 
    </div>
</div>

<?php endif; ?>