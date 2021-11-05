<?php
/*
Tags: wordpress login, login page design, admin login customize, admin login page customize
Plugin Name: Admin Login Mystery
Author: Shakil Dev
Author Uri: https://www.shakilahamed.com
Description: ADMIN LOGIN MYSTERY gives you a extra functionality design your wp-admin login page.
Requires at least: 4.0
Requires PHP: 5.2
Version: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Creation time: 11/5/2021
textdomain: admin-login-mystery
*/

if (!defined('ABSPATH')) exit;

function admin_login_mystery_logininfo_script_include()
{
?>
	
<style type="text/css">


	#login h1 a , .login h1 a {
      	background-image: url(<?php esc_html_e(get_option('admin_login_mystery_options_img', esc_url(plugin_dir_url(__FILE__) . 'admin/img/default_wordpress.png'))); ?>);
      	height: <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
		width: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px;
		background-size: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
		background-repeat: no-repeat;
      	border-radius: 50px
        }
    .login div#login form#loginform p.submit input#wp-submit {
    	color: white ;
    	/*background: ;*/
    	padding: 0 116px;
    	margin-top: 10px;
    }
    <?php esc_html_e(get_option('admin_login_mystery_options_additional_css')); ?>
</style>


	<?php
}

add_action('login_enqueue_scripts', 'admin_login_mystery_logininfo_script_include');

function admin_login_mystery_login_header()
{
    return esc_url(home_url());
}

add_filter('login_headerurl', 'admin_login_mystery_login_header');

//#################################
//Admin Login Mystery Menu Options
//#################################


function admin_login_mystery_menu_addon()
{

    add_settings_section('admin_login_mystery_section', '', 'admin_login_mystery_options_design', 'admin_login_mystery');

    add_settings_field('admin_login_mystery_options_img', esc_html(__("Admin Login Image Upload", "admin-login-mystery")) , 'admin_login_mystery_options_img_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_img');

    add_settings_field('admin_login_mystery_options_height', esc_html(__("Height", "admin-login-mystery")) , 'admin_login_mystery_options_height_design', 'admin_login_mystery', 'admin_login_mystery_section');
    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_height');

    add_settings_field('admin_login_mystery_options_width', esc_html(__("Width", "admin-login-mystery")) , 'admin_login_mystery_options_width_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_width');

    add_settings_field('admin_login_mystery_options_additional_css', esc_html(__("Additional CSS", "admin-login-mystery")) , 'admin_login_mystery_options_additional_css_design', 'admin_login_mystery', 'admin_login_mystery_section');
    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_additional_css');

}

add_action('admin_init', 'admin_login_mystery_menu_addon');

function admin_login_mystery_options_design()
{
    echo "";
}

//#################################
//Admin Login Mystery Fields Design
//#################################


function admin_login_mystery_options_img_design()
{
?>
	<span style="cursor: pointer;" class="dashicons dashicons-no exit_btn"></span>
	<img style="display: block; height: 100px; width:100px;"src="<?php esc_html_e(get_option('admin_login_mystery_options_img', esc_url(plugin_dir_url(__FILE__) . 'admin/img/default_wordpress.png'))) ?>" name="admin_login_mystery_options_img" class="img_addon" style="height: 100px; width: 150px;">
	<input type="text" style="display:none;" value="<?php esc_html_e(get_option('admin_login_mystery_options_img')); ?>" class="regular-text admin_login_mystery_options_text" name="admin_login_mystery_options_img">
	<input type="button" value="<?php esc_html(_e("Image Select", "admin-login-mystery")) ?>" id="upload_image_button" name="">
	<?php
}

function admin_login_mystery_options_height_design()
{
?>

<input type="text" class="small-text admin_login_mystery_options_number" name="admin_login_mystery_options_height" value="<?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>">px

<?php
}

function admin_login_mystery_options_width_design()
{
?>
	<input type="text" class="small-text admin_login_mystery_options_number" name="admin_login_mystery_options_width" value="<?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>">px
	<?php
}
function admin_login_mystery_options_additional_css_design()
{
?>
	<textarea id="fancy-textarea" name="admin_login_mystery_options_additional_css"><?php esc_textarea(get_option('admin_login_mystery_options_additional_css')) ?></textarea>
	<?php
}

//#################################
//Admin Login Mystery MENU ADDON
//#################################


function admin_login_mystery_addon_menu_page()
{

    add_submenu_page('options-general.php', esc_html(__("Admin Login Mystery Options", "admin-login-mystery")) , esc_html(__("Admin Login Mystery", "admin-login-mystery")) , 'manage_options', 'admin_login_mystery', 'admin_login_mystery_addon_menu_page_design', 'dashicons-lock');
}

add_action('admin_menu', 'admin_login_mystery_addon_menu_page');

function admin_login_mystery_addon_menu_page_design()
{
?>
	<div class="admin_login_mystery_options_div">
		<form class="admin_login_mystery_options_form" action="options.php" method="POST">
			<h1>Admin Menu Options</h1>
			<?php wp_enqueue_media(); ?>
			<?php do_settings_sections('admin_login_mystery'); ?>
			<?php settings_fields('admin_login_mystery_section'); ?>
			<?php submit_button(__(esc_html("Save"), "admin-login-mystery") , 'admin_login_mystery_options_form_button') ?>
		</form>
	</div>
	<?php
}

//#################################
//Admin Login Mystery Admin Enqueue Script
//#################################


function admin_login_mystery_admin_enqueue_style_script()
{

    wp_register_script('admin_login_mystery_main_js', esc_url(plugin_dir_url(__FILE__) . 'admin/js/admin_login_mystery_menu_options.js'));
    wp_register_style('admin_login_mystery_main_css', esc_url(plugin_dir_url(__FILE__) . 'admin/css/admin_login_mystery_style.css'));

    $cm_settings['codeEditor'] = wp_enqueue_code_editor(array(
        'type' => 'text/css'
    ));

    wp_enqueue_script('wp-theme-plugin-editor');
    wp_enqueue_style('wp-codemirror');
    wp_localize_script('jquery', 'cm_settings', $cm_settings);
    wp_enqueue_script('admin_login_mystery_main_js');
    wp_enqueue_style('admin_login_mystery_main_css');

}
add_action('load-settings_page_admin_login_mystery', 'admin_login_mystery_admin_enqueue_style_script');

//#################################
//Admin Login Mystery ADD CUSTOM CSS
//#################################


add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'admin_login_mystery_action_links');

function admin_login_mystery_action_links($actions)
{
    $actions[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=admin_login_mystery')) . '">' . __("Settings", "admin-login-mystery") . '</a>';
    $actions[] = '<a href="https://shakilahamed.com" target="_blank">' . esc_html(__("Support", "admin-login-mystery")) . '</a>';
    return $actions;
}

