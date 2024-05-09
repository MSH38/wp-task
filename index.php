<?php get_header(); ?>

<div id="content">
    <?php
    $phones_query = new WP_Query( array(
        'post_type' => 'phone',
        'posts_per_page' => -1, // Display all posts
    ) );

    if ( $phones_query->have_posts() ) :
        while( $phones_query->have_posts() ) : $phones_query->the_post();
            ?>
            <div class="container text-center">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_content(); ?>
                <?php
                // Display brand image
                $brand_terms = wp_get_post_terms( get_the_ID(), 'brand' );
                if (!empty($brand_terms)) {
                    $brand = $brand_terms[0]; // Get the first brand term
                    ?>
                    <img src="<?php echo get_field('brand_image', $brand); ?>" alt="<?php echo $brand->name; ?>" />
                    <?php
                }
                ?>
                <hr>
            </div>
        <?php endwhile;
        wp_reset_postdata(); // Reset the post data
    else : ?>
        <p><?php _e( 'Sorry, no phones found.' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
