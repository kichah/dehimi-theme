<?php
add_theme_support('woocommerce');

function elchamsFiles()
{
    //font awesome
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
    //main styles
    wp_enqueue_style('dehimi_main_css', get_theme_file_uri('./build/style.css'));
    //js  
    //main js file
    wp_enqueue_script_module(
      'main-script', // Handle
      get_template_directory_uri() . '/build/script.js', // URL
      array(), // Dependencies (must also be modules)
      '1.0', // Version
      array(
          'in_footer' => true // Load in footer
      )
  );
  

};
add_action('wp_enqueue_scripts', 'elchamsFiles');
