<?php get_header(); ?>

<div class="row">
  <div class="col-sm-8 blog-main">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        get_template_part('content', get_post_type());
      endwhile;
    endif; ?>

<nav>
    <ul class="pager">
      <li><a href="#">Previous</a></li>
      <li><a href="#">Next</a></li>
    </ul>
  </nav>

  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>