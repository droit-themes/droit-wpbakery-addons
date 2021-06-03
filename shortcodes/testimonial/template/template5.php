<?php

$group_data = vc_param_group_parse_atts($droit_testimonial_content);

?>

<div class="shop_testimonial_area">
    <div class="shop_testimonial_slider_info">
        <div class="shop_testimonial_slider">
           <?php foreach($group_data as $data) { 
            //    echo "<pre>";
            //    print_r($data);
            //    echo "</pre>";
               ?> 
            <div class="item">
                <div class="author_img">
                    <?php echo wp_get_attachment_image( $data['dt_ttm_img'], [48, 48]); ?>
                </div>
                <?php if(isset($data['dt_ttm_author_name'])){ ?>
                     <div class="name"><?php echo dt_extention_wp_kses( $data['dt_ttm_author_name'] ); ?></div>
                <?php } ?>

                <?php if(isset($data['dt_ttm_auther_comment'])){ ?>
                    <h2><?php echo dt_extention_wp_kses( $data['dt_ttm_auther_comment'] ); ?></h2>
                <?php } ?>
               
                <div class="rattings">
                    <?php 
                    $total_star = 5;
                    $positve_star = $data['dt_testimonial_client_wraiign'];
                    $nagative_star = $total_star - $positve_star;

                    for($i = 1; $i <=$positve_star; $i++ ){
                    ?>
                    <i class="fas fa-star"></i>
                   <?php } 
                    if($nagative_star > 0 ) {
                        for($j = 1; $j <= $nagative_star; $j++ ){
                            ?>
                              <i class="far fa-star"></i>
                            <?php 
                        }
                    }
                   ?>
                </div>
            </div>
           <?php } ?> 
        </div>
        <div class="slider_arrow_two">
            <div class="prev"><i class="icon-arrow-left"></i></div>
            <div class="next"><i class="icon-arrow-right-3"></i></div>
        </div>
    </div>
</div>