<?php
/*
 * The main template file
 * Created On: 12.05.2017
 * Created By: T:307  
 */

get_header(); ?>


<?php get_template_part( 'templates/home/content', 'whatwedo');?>
<?php get_template_part( 'templates/home/content', 'home');?>
<?php get_template_part( 'templates/home/content', 'top-products');?>

<?php get_footer(); ?>
