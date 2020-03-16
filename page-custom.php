<?php get_header(); ?>

<div class="row">
    <div class="col-sm-12">
        <?php
        $args = array(
            'post_type' => 'my-custom-post',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $custom_query = new WP_Query($args);
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

            <div class="blog-post">
                <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <? the_excerpt(); ?>
            <? endwhile; ?>
            </div>
            </div>
            <!--/.col -->
    </div>
    <!--/.row -->
    <?php get_footer() ?>