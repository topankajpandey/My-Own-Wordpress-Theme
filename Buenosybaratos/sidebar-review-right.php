<?php global $post; ?>
<div class="right-sidebar">

    <?php
    if (get_post_meta($post->ID, 'related_article_status', true)):
        $get_related_article = (!empty(get_theme_mod("related_articles"))) ? get_theme_mod("related_articles") : 'Related articles';
        $post_related_article = post_related_article($post->ID);
        $related_article = '<div class="related-articles">
			<h2 class="bg red">' . $get_related_article . '</h2>
			<ul>' . $post_related_article . '</ul>
		</div>';
    endif;
    ?>

    <?php
    if (get_post_meta($post->ID, 'top_product_status', true)):
        $top_products_heading = (!empty(get_theme_mod("top_products"))) ? get_theme_mod("top_products") : 'Top Products';
        $post_top_product = post_top_product($post->ID);
        $top_products = '<div class="top-products">
			<h2 class="bg purple">' . $top_products_heading . '</h2>
			<ul>' . $post_top_product . '</ul>
		</div>';
    endif;
    ?>

    <?php
    if (get_post_meta($post->ID, 'specs_status', true)):
        $important_specs = '<div class="important-specs">
        ' . get_template_part('templates/post/content', 'important-specs') . '
         </div>';
    endif;
    ?>

    <?php
    if (get_post_meta($post->ID, 'we_work_status', true)):
        $how_we_work = '<div class="how-we-works">
         ' . get_template_part('templates/post/content', 'how-we-work') . '
         </div>';
    endif;
    ?>

    <?php
    $order_elements_value = get_post_meta($post->ID, 'order_elements_data', true);
    $serialize_order_elements = maybe_unserialize($order_elements_value);
    if (!empty($serialize_order_elements)) {
        foreach ($serialize_order_elements as $key => $value) {
            echo $$value;
        }
    }
    ?>
</div>