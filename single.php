<?php get_header(); ?>

<div id="content" class="text-center">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <div class="entry">
                    <?php
                    // Get the phone's brand and image
                    $phone_brand = get_post_meta( get_the_ID(), '_phone_brand', true );
                    $phone_brand_image = get_field('brand_image', 'brand_'.$phone_brand);
                    
                    // Display the phone's brand and image
                    if ($phone_brand_image) {
                        echo '<img src="' . esc_url($phone_brand_image) . '" alt="' . get_the_title($phone_brand) . '" />';
                    }
                    echo '<p>Brand: ' . get_the_title($phone_brand) . '</p>';
                    ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
