<?php
$teams        = vc_param_group_parse_atts($droit_team_content);
$dt_team_style = vc_param_group_parse_atts($dt_team_style);
//$dt_team_title = vc_param_group_parse_atts($dt_team_title);

if($teams != '') {
?>
<?php if($dt_team_style =='1'){ ?> 

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
<?php }elseif($dt_team_style =='2'){ ?>
    <section class="about_team_area">
        <div class="pattern_bg parallaxie"></div>
        <div class="container">
            <?php if(!empty($dt_team_title)): ?>
            <div class="section_title">
                <h2><?php echo dt_extention_wp_kses($dt_team_title); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <?php foreach($teams as $key => $team){  ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="team_item">
                            <a href="#" class="team_img">
                                <?php echo dt_get_attachment_image($team['dt_ttm_img'], 'full'); ?>
                            </a>
                            <div class="content">
                                <a href="#">
                                    <h4><?php echo dt_extention_wp_kses($team['dt_ttm_name']); ?></h4>
                                </a>
                                <div class="position"><?php echo dt_extention_wp_kses($team['dt_ttm_designation']); ?></div>
                                <p><?php echo dt_extention_wp_kses($team['dt_ttm_comments']); ?></p>
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            
            </div>
        </div>
    </section>

<?php }elseif($dt_team_style =='3'){ ?>

    <section class="leader_team_area">
        <div class="container">
            <?php if(!empty($dt_team_title)): ?>
            <div class="section_title">
                <h2><?php echo dt_extention_wp_kses($dt_team_title); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
            <?php foreach($teams as $key => $team){  ?>
                <div class="col-lg-4 col-6">
                    <div class="leader_team_item">
                        <a href="#">
                        <?php echo dt_get_attachment_image($team['dt_ttm_img'], 'full'); ?>
                        </a>
                        <div class="content">
                            <a href="#">
                                <h4><?php echo dt_extention_wp_kses($team['dt_ttm_name']); ?></h4>
                            </a>
                            <div class="position"><?php echo dt_extention_wp_kses($team['dt_ttm_designation']); ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }elseif($dt_team_style =='4'){ ?>

    <section class="skill_team_area">
        <div class="container">
            <?php if(!empty($dt_team_title)): ?>
            <div class="section_title">
                <h2><?php echo dt_extention_wp_kses($dt_team_title); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row">
                <?php foreach($teams as $key => $team){  ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="leader_team_item">
                        <a href="#">
                            <?php echo dt_get_attachment_image($team['dt_ttm_img'], 'full'); ?>
                        </a>
                        <div class="content">
                            <a href="#">
                                <h4><?php echo dt_extention_wp_kses($team['dt_ttm_name']); ?></h4>
                            </a>
                            <div class="position"><?php echo dt_extention_wp_kses($team['dt_ttm_designation']); ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>


<?php } ?>

<?php } ?>              