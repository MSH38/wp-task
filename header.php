<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>">Iphone Store</a>

                <ul class="navbar-nav d-flex flex-row me-1">
                    <!-- <?php   
                        $pages_query = new WP_Query( array( 'post_type' => 'page' ) );
                        if ( $pages_query->have_posts() ) {
                            while ( $pages_query->have_posts() ) {
                                $pages_query->the_post();
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?> -->
                    <li class="nav-item">
                                    <a class="nav-link text-white" href="<?php the_permalink('/brands'); ?>"> Brands</a>
                                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i> Profile </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">My account</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo wp_logout_url( home_url() ); ?>">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    
