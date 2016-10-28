<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 3.0
 */
function ssttbutton_render_submenu_page() {

	// Declare variables
    $options = get_option( 'ssttbutton_settings' );

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'Simple Scroll to Top Button', SSTOPB_TEXT ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur Gareginyan</a>', SSTOPB_TEXT ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'This plugin allows you to easily add the "Scroll to Top" button to your website in a simple and elegant way.', SSTOPB_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="using" class="postbox">
                        <h3 class="title"><?php _e( 'Using', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'To use, select the desired settings, then click "Save Changes". It\'s that simple!', SSTOPB_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Got something to say? Need help?', SSTOPB_TEXT ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com?subject=Simple Scroll to Top Button">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', SSTOPB_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="<?php echo plugins_url('../img/btn_donateCC_LG.gif', __FILE__); ?>" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', SSTOPB_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="advertisement" class="postbox">
                        <h3 class="title"><?php _e( 'Advertisement', SSTOPB_TEXT ); ?></h3>
                        <div class="inside">
                            <a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=36439_5_1_21" target="_blank" rel="nofollow"><img style="border:0px" src="http://www.elegantthemes.com/affiliates/media/banners/divi_250x250.jpg" width="250" height="250" alt="Divi WordPress Theme"></a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END-SIDEBAR -->

            <!-- FORM -->
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">

                        <form name="ssttbutton-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'ssttbutton_settings_group' ); ?>

                            <div class="postbox" id="Settings">
                                <h3 class="title"><?php _e( 'Settings', SSTOPB_TEXT ); ?></h3>
                                <div class="inside">
                                    <p class="description"></p>
                                    <table class="form-table">

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Enable "Scroll to Top" button', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <input type="checkbox" name="ssttbutton_settings[enable_button]" id="ssttbutton_settings[enable_button]" value="ON" <?php if ( !empty($options['enable_button']) ) { checked( $options['enable_button'], "ON" ); } ?> >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button background', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square" <?php checked('fa-square', $options['background_button']); ?> >
                                                        <i class="fa fa-square fa-2x"></i>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="ssttbutton_settings[background_button]" value="fa-square-o" <?php checked('fa-square-o', $options['background_button']); ?> <?php checked('fa-square-o', $options['background_button']); ?> >
                                                        <i class="fa fa-square-o fa-2x"></i>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="ssttbutton_settings[background_button]" value="fa-circle" <?php checked('', $options['background_button']); ?> <?php checked('fa-circle', $options['background_button']); ?> >
                                                        <i class="fa fa-circle fa-2x"></i>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="ssttbutton_settings[background_button]" value=" " <?php checked(' ', $options['background_button']); ?> >
                                                        <?php _e( 'Without background', SSTOPB_TEXT ); ?>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button background color', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="ssttbutton_settings[background-color]" id="ssttbutton_settings[background-color]" value="<?php if ( !empty( $options['background-color'] ) ) { echo $options['background-color']; } else { echo '#000000'; }  ?>" placeholder="#000000" class="color-picker">
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select the background color of button. You can also add html HEX color code.', SSTOPB_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button symbol', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <ul>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-arrow-up" <?php checked('fa-arrow-up', $options['image_button']); ?> ><i class="fa fa-arrow-up fa-lg"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-level-up" <?php checked('fa-level-up', $options['image_button']); ?> ><i class="fa fa-level-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-reply fa-rotate-90" <?php checked('fa-reply fa-rotate-90', $options['image_button']); ?> ><i class="fa fa-reply fa-rotate-90 fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-hand-o-up" <?php checked('', $options['image_button']); ?> <?php checked('fa-hand-o-up', $options['image_button']); ?> ><i class="fa fa-hand-o-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-caret-square-o-up" <?php checked('fa-caret-square-o-up', $options['image_button']); ?> ><i class="fa fa-caret-square-o-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-long-arrow-up" <?php checked('fa-long-arrow-up', $options['image_button']); ?> ><i class="fa fa-long-arrow-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-chevron-up" <?php checked('fa-chevron-up', $options['image_button']); ?> ><i class="fa fa-chevron-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-angle-up" <?php checked('fa-angle-up', $options['image_button']); ?> ><i class="fa fa-angle-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-caret-up" <?php checked('fa-caret-up', $options['image_button']); ?> ><i class="fa fa-caret-up fa-2x"></i></li>
                                                    <li><input type="radio" name="ssttbutton_settings[image_button]" value="fa-angle-double-up" <?php checked('fa-angle-double-up', $options['image_button']); ?> ><i class="fa fa-angle-double-up fa-2x"></i></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button symbol color', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="ssttbutton_settings[symbol-color]" id="ssttbutton_settings[symbol-color]" value="<?php if ( !empty( $options['symbol-color'] ) ) { echo $options['symbol-color']; } else { echo '#ffffff'; }  ?>" placeholder="#ffffff" class="color-picker">
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'Select the color of symbol inside button. You can also add html HEX color code.', SSTOPB_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button transparency', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <input type="checkbox" name="ssttbutton_settings[transparency_button]" id="ssttbutton_settings[transparency_button]" value="on" <?php if ( !empty($options['transparency_button']) ) { checked( $options['transparency_button'], "on" ); } ?> >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Button size', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <input type="text" name="ssttbutton_settings[size_button]" id="ssttbutton_settings[size_button]" value="<?php echo $options['size_button']; ?>" placeholder="32" size="2" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'><?php _e( 'You can set the size of button (in px).', SSTOPB_TEXT ); ?></td>
                                        </tr>

                                        <tr valign='top'>
                                            <th scope='row'><?php _e( 'Display button on', SSTOPB_TEXT ); ?></th>
                                            <td>
                                                <ul>
                                                    <li><input type="radio" name="ssttbutton_settings[display-button]" value="" <?php checked('', $options['display-button']); ?> ><?php _e( 'Full Website', SSTOPB_TEXT ); ?><li>
                                                    <li><input type="radio" name="ssttbutton_settings[display-button]" value="Home Page Only" <?php checked('Home Page Only', $options['display-button']); ?> ><?php _e( 'Home Page Only', SSTOPB_TEXT ); ?></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
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
                                    <p class="description"><?php _e( 'Click "Save Changes" to update this preview.', SSTOPB_TEXT ); ?></p></br>
                                    <div id="preview-icon">
                                        <a id="ssttbutton" href="#top">
                                            <span class="fa-stack fa-lg">
                                                <i class="ssttbutton-background fa <?php if ( !empty( $options['background_button'] ) ) { echo $options['background_button']; } else { echo 'fa-circle'; }  ?> fa-stack-2x"></i>
                                                <i class="ssttbutton-symbol fa <?php if ( !empty( $options['image_button'] ) ) { echo $options['image_button']; } else { echo 'fa-hand-o-up'; }  ?> fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php ssttbutton_css_options(); ?>

                        </form>

                    </div>
                </div>
            </div>
            <!-- END-FORM -->

        </div>

	</div>
	<?php
}