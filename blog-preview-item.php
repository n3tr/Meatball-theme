
<li class="blog-post-preview">
  <div class="inner">
    <div class="post-thumbnail-wrap">
      <a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>">

        <?php
          if ( has_post_thumbnail() ) {
          	// the_post_thumbnail(array(400, 240));
          	the_post_thumbnail("blog-thumbnail");
          }
        ?>


      </a>
    </div>
    <h3 class="post-title">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
    <p class="post-excerpt">
      <?php echo the_excerpt_max_charlength(240); ?>
    </p>
  </div>
</li>
