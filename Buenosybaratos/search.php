<?php
/**
 * The template for displaying search results pages.
 */
get_header();
?>

<section class="banner search-page">
    <div class="wrapper">
        <div class="banner-main">
            <div class="banner-area">
                <form class="search-form" role="search" method="get" action="<?php echo site_url(); ?>">
                        <input name="s" value="<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>" onfocus="if (this.value == '<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>')this.value = '';" onblur="if (this.value == '')this.value = '<?php echo (!empty(get_theme_mod("home_search_placeholder")))?get_theme_mod("home_search_placeholder"):'Eg electric toothbrush , fitness bracelet';?>';" type="text"> 
                        <button class="btn-danger" type="submit"><?php echo get_theme_mod("home_search_level");?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="search-result">
    <div class="wrapper">
        <div class="search-top">
            <div class="search-links">
                <ul>
                    <li><a class="active" href="javascript:void(0)">All</a></li>
                    <li><a href="javascript:void(0)">Images</a></li>
                    <li><a href="javascript:void(0)">Videos</a></li>
                </ul>
            </div>
            <p><?php 
            $search_result_for = (!empty(get_theme_mod("search_result_for")))?get_theme_mod("search_result_for"):'Search Results for';
            printf(__($search_result_for.': %s', 'buenosybaratos'), get_search_query()); 
            ?></p>
        </div>
        <div class="search-result-main">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('content', 'search');
                endwhile;
            else :
                get_template_part('content', 'none');
            endif;
            ?>
            <div class="pagination">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
