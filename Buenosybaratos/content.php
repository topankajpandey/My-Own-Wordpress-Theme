<?php

/*
 * The default template for displaying content
 */

global $post;

if (is_single()) :
    the_title('<h2 class="bg blue">', '</h2>');
else :
    the_title(sprintf('<h2 class="bg blue"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
endif;

echo '<div id="product-recomend" class="product-recomend main-content-section">';
echo the_content();
echo '</div>';

$fb_comment_url =  get_home_url().'/'.$post->post_name.'/';
echo '<div class="bg-white comment-section">';
echo do_shortcode('[fbcomments url="'.$fb_comment_url.'" width="652" count="off" num="5" countmsg="wonderful comments!"]');
echo '</div>';


        
        