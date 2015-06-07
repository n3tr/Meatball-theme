<?php
/**
 * @package meatball
 */
?>


<li id="post-<?php the_ID(); ?>" <?php post_class(""blog-post-preview""); ?>>
  <div class="inner">
    <div class="post-thumbnail-wrap">
      <a href="<?php esc_url( get_permalink() ) ?>">

      </a>
    </div>
    <?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

  </div>
</li>
<article id="post-<?php the_ID(); ?>" >
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php meatball_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'meatball' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'meatball' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php meatball_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
