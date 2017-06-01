<section class="what-we-do">
    <div class="wrapper">
        <h2 class="heading"><?php echo (!empty(get_theme_mod("what_we_do_heading")))?get_theme_mod("what_we_do_heading"):'What We Do';?></h2>
        <p class="center"><?php echo (!empty(get_theme_mod("what_we_do_text")))?get_theme_mod("what_we_do_text"):'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore <br> eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit.';?></p>
        <div class="column">


            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
                'post_status' => 'publish',
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()):
                while ($the_query->have_posts()) : $the_query->the_post();
                $src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'full');
                    ?>
                    <div class="col-group">
                        <div class="image">
                            <a href="javascript:void(0)"><img src="<?php echo $src[0];?>" alt="icon1"></a>
                        </div>
                        <h2><a href="javascript:void(0)"><?php the_title(); ?></a></h2>
                        <p><?php the_content(); ?></p>
                    </div>
                    <?php
                endwhile;
            else:
                ?><div class="col-group"><h2>Nothing Here.</h2></div><?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>