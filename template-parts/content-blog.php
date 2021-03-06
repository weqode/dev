<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header bit-25">
		<?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
            the_post_thumbnail();
        else :
                    ?>

					<?php
            the_post_thumbnail('thumbnail');
                        ?>


						<?php

        endif;

        if ('post' === get_post_type()) : ?>
		<div class="entry-meta ">

		</div><!-- .entry-meta -->
		<?php
        endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content bit-75 cs-blog-archive-content">
  	<?php
            the_title('<h2 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>'); ?>

		<?php
            the_content(sprintf(
                /* translators: %s: Name of current post. */
                wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'wq'), array('span' => array('class' => array()))),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">'.esc_html__('Pages:', 'wq'),
                'after' => '</div>',
            ));
        ?>
        <?php wq_posted_on(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wq_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
