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
    <div class="row blog_grid_row">
        <?php foreach($get_post as $post) { ?> 
            <div class="col-sm-6 blog_grid_col">
                <div class="blog_grid_item">
                    <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php echo get_the_post_thumbnail($post->ID, array(350, 350)); ?></a>
                    <div class="blog_content">
                        <?php 
                        $post_tags = get_the_tags( $post->ID );
                        if ( $post_tags ) { ?>
                            <a href="#" class="blog_tag"><?php echo $post_tags[0]->name;  ?></a>
                        <?php } ?>
                        
                            <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
                            <h4><?php echo esc_html( get_the_title(  $post->ID ) ); ?></h4>
                        </a>
                        <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 15, ''); ?></p>
                        <a href="#" class="post_date"><?php echo get_the_date( 'd  M  Y',  $post->ID); ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
   </div>

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
<?php endif;