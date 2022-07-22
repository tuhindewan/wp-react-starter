<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://rextheme.com/
 * @since             1.0.0
 * @package           Code_Rex_Crm
 *
 * @wordpress-plugin
 * Plugin Name:       Code Rex CRM
 * Plugin URI:        https://rextheme.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            RexTheme
 * Author URI:        http://rextheme.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       code-rex-crm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_menu', 'crm_init_menu' );
/**
 * Init Admin Menu.
 *
 * @return void
 */
function crm_init_menu() {
	add_menu_page( __( 'Code Rex CRM', 'code-rex-crm'), __( 'Code Rex CRM', 'code-rex-crm'), 'manage_options', 'code-rex-crm', 'crm_admin_page', 'dashicons-admin-post', '2.1' );
}

/**
 * Init Admin Page.
 *
 * @return void
 */
function crm_admin_page() {
	require_once plugin_dir_path( __FILE__ ) . 'admin/templates/app.php';
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CODE_REX_CRM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-code-rex-crm-activator.php
 */
function activate_code_rex_crm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-code-rex-crm-activator.php';
	Code_Rex_Crm_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-code-rex-crm-deactivator.php
 */
function deactivate_code_rex_crm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-code-rex-crm-deactivator.php';
	Code_Rex_Crm_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_code_rex_crm' );
register_deactivation_hook( __FILE__, 'deactivate_code_rex_crm' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-code-rex-crm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_code_rex_crm() {

	$plugin = new Code_Rex_Crm();
	$plugin->run();

}
run_code_rex_crm();
