<?php 

add_filter( 'vc_group_responsive', function( $data, $group_title, $id){
 
    $data[] = array(
      'type' => 'textfield',
      'heading' => esc_html__($group_title, 'droit-wbpakery-addons' ),
      'param_name' => 'dt_tab_font_size'.$id,
      'edit_field_class' => 'vc_col-sm-6',
      'group' => esc_html__( 'Responsive Tab', 'droit-wbpakery-addons' ),
              'description' => esc_html__( 'Tab font size', 'droit-wbpakery-addons' ),
    );

    $data[] = array(
        'type' => 'textfield',
        'heading' => esc_html__($group_title, 'droit-wbpakery-addons' ),
        'param_name' => 'dt_tab_line_height'.$id,
        'edit_field_class' => 'vc_col-sm-6',
        'group' => esc_html__( 'Responsive Tab', 'droit-wbpakery-addons' ),
        'description' => esc_html__( 'Tab line height', 'droit-wbpakery-addons' ),
      );

      $data[] = array(
        'type' => 'textfield',
        'heading' => esc_html__( $group_title, 'droit-wbpakery-addons' ),
        'param_name' => 'asdfasdf'.$id,
        'edit_field_class' => 'vc_col-sm-6',
        'group' => esc_html__( 'Responsive Mobile', 'droit-wbpakery-addons' ),
                'description' => esc_html__( 'Mobile font size ', 'droit-wbpakery-addons' ),
      );
  
      $data[] = array(
          'type' => 'textfield',
          'heading' => esc_html__( $group_title, 'droit-wbpakery-addons' ),
          'param_name' => 'asdfasdf'.$id,
          'edit_field_class' => 'vc_col-sm-6',
          'group' => esc_html__( 'Responsive Mobile', 'droit-wbpakery-addons' ),
          'description' => esc_html__( 'Mobile line height', 'droit-wbpakery-addons' ),
        );

    return $data;
  }, 10, 3);
  

