<?php

function ah_add_submenu(){
    add_submenu_page('themes.php', 'Organize Yourself', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
}
add_action('admin_menu', 'ah_add_submenu');

function ah_settings_init() {
    register_setting('theme_options', 'ah_options_settings');
    
    add_settings_section(
    'ah_options_page_section',
    'Add Custom Text',
    'ah_options_page_section_callback',
    'theme_options'
    );
    
    function ah_options_page_section_callback(){
        echo 'Add some text';
    }
    
    // text box
    add_settings_field('ah_text_field', 'Enter your text here', 'ah_text_field_render', 'theme_options', 'ah_options_page_section');
    
    function ah_text_field_render(){
        $options = get_option('ah_options_settings');
        ?> 
        <input type="text"
        name="ah_options_settings[ah_text_field]" value="<?php if(isset($options['ah_text_field'])) echo $options['ah_text_field']; ?>" /> 
    <?php 
        
    }
    
    function my_theme_options_page(){
        ?>
        <form action="options.php" method="post">
        <h2> Organize Yourself - Theme Options</h2>
            <?php
                settings_fields('theme_options');
                do_settings_sections('theme_options');
                submit_button();
            ?>
        </form>

    <?php    
        }

    }
add_action('admin_init', 'ah_settings_init');