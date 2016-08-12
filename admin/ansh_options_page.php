<?php

/**
 * Add an admin submenu link under Settings
 */
function ansh_admin_settings_menu() {

    add_options_page(
        _x('Animal Shelter manager', 'title for the settings page', ANSH_TEXT_DOMAIN),
        'Animal Shelter',
        'manage_options',
        'ansh-plugin',      //menu-slug
        'ansh_options_page' //function
    );
}
add_action('admin_menu', 'ansh_admin_settings_menu');


/**
 * Register the settings
 */
function ansh_register_settings() {

    register_setting(
        'ansh_tax_options',
        'ansh_age_defaults'
    );
}
add_action( 'admin_init', 'ansh_register_settings' );


/**
 * Building the options page
 */
function ansh_options_page() {
    if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false; ?>

    <div class="wrap">

        <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

        <div id="tax-defaults">
            <div id="tax-defaults-body">
                <div id="tax-defaults-body-content">
                    <form method="post" action="options.php" class="form-table">

                        <?php settings_fields( 'ansh_tax_options' ); ?>
                        <?php $options = get_option( 'ansh_age_defaults' ); ?>

                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">
                                    <?php _e( 'Do you wish to create default values for Age?', ANSH_TEXT_DOMAIN ); ?>
                                </th>
                                <td>
                                    <?php $checked = $options; ?>
                                    <fieldset>
                                    <legend><?php _e( 'Select "Yes" if you want these defaults "Puppy, Young, Old, Adult"', ANSH_TEXT_DOMAIN ); ?></legend>
                                    <p>
                                        <input type="radio" name="ansh_age_defaults" id="yes" value="yes" <?php checked( $checked, 'yes' ); ?>/>
                                        <label for="yes">Yes</label>
                                    </p>
                                    <p>
                                        <input type="radio" name="ansh_age_defaults" id="no" value="no" <?php checked( $checked, 'no' ); ?>/>
                                        <label for="no">No</label>
                                    </p>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>

                        <?php submit_button(); ?>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- END WRAP -->

    <?php
}
