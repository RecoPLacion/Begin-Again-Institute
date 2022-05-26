<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TEMPLATE NAME
 * 
 */
/*
 * ----------------------------------------------------------------------------------------
 *  THEME OPTIONS PANEL
 * ----------------------------------------------------------------------------------------
 */

 add_action('admin_menu', 'custom_theme_options');

 function custom_theme_options()
 {
    //  menu page code to be added at admin panel
    add_menu_page(
        'Theme Option',                     // Page title
        'Theme Options',                    // Menu title
        'manage_options',                   // Capability
        'rbr-theme-options',                // Menu slug
        'custom_options_callback',          // Callback functions
        'dashicons-admin-generic'           // Icon
    );
    // add sub menu page
    add_submenu_page(
        'rbr-theme-options',       
        'Theme Options',            
        'General Settings',                 
        'manage_options',
        'rbr-theme-options',
        'custom_options_callback'
    );
    // add sub menu page
    add_submenu_page(
        'rbr-theme-options',
        'Custom CSS',
        'Custom CSS',
        'manage_options',
        'rbr-theme-options-css',
        'custom_options_css_callback'
    );
    add_submenu_page(
        'rbr-theme-options',
        'Custom JS',
        'Custom JS',
        'manage_options',
        'rbr-theme-options-js',
        'custom_options_js_callback'
    );
    //activate custom settings
    add_action('admin_init', 'custom_theme_options_settings_section');
 }

 function custom_options_callback()
 {
    //  we have to link our admin custom settings
    require_once( get_template_directory() . '/inc/templates/rbr-admin-theme-options.php' );
 }

 function custom_options_css_callback()
 {
     //generate css page
     require_once( get_template_directory() . '/inc/templates/rbr-css-theme-options.php' );
 }

 function custom_options_js_callback()
 {
     //generate js page
    require_once( get_template_directory() . '/inc/templates/rbr-js-theme-options.php' );
 }

//  theme options settings page section
function custom_theme_options_settings_section()
{
    //step #1 provides an area where you can register your fields
    add_settings_section(
        'theme-section',            //id section
        'Sidebar Option',                 //title
        'sidebar_setting_callback',   //callback function
        'rbr-theme-options',            //page or slug
    );

    // step #2 add settings field
    add_settings_field(
        'logo_url_name',     //id
        'Logo',     //title
        'logo_url_callback',     //callback function
        'rbr-theme-options',     //page
        'theme-section'      //id section
    );

    add_settings_field('favicon_url', 'Favicon', 'favicon_url_callback', 'rbr-theme-options', 'theme-section');

    add_settings_field(
        'social_name',     //id
        'SNS',     //title
        'social_media_url',     //callback function
        'rbr-theme-options',     //page
        'theme-section'      //id section
    );

    add_settings_field('address_url_name', 'Address', 'address_url_callback', 'rbr-theme-options', 'theme-section');

    add_settings_field('sales_url_name', 'Sales Number', 'sales_url_callback', 'rbr-theme-options', 'theme-section');
    add_settings_field('support_url_name', 'Support Number', 'support_url_callback', 'rbr-theme-options', 'theme-section');

    add_settings_field( 'copyright_url_name', 'Copyright', 'copyright_url_callback', 'rbr-theme-options', 'theme-section' );

    // step #3 register the settings
    // section and id of settings field

    //Register address
    register_setting('theme-section', 'address_url');

    //Register sales
    register_setting('theme-section', 'sales_url');
    register_setting('theme-section', 'support_url');

    //Register Copyright
    register_setting('theme-section', 'copyright_url', 'sanitize_copyright');

    //register logo & favicon
    register_setting('theme-section', 'logo_url');
    register_setting('theme-section', 'favicon_url');

    //register sns
    register_setting('theme-section', 'fb_url');
    register_setting('theme-section', 'yt_url');
    register_setting('theme-section', 'insta_url');
    register_setting('theme-section', 'in_url');

    //Register Custom CSS &JS
    register_setting('theme-css-option', 'theme_css', 'theme_options_sanitize_css');
    add_settings_section('theme-custom-css-section', 'CSS Code', 'theme_custom_css_section_callback', 'rbr-theme-options-css');
    add_settings_field('custom-css', '', 'theme_custom_css_callback', 'rbr-theme-options-css', 'theme-custom-css-section');

    register_setting('theme-js-option', 'theme_js');
    add_settings_section('theme-custom-js-section', 'JS Code', 'theme_custom_js_section_callback', 'rbr-theme-options-js');
    add_settings_field('custom-js', '', 'theme_custom_js_callback', 'rbr-theme-options-js', 'theme-custom-js-section');
}

function theme_custom_js_section_callback()
{
    echo 'Enter your JS code in the field below. Custom JS entered here will override the theme JS. Contents of this field will be auto encoded.';
}

function theme_custom_js_callback()
{
    ?>
        <?php 
        
            $js = esc_attr( get_option('theme_js') ); 
        ?>
        
        <div id="customJS"><?php echo $js; ?></div>
        <textarea name="theme_js" id="theme_js" style="display:none;visibility:hidden"><?php echo $js; ?></textarea>
    <?php
}

function theme_custom_css_section_callback()
{
    echo '<p class="tagline">Enter your CSS code in the field below. Do not include any tags or HTML in the field. Custom CSS entered here will override the theme CSS. In some cases, the !important tag maybe needed. Don\'t URL encode image or SVG paths. Contents of this field will be auto encoded.</p>';
}

function theme_custom_css_callback()
{
    ?>
        <?php 
        
            $css = esc_attr( get_option('theme_css') ); 
            $css = ( empty($css) ? '/* Theme Option Custom CSS */' : $css );
        ?>
        
        <div id="customCSS"><?php echo $css; ?></div>
        <textarea name="theme_css" id="theme_css" style="display:none;visibility:hidden"><?php echo $css; ?></textarea>
    <?php
}

//Sanitize css
function theme_options_sanitize_css( $input )
{
    $output = esc_textarea( $input );
    return $output;
}

function favicon_url_callback()
{
    ?>
        <?php
            $favicon = esc_attr( get_option( 'favicon_url' ) );
            if( empty( $favicon ) ){
                ?>
                    <div class="preview-fav">
                        <img id="img_fav" src="<?php echo $favicon; ?>" alt="">
                    </div>
                    <input type="button" class="fav_upload_button button-secondary" value="Upload Favicon" id="fav_upload_button">
                    <input type="hidden" name="favicon_url" id="favicon_url" value="">
                    <p class="description">Select an image file for your Favicon.</p>
                <?php
            } else{
                ?>
                    <div class="preview-fav">
                        <img id="img_fav" src="<?php echo $favicon; ?>" alt="">
                    </div>
                    <input type="button" class="fav_upload_button button-secondary" value="Replace Favicon" id="fav_upload_button">
                    <input type="button" class="fav_upload_button button-secondary" value="Remove Favicon" id="fav_remove_button">
                    <input type="hidden" name="favicon_url" id="favicon_url" value="<?php echo $favicon; ?>">
                <?php
            }
        ?>
    <?php
}

function logo_url_callback()
{
    ?>  
        <?php
            $logo = esc_attr( get_option('logo_url') );
            if( empty($logo) ){
                ?>
                    <div class="preview-logo">
                        <img id="img_logo" src="<?php echo $logo; ?>" alt="">
                    </div>
                    <div class="logo-input">
                        <input type="button" class="upload_button button-secondary" value="Upload Logo" id="upload_button">
                        <input type="hidden" name="logo_url" id="logo_url" value="">
                    </div>
                    <p class="description">Select an image file for your logo.</p>
                <?php
            }else{
                ?>
                    <div class="preview-logo">
                        <img id="img_logo" src="<?php echo $logo; ?>" alt="">
                    </div>
                    <input type="button" class="upload_button button-secondary" value="Replace Logo" id="upload_button">
                    <input type="button" class="upload_button button-secondary" value="Remove Logo" id="remove_button">
                    <input type="hidden" name="logo_url" id="logo_url" value="<?php echo $logo; ?>">
                <?php
            }
        ?>
        
    <?php
}

function sidebar_setting_callback()
{
    //Sidebar
}

function address_url_callback()
{
    ?>
        <?php
            $addressUrl = esc_attr( get_option( 'address_url' ) );
        ?>
        <p class="description">Enter your Address here</p>
        <textarea name="address_url" id="address_url" cols="30" rows="10" class="textarea-control"><?php echo $addressUrl; ?></textarea>
    <?php
}

function sales_url_callback()
{
    ?>
        <?php
            $salesUrl = esc_attr( get_option( 'sales_url' ) );
        ?>
        <p class="description">Enter your sales number here.</p>
        <input type="tel" class="input-control" name="sales_url" id="sales_url" value="<?php echo $salesUrl; ?>">
    <?php
}

function support_url_callback()
{
    ?>
        <?php
            $supportUrl = esc_attr( get_option( 'support_url' ) );
        ?>
        <p class="description">Enter your support number here.</p>
        <input type="tel" class="input-control" name="support_url" id="support_url" value="<?php echo $supportUrl; ?>">
    <?php
}

function sanitize_copyright( $input )
{
    $output = wp_kses_post( $input );
    return $output;
}

function copyright_url_callback()
{
    ?>
        <?php $copyright = esc_attr( get_option( 'copyright_url' ) ); ?>
        <p class="description">Enter your copyright text here. It allows HTML tags</p>
        <textarea name="copyright_url" id="copyright_url" class="textarea-control"><?php echo $copyright; ?></textarea>
    <?php
}

//function social media callback
function social_media_url()
{
    ?>
        <?php
            $fb = esc_attr( get_option('fb_url') );
            $yt = esc_attr( get_option('yt_url') );
            $insta = esc_attr( get_option('insta_url') );
            $in = esc_attr( get_option('in_url') );
        ?>
        <p class="description">The social media networks that display in the header and footer. Add the network of your choice along with your unique URL. Each network you wish to display must be added here to show up in the header and footer.</p>
        <p class="description">Enter Facebook URL</p>
        <input type="text" class="input-control" name="fb_url" id="fb_url" value="<?php echo $fb; ?>"><br><br>
        <p class="description">Enter Youtube URL</p>
        <input type="text" class="input-control" name="yt_url" id="yt_url" value="<?php echo $yt; ?>"><br><br>
        <p class="description">Enter Instagram URL</p>
        <input type="text" class="input-control" name="insta_url" id="insta_url" value="<?php echo $insta; ?>">
        <p class="description">Enter Linkedin URL</p>
        <input type="text" class="input-control" name="in_url" id="in_url" value="<?php echo $in; ?>">
    <?php
}