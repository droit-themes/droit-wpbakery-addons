<?php
$teams = vc_param_group_parse_atts($droit_team_content);

if($teams != '') {
?>
             
<ul class="list-unstyled home_team_inner">
    <?php foreach($teams as $key => $team){ 
             
         $wow_attr = '';
         if($key) {
            $wow_attr = 'data-wow-delay=0.'.$key.'s';
         }
         $style_attr = '';

         if(!empty($team['dt_team_image_top_pos']) || !empty($team['dt_team_image_left_pos']) ){
            
            $left_pos = '';
             if(!empty($team['dt_team_image_top_pos'])){
                 $left_pos = 'top:'.$team['dt_team_image_top_pos'].';';
             }
            $top_pos = '';
             if(!empty($team['dt_team_image_left_pos'])){
                $top_pos = 'left:'.$team['dt_team_image_left_pos'];
             }
             $style_attr = 'style='.$left_pos.$top_pos;
            
         }
        ?>

    <li class="wow zoomIn" <?php echo esc_attr($wow_attr.' '.$style_attr); ?>>
            <?php echo dt_get_attachment_image($team['dt_ttm_img'], 'full'); ?>
    </li>
<?php } ?>
</ul>
<?php } ?>              