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
 <section class="portfolio_area custom_pad">
    <div class="row protfolio_custom_row">
        <?php  $i = 1;  foreach($posts as $key=>$post){ ?>
        <div class="col-sm-6 protfolio_custom_col">
            <div class="portfolio_item">
                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                </a>
                <div class="portfolio_content text-center">
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                        <h3>
                        <?php echo esc_attr( get_the_title($post->ID) ); ?>
                        </h3>
                    </a>
                    <p><?php echo esc_attr( get_the_excerpt($post->ID) ); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <nav class="navigation pagination">
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
</section>