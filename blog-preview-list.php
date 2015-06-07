
<?php if ( have_posts() ) : ?>

  <section class="section">
    <header class="section-header">
      <h2 class="section-header-title">Latest Blog Post</h2>
    </header>
    <div class="section-body">
      <ul class="blog-post-list us clearfix">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('blog', 'preview-item'); ?>
        <?php endwhile; ?>

      </ul>



    </div>
  </section>

<?php endif; ?>
