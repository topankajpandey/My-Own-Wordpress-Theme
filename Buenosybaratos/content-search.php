<?php

/**
 * The template part for displaying results in search pages
 */
?>
     
<div class="search-grp">
    <h2><?php echo get_the_title(); ?></h2>
    <!--a href="javascript:void(0)">www.amazon.in/Home-Kitchen/Fan </a-->
    <p><?php the_excerpt(); ?></p>
</div>
            
        

<?php /* twentyfifteen_post_thumbnail(); ?>

  <header class="entry-header">
  <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
  </header><!-- .entry-header -->

  <div class="entry-summary">
  <?php the_excerpt(); ?>
  </div><!-- .entry-summary -->

  <?php if ('post' == get_post_type()) : ?>

  <footer class="entry-footer">
  <?php twentyfifteen_entry_meta(); ?>
  <?php edit_post_link(__('Edit', 'twentyfifteen'), '<span class="edit-link">', '</span>'); ?>
  </footer><!-- .entry-footer -->

  <?php else : ?>

  <?php edit_post_link(__('Edit', 'twentyfifteen'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>

  <?php endif; */ ?>


