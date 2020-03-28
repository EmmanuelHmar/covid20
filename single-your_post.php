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

        <!-- The contents of Your Post -->
<!-- 
         echo '<pre>', var_dump(), '</pre>';
        die(); -->

        <h1>Title</h1>
        <?php the_title(); ?>

        <h2>Text Input</h2>
        <?php echo $meta['text']; ?>

        <h2>Textarea</h2>
        <?php echo $meta['textarea']; ?>

        <h2>Checkbox</h2>
        <?php if ($meta['checkbox'] === 'checkbox'){?>
        Checkbox is checked <?php
        } else { ?>
        Checkbox is UNchecked
            <?php 
        } ?>

        <h2>Select</h2>
        <p>the actual select value selected</p>
        <?php 
        switch ($meta['select']) {
            case 'option-one':
            echo 'Option One';
            break;
            case 'option-two':
            echo 'Option Two';
            break;
            default:
            echo 'no option selected';
            break;
        }
        ?>

        <h2>The Image</h2>
        <img src="<?php echo $meta['image']; ?>">



        <h1>The Content</h1>
        <?php the_content(); ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>
        
        <!-- if (have_posts()): while (have_posts()): the_post();
        // the_content(); 
        get_template_part('content',get_post_type());
endwhile; 
endif;?> -->
     </div> <!--/.col -->
</div> <!--/.row -->
<?php get_footer(); ?>