<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab Content
 */
?>
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( $plugin['settings'] . '_settings_group' ); ?>

                    <?php
                        // Retrieve options from database
                        $options = get_option( $plugin['settings'] . '_settings' );

                        // Set default value if option is empty
                        $transparency = (!empty( $options['transparency_button'] ) AND $options['transparency_button'] == 'on') ? 'ssttbutton-transparent' : '' ;
                        $background_button = !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
                        $background_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#000';
                        $image_button = !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-hand-o-up';
                    ?>

                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $plugin['text'] ); ?></span>
                    </button>

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can configure this plugin.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p008_control_switch( 'enable_button',
                                                                     __( 'Enable "Scroll to Top" button', $plugin['text'] ),
                                                                     __( 'Enable or disable this plugin.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p008_control_choice( 'background_button',
                                                                     array(
                                                                            'fa-square'                 => '<i class="fa fa-square fa-2x"></i>',
                                                                            'fa-square-o'               => '<i class="fa fa-square-o fa-2x"></i>',
                                                                            'fa-circle'                 => '<i class="fa fa-circle fa-2x"></i>',
                                                                            ' '                         => __( 'Without background', $plugin['text'] )
                                                                          ),
                                                                     __( 'Button background', $plugin['text'] ),
                                                                     __( 'Select the background of the button by choosing one of the four variants above.', $plugin['text'] ),
                                                                     'fa-circle'
                                                                   );
                                    spacexchimp_p008_control_color( 'background-color',
                                                                    __( 'Button background color', $plugin['text'] ),
                                                                    __( 'Select the background color of button. You can also add html HEX color code.', $plugin['text'] ),
                                                                    '#fff'
                                                                  );
                                    spacexchimp_p008_control_choice( 'image_button',
                                                                     array(
                                                                            'fa-arrow-up'               => '<i class="fa fa-arrow-up fa-lg"></i>',
                                                                            'fa-level-up'               => '<i class="fa fa-level-up fa-2x"></i>',
                                                                            'fa-reply fa-rotate-90'     => '<i class="fa fa-reply fa-rotate-90 fa-2x"></i>',
                                                                            'fa-hand-o-up'              => '<i class="fa fa-hand-o-up fa-2x"></i>',
                                                                            'fa-caret-square-o-up'      => '<i class="fa fa-caret-square-o-up fa-2x"></i>',
                                                                            'fa-long-arrow-up'          => '<i class="fa fa-long-arrow-up fa-2x"></i>',
                                                                            'fa-chevron-up'             => '<i class="fa fa-chevron-up fa-2x"></i>',
                                                                            'fa-angle-up'               => '<i class="fa fa-angle-up fa-2x"></i>',
                                                                            'fa-caret-up'               => '<i class="fa fa-caret-up fa-2x"></i>',
                                                                            'fa-angle-double-up'        => '<i class="fa fa-angle-double-up fa-2x"></i>'
                                                                          ),
                                                                     __( 'Button symbol', $plugin['text'] ),
                                                                     __( 'Select the symbol of the button by choosing one of the ten variants above.', $plugin['text'] ),
                                                                     'fa-hand-o-up'
                                                                   );
                                    spacexchimp_p008_control_color( 'symbol-color',
                                                                    __( 'Button symbol color', $plugin['text'] ),
                                                                    __( 'Select the color of symbol inside button. You can also add html HEX color code.', $plugin['text'] ),
                                                                    '#fff'
                                                                  );
                                    spacexchimp_p008_control_switch( 'transparency_button',
                                                                     __( 'Transparency', $plugin['text'] ),
                                                                     __( 'Enable the transparency of the button.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p008_control_number( 'size_button',
                                                                     __( 'Button size', $plugin['text'] ),
                                                                     __( 'You can set the size of button (in pixels). The default size is 32 pixels.', $plugin['text'] ),
                                                                     '32'
                                                                   );
                                    spacexchimp_p008_control_number( 'scroll_duration',
                                                                     __( 'Scroll duration', $plugin['text'] ),
                                                                     __( 'Duration is given in milliseconds. Higher values indicate slower animation (speed/smoothness), not faster ones. The default duration is 300 milliseconds.', $plugin['text'] ),
                                                                     '300'
                                                                   );
                                    spacexchimp_p008_control_choice( 'display-button',
                                                                     array(
                                                                            ''               => __( 'Every frontend page', $plugin['text'] ),
                                                                            'Home Page Only' => __( 'Home Page Only', $plugin['text'] )
                                                                          ),
                                                                     __( 'Display button on', $plugin['text'] ),
                                                                     __( 'Select where button need to be appeared.', $plugin['text'] ),
                                                                     ''
                                                                   );
                                ?>
                            </table>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $plugin['text'] ); ?>">

                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Live Preview', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <a id="ssttbutton" href="#top" class="<?php echo $transparency; ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="ssttbutton-background fa <?php echo $background_button; ?> fa-stack-2x"></i>
                                    <i class="ssttbutton-symbol fa <?php echo $image_button; ?> fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Every little contribution helps to cover our costs and allows us to spend more time creating things for awesome people like you to enjoy.', $plugin['text'] ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                <span class="btn-label">
                                    <img src="<?php echo $plugin['url'] . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                </span>
                                <?php _e( 'Donate with PayPal', $plugin['text'] ); ?>
                            </a>
                            <p><?php _e( 'Thanks for your support!', $plugin['text'] ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php
