<?php get_header(); ?>

<div class="row">
    <div class="col-sm-12">
        <?php 
        
        $args = array(
            'post_type' => 'your_post',
        );
        $loop = new WP_Query($args);

        if ($loop -> have_posts()) : while($loop -> have_posts()): $loop -> the_post();
        $meta = get_post_meta($post->ID, 'your_fields', true); ?>

<h1>Title - page.php</h1>
    <?php the_title(); ?>

    <h1>Content</h1>
    <?php the_content(); 
        
        // if (have_posts()): while (have_posts()): the_post();
        // // the_content(); 
        // get_template_part('content',get_post_type())

endwhile; 
endif;
wp_reset_postdata();?>
     </div> <!--/.col -->
</div> <!--/.row -->
<?php get_footer(); ?>