<div class="shop_home_products_area">
<?php


if(isset($dt_select_product_orderby) && $dt_select_product_orderby != '') {
    $args['orderby'] = $dt_select_product_orderby;
}

if(isset($dt_select_product_order) && $dt_select_product_order != '') {
    $args['order'] = $dt_select_product_order;
}

if(isset($dt_products_per_page) && $dt_products_per_page != '') {
    $args['posts_per_page'] = $dt_products_per_page;
}else{
    $args['posts_per_page'] = 8;  
}

$args['post_type'] = 'product';


if(isset($dt_select_product_catagory) && $dt_select_product_catagory != '' && $dt_product_category_dispaly == 'yes') {
   //  $args['category'] =   $dt_select_product_catagory; 
    $args['tax_query'] =   [
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => $dt_select_product_catagory,
    ];

}

$produt = new WP_Query($args);
echo "<pre>";
print_r($produt);
echo "</pre>";

// if(isset($dt_ignor_stcky) && $dt_ignor_stcky != 'yes') {

//     $sticky_post = [];

//     $get_sticky_posts =  get_posts();

//     foreach($get_sticky_posts as $key => $post) {

//         if(is_sticky($post->ID)) {
//             array_push($sticky_post, $post->ID);
//         }

//     }

//     if(!empty($sticky_post)) {
//         $args['exclude'] =   $sticky_post; 
//     }
// }



?>
    <div class="form-row product-list-<?php echo esc_attr( get_the_ID() ); ?>">
    
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="shop_product_item">
                <div class="shop_product_img">
                    <a href="#" class="img_hover">
                        <img src="assets/img/home-shop/shop_pr_1.jpg" alt="">
                        <div class="offer_badge">-30%</div>
                    </a>
                    <div class="product_nav_action">
                        <a class="product_nav_action_item dl_tooltip_top" aria-label="Cart" href="#" target="_blank" rel="nofollow">
                            <i class="ti-shopping-cart"></i>
                        </a>
                        <a class="product_nav_action_item dl_tooltip_top" aria-label="Compare" href="#" target="_blank" rel="nofollow">
                            <i class="ti-loop"></i>
                        </a>
                        <a class="product_nav_action_item dl_tooltip_top" data-toggle="modal" data-target=".product_compair_modal" aria-label="Quickview" href="#" target="_blank" rel="nofollow">
                            <i class="ti-eye"></i>
                        </a>
                    </div>
                </div>
                <div class="content">
                    <a href="#" class="pr_name">Frama</a>
                    <a href="#">
                        <h3>Sintra Dinning Table</h3>
                    </a>
                    <div class="product-prices">
                        <del class="oldPrice">$80.00</del>
                        <span class="price">$23.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>