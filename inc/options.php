<?php

/* 
    Additional options to customize your theme. 
*/

function ah_add_submenu(){
    add_submenu_page('themes.php', 'Enhance Yourself', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
}
add_action('admin_menu', 'ah_add_submenu');

function ah_settings_init() {
    register_setting('theme_options', 'ah_options_settings');
    
    add_settings_section(
    'ah_options_page_section',
    'Change specifics of your theme',
    'ah_options_page_section_callback',
    'theme_options'
    );
    
    function ah_options_page_section_callback(){
        echo 'Options for Enhancement';
    }
    
    // Add an announcement above your title. 
    add_settings_field('ah_text_field', 'Enter an announcement', 'ah_text_field_render', 'theme_options', 'ah_options_page_section');
    
    function ah_text_field_render(){
        $options = get_option('ah_options_settings');
        ?> 
        <input type="text"
        name="ah_options_settings[ah_text_field]" value="<?php if(isset($options['ah_text_field'])) echo $options['ah_text_field']; ?>" /> 
    <?php 
        
    }
    
    // Change the greeting/title on your home page. Stylized through this option, this is a new way to open your site to viewers.
    
    add_settings_field(
        'ah_combo_field',
        'Your stylized home page header',
        'ah_combo_field_render',
        'theme_options',
        'ah_options_page_section'
    );
    
    function ah_combo_field_render(){
        
        $options = get_option('ah_options_settings');
        ?> 
    
        <input type="radio" name="ah_options_settings[ah_combo_field]" <?php 
        if(isset($options['ah_combo_field'])) 
        checked($options['ah_combo_field'], 1); ?>
        value="Hello!" /> <label>Hello!</label> <br /> 

        <input type="radio" name="ah_options_settings[ah_combo_field]" <?php
        if(isset($options['ah_combo_field']))
        checked($options['ah_combo_field'], 2); ?>
        value="Bonjour!" /> <label>Bonjour!</label> <br />

        <input type="text"
        name="ah_options_settings[ah_combo_field]" value="<?php if(isset($options['ah_combo_field'])) echo $options['ah_combo_field']; ?>" /> 
         
  <?php                                                                              
        
    }
    
    //Change the background colour of footer -> actually the sidebar but it's been moved down to the bottom of the page above the footer.
    
    add_settings_field(
        'ah_rad_field', 
        'Select a background colour for your menu items that appear at the bottom of the page',
        'ah_rad_field_render',
        'theme_options',
        'ah_options_page_section'
    );
    
    function ah_rad_field_render(){
        $options = get_option('ah_options_settings');
    ?>
        
   <input type="radio" name="ah_options_settings[ah_rad_field]" <?php if(isset($options['ah_rad_field'])) checked($options['ah_rad_field'], 1); ?> value="#5E747F" /> <label>Header Blue</label> <br />
    
    <input type="radio" name="ah_options_settings[ah_rad_field]" <?php if(isset($options['ah_rad_field'])) checked($options['ah_rad_field'], 1); ?> value="#a6586a" /> <label>Dusty Pink</label> <br />

     <input type="radio" name="ah_options_settings[ah_rad_field]" <?php if(isset($options['ah_rad_field'])) checked($options['ah_rad_field'], 1); ?> value="#BF4342" /> <label>Rusty Red</label> <br />

    <input type="radio" name="ah_options_settings[ah_rad_field]" <?php if(isset($options['ah_rad_field'])) checked($options['ah_rad_field'], 1); ?> value="#000" /> <label>Midnight</label> <br />

    <?php
    }
    
    
}
    
    function my_theme_options_page(){
        ?>
        <form action="options.php" method="post">
        <h2> Enhance Yourself - Theme Options</h2>
            <?php
                settings_fields('theme_options');
                do_settings_sections('theme_options');
                submit_button();
            ?>
        </form>

    <?php    
        }

    
add_action('admin_init', 'ah_settings_init');