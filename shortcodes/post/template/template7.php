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

// get sticky post id 


if('' != $get_post) {
?>
<div class="post-style-7">
<?php foreach($get_post as $key => $post){ ?>
    <div class="arch_blog_item wow fadeInUp">
        <div class="arch_post_date">
            <h3><?php echo get_the_date('d', $post->ID); ?><span><?php echo get_the_date('F Y', $post->ID); ?></span></h3>
        </div>
        <div class="post_content">
            <a href="<?php echo esc_url( get_the_permalink( $post->ID) ); ?>">
                <h3><?php echo get_the_title($post->ID); ?></h3>
            </a>
        </div>
        <div class="arch_blog_btn">
            <a href="<?php echo esc_url( get_the_permalink( $post->ID) ); ?>" class="agency_learn_btn arch_learn_btn" data-text="Read More">
               <?php echo esc_html__( ' Read More', 'droit-vc-extention' ); ?>
                <i class="icon-arrow-right-2"></i>
            </a>
        </div>
    </div>
 <?php } ?>    
</div>
<?php 
}else{
    echo esc_html__( 'No post found', 'droit-vc-extention' );
}
