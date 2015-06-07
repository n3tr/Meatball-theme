<?php
    // Get the ID of a given category
    $category = get_the_category()[0];

    // Get the URL of this category
    $category_link = get_category_link( $category->cat_ID );
?>


<article id="post-<?php the_ID(); ?>"  <?php post_class('blog-post single'); ?>>
  <div class="post-header clearfix">
    <h2 class="post-title"><?php the_title() ?></h2>
    <div class="post-meta clearfix">
      <time class="post-time" datetime="<?php the_time('c');  ?>">
        <span class="date"><?php the_time('j');?></span>
        <span class="month"><?php the_time('M');?></span>
        <span class="year"><?php the_time('Y');?></span>
      </time>
      <a href="<?php echo $category_link; ?>" class="post-category">Development</a>
    </div>
  </div>
  <div class="post-hero-image">
    <?php
      if ( has_post_thumbnail() ) {
      	the_post_thumbnail();
      }
    ?>
  </div>
  <div class="post-content">
    <?php the_content(); ?>
  </div>

  <section class="section">
    <header class="section-header">
      <h2 class="section-header-title center">Comments</h2>
    </header>
    <div class="blog-comments">
      <div class="fb-comments" data-href="<?php get_permalink(); ?>" data-width="720px" data-numposts="5" data-colorscheme="light"></div>
    </div>
  </section>
</article>
