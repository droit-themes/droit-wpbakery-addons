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

$read_more = 'Learn More';

if($dt_posts_read_more != '') {
        $read_more = $dt_posts_read_more;
    }


if('' != $get_post) : ?>

<section class="blog_list_area_two">
    
<div class="container">
        <?php foreach($get_post as $post) { ?> 
            <div class="blog_item text-center">
            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                <?php echo get_the_post_thumbnail($post->ID, array(970, 500)); ?>
            </a>
                <div class="blog_content">
                    <ul class="list-unstyled post_tag_info">
                        <?php 
                        $post_tags = get_the_tags( $post->ID );
                        if ( $post_tags ) { ?>
                        <li><a href="#"><?php echo $post_tags[0]->name;  ?></a></li>
                        <?php } ?>
                        <li><a href="#"><?php echo get_the_date( 'd  M  Y',  $post->ID); ?></a></li>
                    </ul>
                    <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                        <h4><?php echo esc_html( get_the_title(  $post->ID ) ); ?> </h4>
                    </a>
                    <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 20, ''); ?></p>
                </div>
            </div>
        <?php } ?>
        <nav class="navigation pagination portfolio_pagination">
            <div class="nav-links">
                <a class="prev" href="#">Previous Page</a>
                <span aria-current="page" class="page-numbers current">1</span>
                <a class="page-numbers" href="#">2</a>
                <span class="page-numbers dot">....</span>
                <a class="page-numbers" href="#">5</a>
                <a class="page-numbers" href="#">6</a>
                <a class="next" href="#">Next Page</a>
            </div>
        </nav>
    </div>
</section>
<?php endif;