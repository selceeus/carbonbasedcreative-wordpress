<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>">
  <?php get_template_part('templates/head'); ?>
  <body id="no-scroll" <?php body_class(); ?>>
  <div class="loader-overlay">
    <div class="loader-graphic loader-pulse">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65.27 66.63">
        <defs>
          <style>.a{fill:#ffffff!important;}</style>
        </defs>
      <title>carbonbased-loader</title>
        <path class="a" d="M53.7,28.91a20.23,20.23,0,0,0-35.65-4,20.25,20.25,0,1,0,35.65,4m-5.57,16a16.2,16.2,0,0,1-2.82,3.15,1.88,1.88,0,0,1,1.44,1,1.92,1.92,0,0,1-3.43,1.71,1.88,1.88,0,0,1-.17-1.2,14.82,14.82,0,0,1-2.4,1.17A15.75,15.75,0,0,1,19.34,36.11,15.7,15.7,0,0,1,25.07,24a1.91,1.91,0,1,1,1.42-1,15.16,15.16,0,0,1,2.92-1.5,15.73,15.73,0,0,1,20.34,9h0a15.67,15.67,0,0,1-1.62,14.47Z"/>
        <path class="a " d="M45.76,32a11.38,11.38,0,0,0-4.27-5.37,11.55,11.55,0,0,0-6.41-2,11.54,11.54,0,0,0-9.5,5.05,11.55,11.55,0,0,0-2,6.41,11.54,11.54,0,0,0,5.05,9.5,11.46,11.46,0,0,0,17.87-9.5A11.36,11.36,0,0,0,45.76,32M37.12,43.09a7.27,7.27,0,1,1,4.94-9A7.27,7.27,0,0,1,37.12,43.09Z"/>
        <path class="a" d="M59.74,53.74A30.34,30.34,0,0,0,34.93,5.94c-.49,0-1,0-1.45,0a3.78,3.78,0,0,0,.67-2.15A3.82,3.82,0,1,0,27.9,6.76a30.41,30.41,0,0,0-17.71,12A5.29,5.29,0,1,0,5.29,26a5.12,5.12,0,0,0,1.12-.13A30.35,30.35,0,0,0,54.73,59.27a3.81,3.81,0,1,0,5-5.53Zm-4.59-3.83A24.56,24.56,0,0,1,34.83,60.73c-.7,0-1.4,0-2.1-.1a2,2,0,0,1,.36.62,2,2,0,1,1-3-1,24.79,24.79,0,0,1-8.93-3.7A24.53,24.53,0,0,1,10.31,36.21c0-.47,0-.93,0-1.4a2.52,2.52,0,1,1,.25-2.38A24.5,24.5,0,0,1,34.82,11.69c.78,0,1.55.05,2.32.12a2.58,2.58,0,0,1-.84-1.15,2.56,2.56,0,1,1,3.32,1.52,24.62,24.62,0,0,1,8.91,3.7,24.33,24.33,0,0,1,9.16,11.49h0a24.49,24.49,0,0,1,1.66,8.83c0,.5,0,1-.06,1.47a2.46,2.46,0,0,1,.65-.32,2.34,2.34,0,1,1-1.1,3.75A24.56,24.56,0,0,1,55.15,49.91Z"/>
      </svg>
    </div>
  </div>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container-fluid" role="document">
      <div class="content row">
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
 <!--
      ___          ___          ___          ___         ___          ___          ___         ___          ___          ___          ___              
     /\  \        /\  \        /\  \        /\  \       /\  \        /\__\        /\  \       /\  \        /\  \        /\  \        /\  \             
    /::\  \      /::\  \      /::\  \      /::\  \     /::\  \      /::|  |      /::\  \     /::\  \      /::\  \      /::\  \      /::\  \            
   /:/\:\  \    /:/\:\  \    /:/\:\  \    /:/\:\  \   /:/\:\  \    /:|:|  |     /:/\:\  \   /:/\:\  \    /:/\ \  \    /:/\:\  \    /:/\:\  \           
  /:/  \:\  \  /::\~\:\  \  /::\~\:\  \  /::\~\:\__\ /:/  \:\  \  /:/|:|  |__  /::\~\:\__\ /::\~\:\  \  _\:\~\ \  \  /::\~\:\  \  /:/  \:\__\          
 /:/__/ \:\__\/:/\:\ \:\__\/:/\:\ \:\__\/:/\:\ \:|__/:/__/ \:\__\/:/ |:| /\__\/:/\:\ \:|__/:/\:\ \:\__\/\ \:\ \ \__\/:/\:\ \:\__\/:/__/ \:|__|         
 \:\  \  \/__/\/__\:\/:/  /\/_|::\/:/  /\:\~\:\/:/  |:\  \ /:/  /\/__|:|/:/  /\:\~\:\/:/  |/__\:\/:/  /\:\ \:\ \/__/\:\~\:\ \/__/\:\  \ /:/  /         
  \:\  \           \::/  /    |:|::/  /  \:\ \::/  / \:\  /:/  /     |:/:/  /  \:\ \::/  /     \::/  /  \:\ \:\__\   \:\ \:\__\   \:\  /:/  /          
   \:\  \          /:/  /     |:|\/__/    \:\/:/  /   \:\/:/  /      |::/  /    \:\/:/  /      /:/  /    \:\/:/  /    \:\ \/__/    \:\/:/  /           
    \:\__\        /:/  /      |:|  |       \::/__/     \::/  /       /:/  /      \::/__/      /:/  /      \::/  /      \:\__\       \::/__/            
     \___/        \___/        \___|        ~___      ___/__/        \/__/  ___   ~~     ___  \/__/        \/__/        \/__/        ~~                
     /\  \        /\  \        /\  \        /\  \    /\  \        ___      /\__\        /\  \                                                          
    /::\  \      /::\  \      /::\  \      /::\  \   \:\  \      /\  \    /:/  /       /::\  \                                                         
   /:/\:\  \    /:/\:\  \    /:/\:\  \    /:/\:\  \   \:\  \     \:\  \  /:/  /       /:/\:\  \                                                        
  /:/  \:\  \  /::\~\:\  \  /::\~\:\  \  /::\~\:\  \  /::\  \    /::\__\/:/__/  ___  /::\~\:\  \                                                       
 /:/__/ \:\__\/:/\:\ \:\__\/:/\:\ \:\__\/:/\:\ \:\__\/:/\:\__\__/:/\/__/|:|  | /\__\/:/\:\ \:\__\                                                      
 \:\  \  \/__/\/_|::\/:/  /\:\~\:\ \/__/\/__\:\/:/  /:/  \/__/\/:/  /   |:|  |/:/  /\:\~\:\ \/__/                                                      
  \:\  \         |:|::/  /  \:\ \:\__\       \::/  /:/  /    \::/__/    |:|__/:/  /  \:\ \:\__\                                                        
   \:\  \        |:|\/__/    \:\ \/__/       /:/  /\/__/      \:\__\     \::::/__/    \:\ \/__/                                                        
    \:\__\       |:|  |       \:\__\        /:/  /             \/__/      ~~~~         \:\__\                                                          
     \/__/        \|__|        \/__/        \/__/                                       \/__/                                                          

-->
  </body>
</html>
