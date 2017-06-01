<footer>
    <div class="wrapper">
        <div class="footer-grp first-col">
            <div class="footer-logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo (!empty(get_theme_mod("footer_logo")))?get_theme_mod("footer_logo"):get_bloginfo('template_directory').'/images/logo-footer.png';?>">
                </a>
            </div>
            <p><?php echo (!empty(get_theme_mod("footer_about_text")))?get_theme_mod("footer_about_text"):'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labo-rum. Sed ut perspiciatis unde.';?></p>
            
            <div class="social-icon">
                <ul>
                    <li class="fb"><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="twi"><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="flickr"><a href="javascript:void(0)"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                    <li class="lin"><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>	
        </div>

        <div class="footer-grp second-col">
            <h2>Company</h2>
            <?php wp_nav_menu(array('menu' => 'companies_left', 'container' => false, 'menu_class' => false)); ?>
            <?php wp_nav_menu(array('menu' => 'companies_right', 'container' => false, 'menu_class' => 'r-side')); ?>
        </div>

        <div class="footer-grp third-col">
            <h2>Categories</h2>
            <?php wp_nav_menu(array('menu' => 'category_left', 'container' => false, 'menu_class' => false)); ?>
            <?php wp_nav_menu(array('menu' => 'category_right', 'container' => false, 'menu_class' => 'r-side')); ?>
        </div>
    </div>

    <div class="copyright">
        <div class="wrapper">
            <p><?php echo get_bloginfo(); ?> &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

