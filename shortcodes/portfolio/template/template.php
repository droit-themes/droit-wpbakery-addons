<?php

$args = array(
    'numberposts'      => 3,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'portfolio',
);

$posts = get_posts($args);

?>
<div class="row align-items-center agency_team_inner">
   <?php $i = 1;  foreach($posts as $key=>$post){
         $terms = get_the_terms($post->ID, 'portfolio_cat');
         $data_wow_delay = '';
         if($key) {
            $data_wow_delay =   'data-wow-delay=0.'.$key.'s';
         }

        if($i == 1){
       ?>
    <div class="col-lg-7 col-md-7 col-sm-12 wow fadeInDown" <?php echo esc_attr($data_wow_delay); ?>>
        <div class="work_item" data-parallax='{"x": 0, "y": 40}'>
            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
               <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
            </a>
            <div class="content">
                <div class="categorie">
                    <?php 
                       foreach($terms as $term) {
                           echo '<span>'.$term->name.'</span>';
                       }
                     ?>
                </div>
                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                    <h5 class="agency_learn_btn" data-text="<?php echo esc_attr( get_the_title($post->ID) ); ?>"><?php echo esc_html( get_the_title($post->ID) ); ?></h5>
                </a>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-lg-4 offset-lg-1 col-md-5 col-sm-12 wow fadeInDown" <?php echo esc_attr($data_wow_delay); ?>>
        <div class="work_item work_item_top" data-parallax='{"x": 0, "y": -40}'>
            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
             <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
           </a>
            <div class="content">
            <div class="categorie">
                <?php 
                    foreach($terms as $term) {
                        echo '<span>'.$term->name.'&nbsp;</span>';
                    }
                ?>
            </div>
            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                <h5 class="agency_learn_btn" data-text="<?php echo esc_attr( get_the_title($post->ID) ); ?>"><?php echo esc_html( get_the_title($post->ID) ); ?></h5>
            </a>
            </div>
        </div>
    </div>
    <?php }  $i++;  }     wp_reset_postdata();  ?>
</div>
