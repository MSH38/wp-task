<?php
/*
Template Name: Brands
*/
get_header();
?>

<div id="content" class="container">
    <?php
    // Get all brands
    $brands = get_terms( array(
        'taxonomy' => 'brand',
        'hide_empty' => false,
    ) );

    // Loop through each brand
    foreach ( $brands as $brand ) :
        ?>
        <div class="brand">
            <h2><?php echo $brand->name; ?></h2>
            <ul class="products">
                <?php
                // Query products for the current brand
                $products_query = new WP_Query( array(
                    'post_type' => 'phone',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'brand',
                            'field' => 'slug',
                            'terms' => $brand->slug,
                        ),
                    ),
                ) );

                // Loop through products for the current brand
                while ( $products_query->have_posts() ) : $products_query->the_post();
                    ?>
                    <li><?php the_title(); ?></li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<?php get_footer(); ?>

