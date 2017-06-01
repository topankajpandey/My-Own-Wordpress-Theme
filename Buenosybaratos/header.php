<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <link type="text/css" rel="styleheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/jquery.bxslider.css">
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/custom.js"></script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
        <div class="nav-outer">
		<?php wp_nav_menu(array('theme_location'=>'primary', 'container' => false)); ?>
	</div>
        
        <div class="container main-div">
            <header>
                <div class="wrapper">
                    <div class="logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <?php if(get_header_image()):?>
                            <img src="<?php echo get_header_image(); ?>" alt="logo">
                            <?php else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="logo">
                            <?php endif;?>
                        </a>
                    </div>

                    <div class="menu">
                        <a href="javascript:void(0)" id="navTrigger">
                            <span><i class="fa fa-bars" aria-hidden="true"></i></span>Menu
                        </a>
                        <!--div id="myNav" class="overlay">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="overlay-content">
                                <div class="wrapper">
                                    <?php wp_nav_menu(array('theme_location'=>'primary')); ?>
                                </div>
                            </div>
                        </div-->
                    </div>
                </div>
            </header>	

            <?php get_template_part( 'templates/home/content', 'banner');?>
            <?php content_url('/uploads/2017/05/banner-img.jpg');?>