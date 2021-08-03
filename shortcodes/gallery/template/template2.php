<?php 
$gallery_items = vc_param_group_parse_atts($droit_gallery_content2);
?>

<section class="about_banner_area_three">
    <div class="container">
        <ul class="list-unstyled home_team_inner">
            <?php
             if ( !empty($gallery_items) ) {
                 foreach ( $gallery_items as $item ) {
                     ?>
                     <li>
                         <a href="#">
                             <?php echo dt_get_attachment_image($item['gallery_img'], 'full'); ?>
                         </a>
                     </li>
                     <?php
                 }
             }
             ?>
        </ul>
    </div>
</section>
