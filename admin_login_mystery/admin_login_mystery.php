<?php
/*
Tags: wordpress login,login page design,admin login customize,admin login page customize,wp-login, login,login customizer,custom login,wordpress login
Plugin Name: Admin Login Mystery
Author: Shakil Ahamed
Author Uri: https://www.shakilahamed.com
Description: ADMIN LOGIN MYSTERY gives you a extra functionality design your wp-admin login page.
Requires at least: 4.0
Requires PHP: 5.2
Version: 0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Creation time: 11/5/2021
textdomain: admin-login-mystery
*/

if (!defined('ABSPATH')) exit;

//#################################
//Admin Login Mystery MENU PAGE DESIGN
//#################################
include_once ("includes/admin_login_mistery_page.php");

function admin_login_mystery_logininfo_script_include()
{
?>
    
<style type="text/css">#login h1 a , .login h1 a {
        background-image: url(<?php esc_html_e(get_option('admin_login_mystery_options_img', esc_url(plugin_dir_url(__FILE__) . 'admin/img/default_wordpress.png'))); ?>);
        height: <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
        width: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px;
        background-size: <?php esc_html_e(get_option('admin_login_mystery_options_width', '150')); ?>px <?php esc_html_e(get_option('admin_login_mystery_options_height', '150')); ?>px;
        background-repeat: no-repeat;
        border-radius: <?php esc_html_e(get_option('admin_login_mystery_options_border_radius', '50')); ?>px
        }
    <?php $form_padding_admin = get_option('admin_login_mystery_options_login_form_padding'); ?>
    <?php $form_margin_admin = get_option('admin_login_mystery_options_login_form_margin'); ?>
                #login form {
                    <?php if (isset($form_margin_admin[1]) || isset($form_margin_admin[2]) || isset($form_margin_admin[3]) || isset($form_margin_admin[4]))
    { ?>
                    margin: <?php esc_html_e($form_margin_admin[1]); ?>px <?php esc_html_e($form_margin_admin[2]); ?>px <?php esc_html_e($form_margin_admin[3]); ?>px <?php esc_html_e($form_margin_admin[4]); ?>px;
                        <?php
    }
    else
    {
        esc_html_e('margin-top: 20px;margin-left: 0;');
    } ?>

                    <?php if (isset($form_padding_admin[1]) || isset($form_padding_admin[2]) || isset($form_padding_admin[3]) || isset($form_padding_admin[4]))
    { ?>
                    padding: <?php esc_html_e($form_padding_admin[1]); ?>px <?php esc_html_e($form_padding_admin[2]); ?>px <?php esc_html_e($form_padding_admin[3]); ?>px <?php esc_html_e($form_padding_admin[4]); ?>px;

                    <?php
    }
    else
    {
        esc_html_e('padding: 26px 24px 34px;');
    } ?>
}
    body{
        height: 100vh !important;
        background: <?php esc_html_e(get_option('admin_login_mystery_options_background_color', '#F0F0F1')); ?> !important; 
        background-image: url(<?php esc_html_e(get_option('admin_login_mystery_options_background_image', 'none')); ?>) !important;
        background-repeat: <?php esc_html_e(get_option('admin_login_mystery_options_background_repeat', 'no-repeat')); ?> !important;
        background-position: <?php esc_html_e(get_option('admin_login_mystery_options_background_position', 'center center')); ?> !important;
        background-size: <?php esc_html_e(get_option('admin_login_mystery_options_background_size', 'auto')); ?> !important;

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

    add_settings_field('admin_login_mystery_options_img', esc_html(__("Form Header Image Upload", "admin-login-mystery")) , 'admin_login_mystery_options_img_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_img');

    add_settings_field('admin_login_mystery_options_height', esc_html(__("Header Image Height", "admin-login-mystery")) , 'admin_login_mystery_options_height_design', 'admin_login_mystery', 'admin_login_mystery_section');
    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_height');

    add_settings_field('admin_login_mystery_options_width', esc_html(__("Header Image Width", "admin-login-mystery")) , 'admin_login_mystery_options_width_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_width');

    add_settings_field('admin_login_mystery_options_border_radius', esc_html(__("Header Image Border Radius", "admin-login-mystery")) , 'admin_login_mystery_options_border_radius_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_border_radius');

    add_settings_field('admin_login_mystery_options_background_color', esc_html(__("Background Color", "admin-login-mystery")) , 'admin_login_mystery_options_background_color_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_background_color');

    add_settings_field('admin_login_mystery_options_background_image', esc_html(__("Background Image", "admin-login-mystery")) , 'admin_login_mystery_options_background_image_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_background_image');

    add_settings_field('admin_login_mystery_options_background_repeat', esc_html(__("Background Repeat", "admin-login-mystery")) , 'admin_login_mystery_options_background_repeat_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_background_repeat');

    add_settings_field('admin_login_mystery_options_background_position', esc_html(__("Background Position", "admin-login-mystery")) , 'admin_login_mystery_options_background_position_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_background_position');

    add_settings_field('admin_login_mystery_options_background_size', esc_html(__("Background Size", "admin-login-mystery")) , 'admin_login_mystery_options_background_size_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_background_size');

    add_settings_field('admin_login_mystery_options_login_form_padding', esc_html(__("Login Form Padding", "admin-login-mystery")) , 'admin_login_mystery_options_login_form_padding_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_login_form_padding');

    add_settings_field('admin_login_mystery_options_login_form_margin', esc_html(__("Login Form Margin", "admin-login-mystery")) , 'admin_login_mystery_options_login_form_margin_design', 'admin_login_mystery', 'admin_login_mystery_section');

    register_setting('admin_login_mystery_section', 'admin_login_mystery_options_login_form_margin');

    // add_settings_field('admin_login_mystery_options_login_form_size', esc_html(__("Login Form Font Size", "admin-login-mystery")) , 'admin_login_mystery_options_login_form_size_design', 'admin_login_mystery', 'admin_login_mystery_section');
    // register_setting('admin_login_mystery_section', 'admin_login_mystery_options_login_form_margin');
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

    global $dynamics_fields;
    $dynamics_fields->imageFields(array(
        'admin_login_mystery_options_img',
        plugin_dir_url(__FILE__) . 'admin/img/default_wordpress.png'
    ) , '', 'Image Select');

}

function admin_login_mystery_options_height_design()
{
    global $dynamics_fields;
    $dynamics_fields->inputFields("number", "small-text admin_login_mystery_options_number_height", "admin_login_mystery_options_height", array(
        "150",
        'px'
    ));

}

function admin_login_mystery_options_width_design()
{

    global $dynamics_fields;
    $dynamics_fields->inputFields("number", "small-text admin_login_mystery_options_number_width", "admin_login_mystery_options_width", array(
        "150",
        'px'
    ));

}

function admin_login_mystery_options_border_radius_design()
{

    global $dynamics_fields;
    $dynamics_fields->inputFields("number", "small-text admin_login_mystery_options_border_radius_design", "admin_login_mystery_options_border_radius", array(
        50,
        'px'
    ));

}

function admin_login_mystery_options_background_color_design()
{

    global $dynamics_fields;
    $dynamics_fields->inputFields("text", "small-text my-color-field admin_login_mystery_options_background_color", "admin_login_mystery_options_background_color", array(
        "#F0F0F1",
        ''
    ));

}

function admin_login_mystery_options_background_image_design()
{

    global $dynamics_fields;
    $dynamics_fields->imageFields(array(
        'admin_login_mystery_options_background_image',
        '',
    ) , '', 'Background Image Select');
}

function admin_login_mystery_options_background_repeat_design()
{
?>
    <select name="admin_login_mystery_options_background_repeat">
        
        <option value="no-repeat" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'no-repeat', true); ?>>no-repeat</option>

        <option value="repeat" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'repeat', true); ?>>repeat</option>

        <option value="inherit" <?php selected(get_option('admin_login_mystery_options_background_repeat') , 'inherit', true); ?>>inherit</option>
    
    </select>
<?php
}

function admin_login_mystery_options_background_position_design()
{
?>
    <select name="admin_login_mystery_options_background_position">
    
        <option value="center top" <?php selected(get_option('admin_login_mystery_options_background_position') , 'center top', true); ?>>center top</option>

        <option value="center bottom" <?php selected(get_option('admin_login_mystery_options_background_position') , 'center bottom', true); ?>>center bottom</option>

        <option value="center left" <?php selected(get_option('admin_login_mystery_options_background_position') , 'center left', true); ?>>center left</option>

        <option value="center right" <?php selected(get_option('admin_login_mystery_options_background_position') , 'center right', true); ?>>center right</option>

        <option value="center center" <?php selected(get_option('admin_login_mystery_options_background_position') , 'center center', true); ?>>center center</option>

        <option value="bottom left" <?php selected(get_option('admin_login_mystery_options_background_position') , 'bottom left', true); ?>>bottom left</option>

        <option value="top left" <?php selected(get_option('admin_login_mystery_options_background_position') , 'top left', true); ?>>top left</option>

        <option value="bottom right" <?php selected(get_option('admin_login_mystery_options_background_position') , 'bottom right', true); ?>>bottom right</option>

        <option value="top right" <?php selected(get_option('admin_login_mystery_options_background_position') , 'top right', true); ?>>top right</option>

    </select>

<?php
}

function admin_login_mystery_options_background_size_design()
{
?>
    <select name="admin_login_mystery_options_background_size">
    
        <option value="auto" <?php selected(get_option('admin_login_mystery_options_background_size') , 'auto', true); ?>>auto</option>

        <option value="contain" <?php selected(get_option('admin_login_mystery_options_background_size') , 'contain', true); ?>>contain</option>

        <option value="cover" <?php selected(get_option('admin_login_mystery_options_background_size') , 'cover', true); ?>>cover</option>

        <option value="inherit" <?php selected(get_option('admin_login_mystery_options_background_size') , 'inherit', true); ?>>inherit</option>

    </select>
<h2 id="sectionHead">Login Form</h2>
<?php
}

function admin_login_mystery_options_login_form_padding_design()
{
    global $dynamics_fields;
    $dynamics_fields->input4Box('admin_login_mystery_options_login_form_padding', 'admin_login_mystery_options_login_form_padding_design', array(
        '24',
        '26',
        '36',
        '36'
    ));

}

function admin_login_mystery_options_login_form_margin_design()
{

    global $dynamics_fields;
    $dynamics_fields->input4Box('admin_login_mystery_options_login_form_margin', 'admin_login_mystery_options_login_form_margin_design', array(
        '20',
        '0',
        '0',
        '0'
    ));

}

// function admin_login_mystery_options_login_form_size_design(){
//     global $dynamics_fields;
//     $dynamics_fields->inputFields("number", "small-text admin_login_mystery_options_login_form_size_design", "admin_login_mystery_options_login_form_size", array(
//         50,
//         'px'
//     ));
// }


function admin_login_mystery_options_additional_css_design()
{
    global $dynamics_fields;
    $dynamics_fields->fancyEditorCSS('admin_login_mystery_options_additional_css');

?>
    <h2 style="padding: 10px; margin-top: 10px;">More Options Are Coming...</h2>
    <?php
}

//#################################
//Admin Login Mystery Admin Enqueue Script
//#################################


function admin_login_mystery_admin_enqueue_style_script()
{

    wp_register_script('admin_login_mystery_main_js', esc_url(plugin_dir_url(__FILE__) . 'admin/js/admin_login_mystery_menu_options.js') , 'jquery', '0.3');
    wp_register_style('admin_login_mystery_main_css', esc_url(plugin_dir_url(__FILE__) . 'admin/css/admin_login_mystery_style.css') , array() , '0.3');
    $cm_settings['codeEditor'] = wp_enqueue_code_editor(array(
        'type' => 'text/css'
    ));

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('wp-theme-plugin-editor');
    wp_enqueue_style('wp-codemirror');
    wp_enqueue_script('wp-codemirror');
    wp_localize_script('jquery', 'cm_settings', $cm_settings);
    wp_enqueue_script('admin_login_mystery_main_js');
    wp_enqueue_style('admin_login_mystery_main_css');

}
add_action('load-settings_page_admin_login_mystery', 'admin_login_mystery_admin_enqueue_style_script');

//#################################
// Ajax Worker
//#################################
add_action('wp_ajax_save_and_update_options', 'save_and_update_options');
add_action('wp_ajax_nopriv_save_and_update_options', 'save_and_update_options_error');

function save_and_update_options()
{

    $admin_login_mystery_options_img = $_POST['admin_login_mystery_options_img'];
    $admin_login_mystery_options_height = $_POST['admin_login_mystery_options_height'];
    $admin_login_mystery_options_width = $_POST['admin_login_mystery_options_width'];
    $admin_login_mystery_options_border_radius = $_POST['admin_login_mystery_options_border_radius'];
    $admin_login_mystery_options_background_color = $_POST['admin_login_mystery_options_background_color'];
    $admin_login_mystery_options_background_image = $_POST['admin_login_mystery_options_background_image'];
    $admin_login_mystery_options_background_repeat = $_POST['admin_login_mystery_options_background_repeat'];
    $admin_login_mystery_options_background_position = $_POST['admin_login_mystery_options_background_position'];
    $admin_login_mystery_options_background_size = $_POST['admin_login_mystery_options_background_size'];
    $admin_login_mystery_options_login_form_padding = $_POST['admin_login_mystery_options_login_form_padding'];
    $admin_login_mystery_options_login_form_margin = $_POST['admin_login_mystery_options_login_form_margin'];
    $admin_login_mystery_options_additional_css = $_POST['admin_login_mystery_options_additional_css'];

    update_option('admin_login_mystery_options_img', $admin_login_mystery_options_img);
    update_option('admin_login_mystery_options_height', $admin_login_mystery_options_height);
    update_option('admin_login_mystery_options_width', $admin_login_mystery_options_width);
    update_option('admin_login_mystery_options_border_radius', $admin_login_mystery_options_border_radius);
    update_option('admin_login_mystery_options_background_color', $admin_login_mystery_options_background_color);
    update_option('admin_login_mystery_options_background_image', $admin_login_mystery_options_background_image);
    update_option('admin_login_mystery_options_background_repeat', $admin_login_mystery_options_background_repeat);
    update_option('admin_login_mystery_options_background_position', $admin_login_mystery_options_background_position);
    update_option('admin_login_mystery_options_background_size', $admin_login_mystery_options_background_size);

    update_option('admin_login_mystery_options_login_form_padding', array(
        '1' => $admin_login_mystery_options_login_form_padding[0],
        '2' => $admin_login_mystery_options_login_form_padding[1],
        '3' => $admin_login_mystery_options_login_form_padding[2],
        '4' => $admin_login_mystery_options_login_form_padding[3],
        '5' => $admin_login_mystery_options_login_form_padding[4]
    ));

    update_option('admin_login_mystery_options_login_form_margin', array(
        '1' => $admin_login_mystery_options_login_form_margin[0],
        '2' => $admin_login_mystery_options_login_form_margin[1],
        '3' => $admin_login_mystery_options_login_form_margin[2],
        '4' => $admin_login_mystery_options_login_form_margin[3],
        '5' => $admin_login_mystery_options_login_form_margin[4]
    ));

    if ($admin_login_mystery_options_additional_css != '' && $admin_login_mystery_options_additional_css != 'empty')
    {

        update_option('admin_login_mystery_options_additional_css', $admin_login_mystery_options_additional_css);

    }
    else
    {

        update_option('admin_login_mystery_options_additional_css', '');

    }

?>
<?php
    die();
}

function save_and_update_options_error()
{
    echo "no this error";
    die();
}

//#################################
//Admin Login Mystery ACTION LINKS
//#################################


add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'admin_login_mystery_action_links');

function admin_login_mystery_action_links($actions)
{
    $actions[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=admin_login_mystery')) . '">' . __("Settings", "admin-login-mystery") . '</a>';
    $actions[] = '<a href="https://shakilahamed.com/plugin-support" target="_blank">' . esc_html(__("Support", "admin-login-mystery")) . '</a>';
    return $actions;
}

include_once ("includes/fields/admin_login_mystery_fields.php");

$dynamics_fields = new allFields;

