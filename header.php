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
                <ul class="navbar-nav d-flex flex-row me-1 text-">
                    <li><a class="nav-link text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a class="nav-link text-white" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a></li>
                    <li><a class="nav-link text-white" href="<?php echo esc_url( home_url( '/brands/' ) ); ?>">Brands</a></li>
                </ul>
            </div>
        </nav>

    </header>
    
