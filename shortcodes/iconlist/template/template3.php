<?php
$list_items = vc_param_group_parse_atts($droit_list_items2);
?>

    <div class="about_me_details_item">
        <ul class="list-unstyled awards_list">
            <?php
            if ( !empty($list_items)) {
                foreach ( $list_items as $item ) {

                    //  link before after
                    $link = '';
                    if ( isset($item['link']) && $item['link'] != '' ) {
                        $link = $item['link'];
                    }
                    ?>
                    <li>
                        <?php
                         if ( !empty($item['date']) ) { ?>
                             <div class="date"><?php echo esc_html($item['date']) ?></div>
                             <?php
                         }
                         if ( !empty($item['title']) ) { ?>
                             <div class="award_title">
                                 <?php echo dt_extention_wp_kses($item['title']) ?>
                                 <?php echo dt_return(dt_link_before_after($item['link'], 'before')); ?>
                                     <?php echo esc_html($item['website_title']) ?>
                                 <?php echo dt_return(dt_link_before_after($item['link'], 'after')); ?>
                             </div>
                             <?php
                         }
                         ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
<?php

wp_enqueue_style('dt_extend_style');