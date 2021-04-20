<?php

$args = array(
    'numberposts'      => (isset($dt_posts_per_page) && $dt_posts_per_page != '') ? $dt_posts_per_page : 4,
);

if(isset($dt_select_post_orderby) && $dt_select_post_orderby != '') {
    $args['orderby'] = $dt_select_post_orderby;
}
if(isset($dt_select_post_order) && $dt_select_post_order != '') {
    $args['order'] = $dt_select_post_order;
}

if(isset($dt_ignor_stcky) && $dt_ignor_stcky != 'yes') {

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

if(isset($dt_select_catagory) && $dt_select_catagory != '' && $dt_category_dispaly == 'yes') {
    $args['category'] =   $dt_select_catagory; 
}

$get_post =  get_posts( $args );

if('' != $get_post) :

?>
<div class="education_program_gallery_info">
<?php foreach($get_post as $post){ ?> 
    <div class="program_gallery_item">
    <?php if(has_post_thumbnail($post->ID)){ ?>
        <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?> ">
        <?php echo get_the_post_thumbnail($post->ID, array(445, 695)); ?>
            <div class="overlay_bg"></div>
        </a>
        <?php } ?>       
        <div class="content">
            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                <h5><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h5>
            </a>
            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="education_learn_btn"><?php echo esc_html($dt_posts_read_more); ?> <i class="icon-arrow-double"></i></a>
        </div>
    </div>
<?php } ?>    
</div>
<?php endif; ?>