<?php 
//  Button Controls 
if(!function_exists('vc_typography_selections')) {

	function vc_typography_selections ( $group_title = 'Font Size', $id = null  ) {
		return apply_filters( 'vc_group_responsive', [
      
			array(
				'type' => 'textfield',
				'heading' => esc_html__( $group_title, 'droit-wbpakery-addons' ),
				'param_name' => 'dt_font_size_'.$id,
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
                'description' => esc_html__( 'Font Size', 'droit-wbpakery-addons' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Line Height', 'droit-wbpakery-addons' ),
				'param_name' => 'dt_line_height_'.$id,
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
                'description' => esc_html__( 'Line Height', 'droit-wbpakery-addons' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => "Font Weight",
				'param_name' => 'dt_font_weight_'.$id,
				'value' => array( "100", "200", "300", "400", "500", "600", "700", "800", "900" ),
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
				'edit_field_class' => 'vc_col-sm-3',
                'description' => esc_html__( 'Font Weight', 'droit-wbpakery-addons' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Color', 'droit-wbpakery-addons' ),
				'param_name' => 'dt_font_color_'.$id,
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
                'description' => esc_html__( 'Font color', 'droit-wbpakery-addons' ),
			),

		], $group_title, $id
    );
	}

}

if(!function_exists('dt_button_control')) {
    
    function dt_button_control( $id = 'button') {
       
         return [
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Button Text", 'droit-wbpakery-addons'),
                "param_name" => "dt_button_".$id,
                "description" => __("Enter your Button Text Here.", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_button_link_'.$id,
                'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
            ),
            array(
                "type" => "checkbox",
                "heading" => __( "Add Icon?", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_icon_used_".$id,
                "value" => array(esc_html__('Yes', 'droit-wbpakery-addons') => 'yes'),
                "std"   => '',
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
              ),   
            array(
                "type" => "iconpicker",
                "holder" => "div",
                "class" => "",
                "heading" => __("Button icon", 'droit-wbpakery-addons'),
                "param_name" => "dt_button_icon_".$id,
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                 'dependency' => array(
                  'element' => 'dt_button_icon_used_'.$id,
                  'not_empty' => TRUE
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __( 'Icon Position',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_hero_btn_icon_'.$id,
                'default' => 'left',
                'value' => array(
                  esc_html__( 'Left',  "droit-wbpakery-addons"  ) => 'left',
                  esc_html__( 'Right',  "droit-wbpakery-addons"  ) => 'rgiht',
                ),
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                'dependency' => array(
                    'element' => 'dt_button_icon_used_'.$id,
                    'not_empty' => TRUE
                  ),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Icon left Margin', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_left_margin_'.$id,
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'dt_button_icon_used_'.$id,
                    'not_empty' => TRUE
                  ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Icon Right Margin', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_right_margin_'.$id,
                'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'dt_button_icon_used_'.$id,
                    'not_empty' => TRUE
                  ),
            ),
            
            //  Button Typography 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Font Size', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_font_size_'.$id,
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Line Height', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_font_line_height_'.$id,
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Font Weight', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_font_weight_'.$id,
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Border', 'droit-wbpakery-addons' ),
                'param_name' => 'dt_btn_border_width_'.$id,
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Border color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_border_color_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'dependency' => array(
                    'element' => 'dt_btn_border_width_'.$id,
                    'not_empty' => TRUE
                  ),
                  'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Border hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_border_color_hover_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                'dependency' => array(
                    'element' => 'dt_btn_border_width_'.$id,
                    'not_empty' => TRUE
                  ),
                  'edit_field_class' => 'vc_col-sm-4',
            ),
           
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Text color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_color_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                 'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Text hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_hover_color_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
               
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Backgroud Color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_bg_color_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                 'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Background hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_button_bg_hover_color_".$id,
                "value" => '', //Default Red color
                'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
               
                'edit_field_class' => 'vc_col-sm-4',
            ),

         ];

    }
}

if(!function_exists('vc_iconfont_selections')) {

	function vc_iconfont_selections ( $id = null  ) {
		return [
            array(
                'type' => 'dropdown',
                'heading' => __( 'Select icon type',  "droit-wbpakery-addons" ),
                'param_name' => 'icon_type',
                'default' => 'droit_icon',
                'value' => array(
                    esc_html__( 'Select Icon Type',  "droit-wbpakery-addons"  ) => '',
                    esc_html__( 'Droit',  "droit-wbpakery-addons"  ) => 'droit_icon',
                    esc_html__( 'Font Awesome 5', 'js_composer' ) => 'fontawesome',
                    esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                    esc_html__( 'Typicons', 'js_composer' ) => 'typicons',
                    esc_html__( 'Entypo', 'js_composer' ) => 'entypo',
                    esc_html__( 'Linecons', 'js_composer' ) => 'linecons',
                    esc_html__( 'Mono Social', 'js_composer' ) => 'monosocial',
                    esc_html__( 'Image', 'js_composer' ) => 'image',
                ),
              ),
            array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_droit_icon',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'droit_icon',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'droit_icon',
                ),
              ),
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_fontawesome',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'fontawesome',
                ),
              ),
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_openiconic',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'openiconic',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'openiconic',
                ),
              ),  
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_typicons',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'typicons',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'typicons',
                ),
              ),  
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_entypo',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'entypo',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'entypo',
                ),
              ),  
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_linecons',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'linecons',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'linecons',
                ),
              ),  
              array(
                "type" => "iconpicker",
                'param_name' => 'icon_picker_monosocial',
                "holder" => "div",
                "heading" => __("Icon ", 'droit-wbpakery-addons'),
                "settings" => array(
                    'emptyIcon' => false,
                    'type' => 'monosocial',
                    'iconsPerPage' => 200,
                ),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'monosocial',
                ),
              ),
              array(
                "type" => "attach_image",
                'param_name' => 'icon_picker_image',
                "holder" => "div",
                "heading" => __("Image ", 'droit-wbpakery-addons'),
                'dependency' => array(
                  'element' => 'icon_type',
                  'value' => 'image',
                ),
              ),
		];
	}

}

if(!function_exists('dt_animation')) {
    
  function dt_animation( $id = 'animation') {
     
       return [
        array(
          'type' => 'dropdown',
          'heading' => __( 'Animation type',  "droit-wbpakery-addons" ),
          'param_name' => 'dt_image_frame_animation_name',
          'default' => '',
          'value' => array(
              esc_html__( 'Select animation type',  "droit-wbpakery-addons"  ) => '',
              esc_html__( 'fadeInRight',  "droit-wbpakery-addons"  ) => 'fadeInRight',
              esc_html__( 'fadeInleft',  "droit-wbpakery-addons"  ) => 'fadeInleft',
              esc_html__( 'fadeInUp',  "droit-wbpakery-addons"  ) => 'fadeInUp',
          ),
          'group' => esc_html__('Animation', 'droit-wbpakery-addons')
        ), 
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__("Animation delay", 'droit-wbpakery-addons'),
          "param_name" => "dt_image_frame_animation_delay",
          'description'      =>     esc_html__("Eg: .1s", 'droit-wbpakery-addons'),            
          'dependency' => array(
            'element' => 'dt_image_frame_animation_name',
            'not_empty' => TRUE
          ),
          'edit_field_class' => 'vc_col-sm-6',
          'group' => esc_html__('Animation', 'droit-wbpakery-addons')
        ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Animation duration", 'droit-wbpakery-addons'),
        "param_name" => "dt_image_frame_animation_duration",
        'description'      =>     esc_html__("Eg: .1s", 'droit-wbpakery-addons'),            
        'dependency' => array(
          'element' => 'dt_image_frame_animation_name',
          'not_empty' => TRUE
        ),
        'edit_field_class' => 'vc_col-sm-6',     
        'group' => esc_html__('Animation', 'droit-wbpakery-addons')               
      ),
       ];

  }
}

//  load responsive control 

require_once DROIT_WPBAKERY_ADDONS_ABS_PATH."/lib/responsive.php";
