<?php 
//  Button Controls 
if(!function_exists('vc_typography_selections')) {

	function vc_typography_selections ( $group_title = 'Font Size', $id = null  ) {
		return [
			array(
				'type' => 'textfield',
				'heading' => esc_html__( $group_title, 'droit-wbpakery-addons' ),
				'param_name' => 'dt_font_size_'.$id,
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Line Height', 'droit-wbpakery-addons' ),
				'param_name' => 'dt_line_height_'.$id,
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => "Font Weight",
				'param_name' => 'dt_font_weight_'.$id,
				'value' => array( "100", "200", "300", "400", "500", "600", "700", "800", "900" ),
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
				'edit_field_class' => 'vc_col-sm-3',
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__( 'Color', 'droit-wbpakery-addons' ),
				'param_name' => 'dt_font_color_'.$id,
				'description' => esc_html__( 'Font Color.', 'droit-wbpakery-addons' ),
				'edit_field_class' => 'vc_col-sm-3',
				'group' => esc_html__( 'Typography', 'droit-wbpakery-addons' ),
			),

		];
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