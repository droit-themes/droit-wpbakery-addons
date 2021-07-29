<?php
$list_items = vc_param_group_parse_atts($droit_list_items);
?>

    <div class="about_me_details_item">
        <ul class="list-unstyled sevice_list">
            <?php
            if ( $list_items ) {
                foreach ( $list_items as $item ) {
                    ?>
                    <li><a href="#"><?php echo esc_html($item['list_item']) ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>

<?php

wp_enqueue_style('dt_extend_style');