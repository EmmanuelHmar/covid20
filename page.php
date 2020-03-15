<?php get_header(); ?>

<div class="row">
    <div class="col-sm-12">
        <?php if (have_posts()): while (have_posts()): the_post();
        // the_content(); 
        get_template_part('content',get_post_type());
endwhile; 
endif;?>
     </div> <!--/.col -->
</div> <!--/.row -->
<?php get_footer() ?>