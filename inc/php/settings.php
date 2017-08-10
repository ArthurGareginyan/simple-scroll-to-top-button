<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab Content
 *
 * @since 4.6
 */
?>
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( SSTOPB_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the database
                        $options = get_option( SSTOPB_SETTINGS . '_settings' );

                        // Set default value if option is empty
                        $transparency = (!empty( $options['transparency_button'] ) AND $options['transparency_button'] == 'on') ? 'ssttbutton-transparent' : '' ;
                        $background_button = !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
                        $background_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#000000';
                        $image_button = !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-hand-o-up';
                        $display_button = !empty( $options['display-button'] ) ? $options['display-button'] : '';
                    ?>

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $text ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', $text ); ?></p>

                            <table class="form-table">

                                <?php ssttbutton_setting( 'enable_button',
                                                          __( 'Enable "Scroll to Top" button', $text ),
                                                          '',
                                                          'check'
                                                         );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Button background', $text ); ?></th>
                                    <td>
                                        <ul class='background-button'>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square" <?php checked( 'fa-square', $background_button ); ?> >
                                                <i class="fa fa-square fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square-o" <?php checked( 'fa-square-o', $background_button ); ?> >
                                                <i class="fa fa-square-o fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value="fa-circle" <?php checked( '', $background_button ); ?> <?php checked( 'fa-circle', $background_button ); ?> >
                                                <i class="fa fa-circle fa-2x"></i>
                                            </li>
                                            <li>
                                                <input type="radio" name="ssttbutton_settings[background_button]" value=" " <?php checked( ' ', $background_button ); ?> >
                                                <?php _e( 'Without background', $text ); ?>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Button background color', $text ); ?></th>
                                    <td>
                                        <input type="text" name="ssttbutton_settings[background-color]" id="ssttbutton_settings[background-color]" value="<?php echo $background_color; ?>" placeholder="#000000" class="color-picker background-color">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the background color of button. You can also add html HEX color code.', $text ); ?></td>
                                </tr>

                                <tr>
                                    <th scope='row'><?php _e( 'Button symbol', $text ); ?></th>
                                    <td>
                                        <ul class='image-button'>
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
                                    <th scope='row'><?php _e( 'Button symbol color', $text ); ?></th>
                                    <td>
                                        <input type="text" name="ssttbutton_settings[symbol-color]" id="ssttbutton_settings[symbol-color]" value="<?php if ( !empty( $options['symbol-color'] ) ) { echo $options['symbol-color']; } else { echo '#ffffff'; }  ?>" placeholder="#ffffff" class="color-picker symbol-color">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select the color of symbol inside button. You can also add html HEX color code.', $text ); ?></td>
                                </tr>

                                <?php ssttbutton_setting( 'transparency_button',
                                                          __( 'Button transparency', $text ),
                                                          '',
                                                          'check'
                                                        );
                                ?>

                                <?php ssttbutton_setting( 'size_button',
                                                          __( 'Button size', $text ),
                                                          __( 'You can set the size of button (in px). The default size is 32 pixels.', $text ),
                                                          'field',
                                                          '32',
                                                          '2'
                                                         );
                                ?>

                                <?php ssttbutton_setting( 'scroll_duration',
                                                          __( 'Scroll duration', $text ),
                                                          __( 'Duration is given in milliseconds. Higher values indicate slower animation (speed/smoothness), not faster ones. The default duration is 300 milliseconds.', $text ),
                                                          'field',
                                                          '300',
                                                          '5'
                                                         );
                                ?>

                                <tr>
                                    <th scope='row'><?php _e( 'Display button on', $text ); ?></th>
                                    <td>
                                        <ul>
                                            <li><input type="radio" name="ssttbutton_settings[display-button]" value="" <?php checked( '', $display_button ); ?> ><?php _e( 'Full Website', $text ); ?><li>
                                            <li><input type="radio" name="ssttbutton_settings[display-button]" value="Home Page Only" <?php checked( 'Home Page Only', $display_button ); ?> ><?php _e( 'Home Page Only', $text ); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'><?php _e( 'Select where button need to be appeared.', $text ); ?></td>
                                </tr>

                            </table>

                            <?php submit_button( __( 'Save changes', $text ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Live Preview', $text ); ?></h3>
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
                        <h3 class="title"><?php _e( 'Support', $text ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', $text ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default btn-labeled">
                                                        <span class="btn-label">
                                                            <img src="<?php echo SSTOPB_URL . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                                        </span>
                                                        <?php _e( 'Donate with PayPal', $text ); ?>
                                                </a>
                            <p><?php _e( 'Thanks for your support!', $text ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php
