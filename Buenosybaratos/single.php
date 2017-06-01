<?php
/**
 * The template for displaying all single posts and attachments
 */
get_header();
?>

<section class="review">
    <div class="wrapper">

        <?php get_sidebar('review-left'); ?>
        <div class="review-mainsection">
            <?php
            while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
                if (comments_open() || get_comments_number()) :
                    //comments_template();
                endif;
            endwhile;
            ?>
        </div>

        <?php get_sidebar('review-right'); ?>

    </div>
</section>
<?php get_footer(); ?>
