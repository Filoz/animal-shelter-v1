<?php

/*
Plugin Name: Animal Shelter Manager
Plugin URI: http://github.com/lucagentile/wp-animal-shelter-manager
Description: Manage your animals and pets in an easy way. You'll get an "Animals" menu under the Articles one where you can add animals and taxonomies like Species, Breed, Sex, Age, Special Needs.
Version: 1.0
Author: Luca Gentile
Author URI: http://lucagentile.eu
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: animal-shelter
Domain Path: /languages

I started this plugin by taking posts and taxonomies from https://github.com/RescueThemes/Rescue-Animal-Custom-Posts
by https://github.com/jamigibbs, then I changed other stuff (hierarchicals, Gender to Sex, etc.)
I didn't put things like "size" and "colour" because people should firstly focus on other things when considering an 
adoption, non aesthetics.
Metaboxes for custom taxonomies are all separated, so you can decide your own layout.
*/

//check if plugin is accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//current plugin directory
$ansh_dir = plugin_dir_path(__FILE__);

//text domain
define(ANSH_TEXT_DOMAIN, 'animal-shelter');

/**
 * Activation hook
 */
require_once ( $dir.'includes/ansh-activation.php' );

/**
 * Deactivation hook
 */
require_once ( $dir.'includes/ansh-deactivation.php' );


/**
 * Register Custom Post for Animals and their taxonomies
 */
require_once ( $dir.'includes/ansh-register-animals-custom-post.php' );


/**
 * Add Animal Author role. They can only add animals, and edit\delete their own
 */
require_once ( $dir.'includes/ansh-add-roles.php' );
register_activation_hook( __FILE__, 'ansh_add_roles' );


/**
 * Modify metaboxes for custom taxonomies
 */
require_once ( $dir.'includes/ansh-taxonomy-metaboxes.php' );

/*
 * Register the "Archived" Post status, helpful for archive adopted\relocated animals without deleting them
 */
require_once ( $dir.'includes/ansh-register-archived-status.php' );


/*
 * Add a "Last Adopted" widget to show archived & adopted dogs
 */
require_once ($dir.'includes/ansh-add-last-adopted-widget.php');


/*
 * Add a shortcode for showing animals by breed
 */
require_once ($dir.'includes/ansh_shortcodes.php');


/*
 * Admin menu under Settings
 */
if ( is_admin() ) {
    require_once( $dir.'/admin/ansh_options_page.php' );
}


/**
 * Load the plugin text domain for translation.
 */
function ansh_load_plugin_textdomain() {
    load_plugin_textdomain(
        'animal-shelter',
        FALSE,
        basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ansh_load_plugin_textdomain' );