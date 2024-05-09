<?php get_header(); ?>

<div id="content" class="text-center">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <div class="entry">
                    <?php
                    $phone_brand_id = get_post_meta( get_the_ID(), '_phone_brand', true );
                    $phone_brand = get_post( $phone_brand_id );
                    $phone_release_date = get_post_meta( get_the_ID(), '_phone_release_date', true );
                    echo '<p>Release Date: ' . $phone_release_date . '</p>';
                    ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
