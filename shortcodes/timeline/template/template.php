<?php
  $timeline_item = vc_param_group_parse_atts($droit_timeline_content);
 
?>


<div class="row work_steps_info">
    <?php if(!empty( $timeline_item )) { 
         foreach($timeline_item as $key  =>  $item) {

            $url_attrs = vc_build_link($item['dt_timeline_link']);


            $link_beofre = '';
            $link_after = '';
            $link_attr = '';
            
            if(!empty($url_attrs)){
                foreach ($url_attrs as $attr_key => $attr){
                   
                    if($attr_key != 'title'){
                        if($attr_key == 'url'){
                            $attr_key = 'href';
                        }
                        $link_attr .= $attr_key.'='.$attr.' ';
            
                    }
                }
                $link_beofre = '<a '.esc_attr( $link_attr ).'>';  
                $link_after = '</a>';
             }

        ?>
    <div class="col-lg-4 col-md-6 work_steps_item">
        <div class="number wow zoomIn animated"><?php echo esc_html($key + 1); ?></div>
        <?php echo dt_return($link_beofre); ?>
            <h4 class="wow fadeInUp animated" data-wow-delay="0.2s"><?php echo esc_html($item['dt_timeline_title']); ?></h4>
        <?php echo dt_return($link_after); ?>
        <p class="wow fadeInUp animated" data-wow-delay="0.3s"><?php echo esc_html($item['dt_timeline_description']); ?></p>
    </div>
    <?php } } else{
        echo esc_html__('Please add data', 'droit-wbpakery-addons');
    } ?>
</div>