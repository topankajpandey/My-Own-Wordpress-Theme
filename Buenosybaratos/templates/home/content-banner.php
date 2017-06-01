<?php if (is_home() || is_front_page()): ?>
    
    <?php
        if(get_background_image()){
            $style = "background-image:url('".get_background_image()."');";
        }else{
            $background = content_url('/uploads/2017/05/banner-img.jpg');
            $style = "background-image:url(".$background.");";
        }
        
    ?>
    <section class="banner" style="<?php echo $style;?>">
        <div class="wrapper">
            <div class="banner-main">
                <div class="banner-area">
                    <h2><?php echo (!empty(get_theme_mod("home_bkg_uper_text")))?get_theme_mod("home_bkg_uper_text"):'Vero eros et accumsan et iusto odio dignissim qui blandit';?></h2>
                    <?php //echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                    <form class="search-form" role="search" method="get" action="<?php echo site_url(); ?>">
                        <input name="s" value="<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>" onfocus="if (this.value == '<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>')this.value = '';" onblur="if (this.value == '')this.value = '<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>';" type="text"> 
                        <button class="btn-danger" type="submit"><?php echo get_theme_mod("home_search_level");?></button>
                    </form>
                    <p><?php echo (!empty(get_theme_mod("home_bkg_bottom_text")))?get_theme_mod("home_bkg_bottom_text"):'Necessitatibus saepe eveniet ut et voluptates repudiandae sint et.Itaque earum rerum hic tenetur a sapiente.';?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>