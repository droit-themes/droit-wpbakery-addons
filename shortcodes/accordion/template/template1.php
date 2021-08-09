<?php

$accordions = vc_param_group_parse_atts('accordions');

?>
    <section class="agency_about_area">
        <div class="container">
            <div class="row align-items-center">


                <div class="col-lg-5">
                    <div class="accordion agency_accordion" id="accordionExample">
                        <?php
                        foreach ( $accordions as $index => $item ) {
                            $tab_count = $index + 1;
                            $tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );
                            $tab_btn_setting_key = $this->get_repeater_setting_key( 'tab_btn', 'tabs', $index );
                            $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );
                            $show_default = isset($item['show_default']) ? $item['show_default'] : 'no';

                            $this->add_render_attribute( $tab_title_setting_key, [
                                'id' => 'heading' . $id_int . $tab_count,
                                'class' => [ 'card-header' ],
                            ] );

                            $this->add_render_attribute( $tab_btn_setting_key, [
                                'class' => [ 'btn btn-link', $tab_count == 1 ? '' : 'collapsed' ],
                                'type' => 'button',
                                'data-toggle' => 'collapse',
                                'data-target' => '#collapse-' . $id_int . $tab_count,
                                'aria-expanded' => $tab_count == 1 ? 'true' : 'false',
                                'aria-controls' => 'collapse-' . $id_int . $tab_count,
                            ] );

                            $activeClass = ($show_default == 'yes') ? ' show' : '' ;
                            $this->add_render_attribute( $tab_content_setting_key, [
                                'id' => 'collapse-' . $id_int . $tab_count,
                                'class' => [ 'collapse', $activeClass ],
                                'aria-labelledby' => 'heading' . $id_int . $tab_count,
                                'data-parent' => '#accordion' . $this->get_id(),
                            ] );

                            $this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );
                            ?>
                            <div class="card wow fadeInUp">
                                <div class="card-header" id="headingOne">
                                    <button <?php echo $this->get_render_attribute_string( $tab_btn_setting_key ); ?>>
                                        <span class="icon">
                                          <i class="ti-angle-down"></i>
                                        </span>
                                        Who we are
                                    </button>
                                </div>

                                <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>>
                                    <div class="card-body">
                                        Duis aute irure dolor in reprehenderit in esse voluptate
                                        velit cillum dolore eu fugiat nulla pariatur excepteur
                                        sint.
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="col-lg-7">
                    <div class="agency_about_img">
                        <img class="position-absolute top" src="assets/img/agency/about_round.png" alt="" />
                        <img class="wow fadeInRight" src="assets/img/agency/about_img.png" alt="" />
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php 
// generate css
wp_enqueue_style('dt_extend_style');