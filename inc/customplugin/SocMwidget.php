<?php

    /* 
        Plugin Name: Social Media Widget
       Plugin Description: Adds social media links to your theme
       Plugin URI : *
        Author: Aneet Hundal  
        Author URI : *
        Version : 1.0
   */

function fbbutton ($atts, $content = null) {
    
    extract(shortcode_atts(
    array (
        'linkf' => 'http://facebook.com', 
        'imgf' => '/img/facebookicon.png'
    ), $atts
    ));
    
    return '
            <style type="text/css">
            
            </style>
        
<div id="socmedicons">
    <a id="fblink" href =" ' .$linkf . '"> 
</div> '; 
}

add_shortcode('fbbutton', 'fbbutton');

