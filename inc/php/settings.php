<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab
 *
 * @since 4.1
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', SSTOPB_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin allows you to easily add the "Scroll to Top" button to your website in a simple and elegant way.', SSTOPB_TEXT ); ?></p>
                </div>
            </div>

            <div id="support" class="postbox">
                <h3 class="title"><?php _e( 'Support', SSTOPB_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', SSTOPB_TEXT ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', SSTOPB_TEXT ); ?></a>
                    <p><?php _e( 'Thanks for your support!', SSTOPB_TEXT ); ?></p>
                </div>
            </div>

            <div id="help" class="postbox">
                <h3 class="title"><?php _e( 'Help', SSTOPB_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Got something to say? Need help?', SSTOPB_TEXT ); ?></p>
                    <p><a href="mailto:arthurgareginyan@gmail.com?subject=<?php echo SSTOPB_NAME; ?>">arthurgareginyan@gmail.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( SSTOPB_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the BD
                        $options = get_option( SSTOPB_SETTINGS . '_settings' );

                        // Set default value if the option is empty
                        $background_button = isset( $options['background_button'] ) && !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
                        $background_color = isset( $options['background-color'] ) && !empty( $options['background-color'] ) ? $options['background-color'] : '#000000';
                        $image_button = isset( $options['image_button'] ) && !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-hand-o-up';
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', SSTOPB_TEXT ); ?></p>

                            <table class="form-table">

                                <?php ssttbutton_setting( 'enable_button',
                                                          __( 'Enable "Scroll to Top" button', SSTOPB_TEXT ),
                                                          '',
                                                          'check'
                                                         );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Button background', SSTOPB_TEXT ); ?></th>
                                    <td>
                                        <ul>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square" <?php checked('fa-square', $background_button); ?> >
                                                <i class="fa fa-square fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square-o" <?php checked('fa-square-o', $background_button); ?> >
                                                <i class="fa fa-square-o fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-circle" <?php checked('', $background_button); ?> <?php checked('fa-circle', $background_button); ?> >
                                                <i class="fa fa-circle fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value=" " <?php checked(' ', $background_button); ?> >
                                                <?php _e( 'Without background', SSTOPB_TEXT ); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Button background color', SSTOPB_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="ssttbutton_settings[background-color]" id="ssttbutton_settings[background-color]" value="<?php echo $background_color; ?>" placeholder="#000000" class="color-picker">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the background color of button. You can also add html HEX color code.', SSTOPB_TEXT ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Button symbol', SSTOPB_TEXT ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-arrow-up" <?php checked('fa-arrow-up', $image_button); ?> ><i class="fa fa-arrow-up fa-lg"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-level-up" <?php checked('fa-level-up', $image_button); ?> ><i class="fa fa-level-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-reply fa-rotate-90" <?php checked('fa-reply fa-rotate-90', $image_button); ?> ><i class="fa fa-reply fa-rotate-90 fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-hand-o-up" <?php checked('', $image_button); ?> <?php checked('fa-hand-o-up', $image_button); ?> ><i class="fa fa-hand-o-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-caret-square-o-up" <?php checked('fa-caret-square-o-up', $image_button); ?> ><i class="fa fa-caret-square-o-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-long-arrow-up" <?php checked('fa-long-arrow-up', $image_button); ?> ><i class="fa fa-long-arrow-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-chevron-up" <?php checked('fa-chevron-up', $image_button); ?> ><i class="fa fa-chevron-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-angle-up" <?php checked('fa-angle-up', $image_button); ?> ><i class="fa fa-angle-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-caret-up" <?php checked('fa-caret-up', $image_button); ?> ><i class="fa fa-caret-up fa-2x"></i></li>
                                            <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-angle-double-up" <?php checked('fa-angle-double-up', $image_button); ?> ><i class="fa fa-angle-double-up fa-2x"></i></li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Button symbol color', SSTOPB_TEXT ); ?></th>
                                    <td>
                                        <input type="text" name="ssttbutton_settings[symbol-color]" id="ssttbutton_settings[symbol-color]" value="<?php if ( !empty( $options['symbol-color'] ) ) { echo $options['symbol-color']; } else { echo '#ffffff'; }  ?>" placeholder="#ffffff" class="color-picker">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the color of symbol inside button. You can also add html HEX color code.', SSTOPB_TEXT ); ?></td>
                                </tr>

                                <?php ssttbutton_setting( 'transparency_button',
                                                          __( 'Button transparency', SSTOPB_TEXT ),
                                                          '',
                                                          'check'
                                                        );
                                ?>

                                <?php ssttbutton_setting( 'size_button',
                                                          __( 'Button size', SSTOPB_TEXT ),
                                                          __( 'You can set the size of button (in px). The default size is 32 pixels.', SSTOPB_TEXT ),
                                                          'field',
                                                          '32',
                                                          '2'
                                                         );
                                ?>

                                <?php ssttbutton_setting( 'scroll_duration',
                                                          __( 'Scroll duration', SSTOPB_TEXT ),
                                                          __( 'Duration is given in milliseconds. Higher values indicate slower animation (speed/smoothness), not faster ones. The default duration is 300 milliseconds.', SSTOPB_TEXT ),
                                                          'field',
                                                          '300',
                                                          '5'
                                                         );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Display button on', SSTOPB_TEXT ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="ssttbutton_settings[display-button]" value="" <?php checked('', $options['display-button']); ?> ><?php _e( 'Full Website', SSTOPB_TEXT ); ?><li>
                                            <li><input type="radio" name="ssttbutton_settings[display-button]" value="Home Page Only" <?php checked('Home Page Only', $options['display-button']); ?> ><?php _e( 'Home Page Only', SSTOPB_TEXT ); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select where button need to be appeared.', SSTOPB_TEXT ); ?></td>
                                </tr>

                            </table>

                            <?php submit_button( __( 'Save Changes', SSTOPB_TEXT ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="Preview">
                        <h3 class="title"><?php _e( 'Preview', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save Changes" button to update this preview.', SSTOPB_TEXT ); ?></p><br>
                            <div id="preview-icon">
                                <a id="ssttbutton" href="#top">
                                    <span class="fa-stack fa-lg">
                                        <i class="ssttbutton-background fa <?php echo $background_button; ?> fa-stack-2x"></i>
                                        <i class="ssttbutton-symbol fa <?php echo $image_button; ?> fa-stack-1x"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php ssttbutton_css_options(); ?>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', SSTOPB_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', SSTOPB_TEXT ); ?></a>
                            <p><?php _e( 'Thanks for your support!', SSTOPB_TEXT ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
