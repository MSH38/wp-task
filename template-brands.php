<?php
/*
Template Name: Custom Template
*/
get_header();
?>

<div id="content">
    <section id="main-content">
        <div class="container">
            <h1>Brands</h1>
            <ul class="brand-list">
                <?php
                // Get all brands
                $brands = get_terms(array(
                    'taxonomy' => 'brand',
                    'hide_empty' => false,
                ));

                // Loop through each brand
                foreach ($brands as $brand) :
                    ?>
                    <li>
                        <h2><?php echo $brand->name; ?></h2>
                        <?php
                        // Display the description if available
                        if (!empty($brand->description)) {
                            echo '<p>' . $brand->description . '</p>';
                        }
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>

<?php get_footer(); ?>
