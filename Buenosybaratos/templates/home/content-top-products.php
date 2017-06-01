<section class="top-products">
    <div class="wrapper">
        <h2 class="heading"><?php echo (!empty(get_theme_mod("top_product_heading")))?get_theme_mod("top_product_heading"):'View our Top Products';?></h2>
        <p class="center"><?php echo (!empty(get_theme_mod("top_product_text")))?get_theme_mod("top_product_text"):'Our experts analyze products across dozens of categories. <br>Click below to get started.';?></p>

        <div class="products">
            <?php
            $args = array(
                'post_type' => 'bue-products',
                'posts_per_page' => 8,
                'order' => 'ASC',
                'orderby' => 'date',
                'post_status' => 'publish',
            );

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()):
                while ($the_query->have_posts()) : $the_query->the_post();
                    $src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');
                    $beu_type1 = get_post_meta($post->ID, 'beu_type_1', true);
                    $beu_type2 = get_post_meta($post->ID, 'beu_type_2', true);
                    $beu_type3 = get_post_meta($post->ID, 'beu_type_3', true);

                    $beu_type_link_1 = get_post_meta($post->ID, 'beu_type_link_1', true);
                    $beu_type_link_2 = get_post_meta($post->ID, 'beu_type_link_2', true);
                    $beu_type_link_3 = get_post_meta($post->ID, 'beu_type_link_3', true);

                    $bea_read_more_lebel = get_post_meta($post->ID, 'bea_read_more_lebel', true);
                    $bea_read_more_link = get_post_meta($post->ID, 'bea_read_more_link', true);
                    ?>

                    <div class="p-grp">
                        <div class="p-img">
                            <img src="<?php echo $src[0]; ?>" alt="<?php echo $src[0]; ?>">
                        </div>
                        <h2><?php the_title(); ?></h2>
                        <ul>
                            <li><a href="<?php echo $beu_type_link_1; ?>"><?php echo $beu_type1; ?></a></li>
                            <li><a href="<?php echo $beu_type_link_2; ?>"><?php echo $beu_type2; ?></a></li>
                            <li><a href="<?php echo $beu_type_link_3; ?>"><?php echo $beu_type3; ?></a></li>
                        </ul>
                        <a class="viewall" href="<?php echo $bea_read_more_link; ?>"><?php echo $bea_read_more_lebel; ?></a>
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
