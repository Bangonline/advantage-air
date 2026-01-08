<?php
/**
 * Template part for displaying the top navigation bar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bang_Digital
 */

?>

<section class="top-nav">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'top-menu',
            'menu_id' => 'top-menu',
            'container' => 'nav', // You can change this to any HTML element you prefer
            'container_class' => 'top-menu-class', // Add your custom class if needed
            'menu_class' => 'top-menu', // Add your custom menu class if needed
        )
    );
    ?>
</section>