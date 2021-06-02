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

$produts = new WP_Query($args);


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


 if($produts->have_posts() ) {
?>
    <div class="form-row product-list-<?php echo esc_attr( get_the_ID() ); ?>">
     <?php while($produts->have_posts()) : $produts->the_post();  
      
      global $product;

     ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="shop_product_item">
                <div class="shop_product_img">
                    <a href="<?php echo esc_url( the_permalink(  )); ?>" class="img_hover">
                        <?php woocommerce_template_loop_product_thumbnail(); 
                        
                        dt_sale_percentage_loop();
                        ?>
                        
                    </a>
                    <div class="product_nav_action">
                       
                       <!-- <a href="?add-to-cart=3668" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="3668" data-product_sku="woo-belt" aria-label="Add “Belt” to your cart" rel="nofollow">Add to cart</a> -->
                        <?php 
                        
                        if( $product->has_child() ) {
                           ?>
                            <a class="product_nav_action_item dl_tooltip_top button product_type_variable add_to_cart_button" aria-label="Cart" href="<?php echo esc_url(the_permalink()); ?>" data-product_id="<?php echo esc_attr( get_the_ID() ) ?>" rel="nofollow">
                                 <i class="ti-shopping-cart"></i>
                            </a>
                           <?php   } else {
                            ?>
                             <a class="product_nav_action_item dl_tooltip_top button product_type_simple add_to_cart_button ajax_add_to_cart" aria-label="Cart" href="?add-to-cart=<?php echo esc_attr( get_the_ID() ) ?>" data-product_id="<?php echo esc_attr( get_the_ID() ) ?>">
                                 <i class="ti-shopping-cart"></i>
                             </a>
        
                            <?php 
                           } ?>
                      
                       
                        <!-- <a class="product_nav_action_item dl_tooltip_top" aria-label="Compare" href="#" target="_blank" rel="nofollow">
                            <i class="ti-loop"></i>
                        </a> -->
                        
                        <?php 
                        
                            if(shortcode_exists('yith_compare_button')) {

                            echo do_shortcode('[yith_compare_button]');
                            }
                            
                            if(shortcode_exists('yith_quick_view')) {

                            echo do_shortcode('[yith_quick_view product_id='.get_the_ID().' type="button" label="<i class="ti-eye"></i>"]');
                            }
                        ?>
        
                    </div>
                </div>
                <div class="content">

                     <?php $terms = get_terms( array( 'taxonomy' => 'product_cat' ) ); 
                     
                      foreach ($terms as $key=> $category) { ?>

                      <a href="<?php echo esc_url(get_term_link($category->term_id, 'product_cat')); ?>" class="pr_name"><?php echo esc_html($category->name) ?> </a> 
                      
                      <?php break; } 
                      
                      the_title('<h3> <a href="'.esc_url(get_the_permalink()).'">', ' </a><h3>'); ?>
                   
                    <div class="product-prices">
                      <?php woocommerce_template_loop_price(); ?>
                    </div>
                </div>
            </div>
        </div>
     <?php endwhile; 
      
       wp_reset_postdata(); 
    } else{
         echo esc_html__( 'Sorry, no posts matched your criteria',  'droit-wpbakery-addons');
    }
     ?>    
    </div>
</div>