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

$read_more = 'Learn More';


   
    if($dt_posts_read_more != '') {
        $read_more = $dt_posts_read_more;
    }


if('' != $get_post) : ?>

<div class="education_blog_area sec_pad_two">     

<div class="event_story">
<?php foreach($get_post as $post) { ?> 
    <div class="story_details">
       
        <?php if(has_post_thumbnail($post->ID)){ ?>
            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?> ">
            <?php echo get_the_post_thumbnail($post->ID, array(450, 450)); ?>
            </a>
        <?php } ?>      
            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                <h3><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h3>
            </a>
            <?php $category_detail = get_the_category( $post->ID);//$post->ID
        
                foreach($category_detail as $cat){
                    ?>
                    <div class="position"><?php   echo $cat->cat_name; ?></div>
                    <?php 
            
                } ?>
        
            <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 15, ''); ?></p>
            <a href="#" class="education_learn_btn"><?php echo esc_html($read_more); ?> <i class="icon-arrow-double"></i></a>
    </div>
    <?php } ?>

</div>     
</div>

<?php endif;