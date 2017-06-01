<section class="who-we-are" style="background-image:url('<?php echo (!empty(get_theme_mod("who_we_are_background")))?get_theme_mod("who_we_are_background"):content_url('/uploads/2017/05/who-we-are.jpg');?>')">
    <div class="right-section">
        <h2><?php echo (!empty(get_theme_mod("who_we_are_heading")))?get_theme_mod("who_we_are_heading"):'Who we are';?></h2>
        <ul><?php echo (!empty(get_theme_mod("who_we_are_text")))?get_theme_mod("who_we_are_text"):'<li>Numero 1.</li><li>Numero 2.</li><li>Numero 3. </li><li>Numero 4.</li>';?></ul>
    </div>
</section>


<section class="consumers-served">
    <div class="wrapper">
        <?php
        if (is_active_sidebar('consumers-served')):
            dynamic_sidebar('consumers-served');
        else:
            echo '<h2 class="heading">Consumers Served</h2>
                        <p class="red">103,243,801</p>
                        <div class="served-details">
                            <div class="served-details-img">
                                 <img src="' . get_stylesheet_directory_uri() . '/images/customer-served.jpg" alt="customer">
                            </div>
                            <div class="served-details-text">
                                <h3>Our research and testing helps millions <br> of consumers find the best products.</h3>
                                <p>Nam liber tempor csoluta nobis eleifnd option congue nihil imperdiet doming iquod mazim placerat facer possim assum lorem ipsum dolor possim assum lorem ipsum dolor.</p>
                                <a class="view-all" href="javascript:void(0)">View all categories</a>
                            </div>
                        </div>';
        endif;
        ?>
    </div>
</section>


