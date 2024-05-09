<?php

    function store_style() {
        wp_enqueue_style( 'font-awesome', 'cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );
        wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'store_main_styles', get_stylesheet_uri() );
    }
    add_action( 'wp_enqueue_scripts', 'store_style' );

    function custom_post_type_phones() {
        $labels = array(
            'name'               => _x( 'Phones', 'post type general name' ),
            'singular_name'      => _x( 'Phone', 'post type singular name' ),
            'menu_name'          => _x( 'Phones', 'admin menu' ),
            'name_admin_bar'     => _x( 'Phone', 'add new on admin bar' ),
            'add_new'            => _x( 'Add New', 'phone' ),
            'add_new_item'       => __( 'Add New Phone' ),
            'new_item'           => __( 'New Phone' ),
            'edit_item'          => __( 'Edit Phone' ),
            'view_item'          => __( 'View Phone' ),
            'all_items'          => __( 'All Phones' ),
            'search_items'       => __( 'Search Phones' ),
            'parent_item_colon'  => __( 'Parent Phones:' ),
            'not_found'          => __( 'No phones found.' ),
            'not_found_in_trash' => __( 'No phones found in Trash.' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'phone' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        );

        register_post_type( 'phone', $args );
    }
    add_action( 'init', 'custom_post_type_phones' );

    function custom_taxonomy_brands() {
        $labels = array(
            'name'              => _x( 'Brands', 'taxonomy general name' ),
            'singular_name'     => _x( 'Brand', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Brands' ),
            'all_items'         => __( 'All Brands' ),
            'parent_item'       => __( 'Parent Brand' ),
            'parent_item_colon' => __( 'Parent Brand:' ),
            'edit_item'         => __( 'Edit Brand' ),
            'update_item'       => __( 'Update Brand' ),
            'add_new_item'      => __( 'Add New Brand' ),
            'new_item_name'     => __( 'New Brand Name' ),
            'menu_name'         => __( 'Brand' ),
        );
    
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'brand' ),
        );
    
        register_taxonomy( 'brand', array( 'phone' ), $args );
    }
    add_action( 'init', 'custom_taxonomy_brands' );

    function custom_meta_box_phone_details() {
        add_meta_box(
            'phone_details',
            __( 'Phone Details', 'textdomain' ),
            'custom_meta_box_phone_details_callback',
            'phone',
            'normal',
            'default'
        );
    }
    add_action( 'add_meta_boxes', 'custom_meta_box_phone_details' );
    
    function custom_meta_box_phone_details_callback( $post ) {
        wp_nonce_field( 'custom_meta_box_phone_details', 'custom_meta_box_nonce' );
    
        $brand = get_post_meta( $post->ID, '_phone_brand', true );
        $release_date = get_post_meta( $post->ID, '_phone_release_date', true );
    
        // Get all brands
        $brands = get_terms( array(
            'taxonomy' => 'brand',
            'hide_empty' => false,
        ) );
    
        echo '<label for="phone_brand">' . __( 'Brand', 'textdomain' ) . '</label>';
        echo '<select id="phone_brand" name="phone_brand">';
        echo '<option value="">Select Brand</option>';
        foreach ( $brands as $brand_item ) {
            $selected = ( $brand == $brand_item->term_id ) ? 'selected' : '';
            echo '<option value="' . $brand_item->term_id . '" ' . $selected . '>' . $brand_item->name . '</option>';
        }
        echo '</select><br>';
    
        echo '<label for="phone_release_date">' . __( 'Release Date', 'textdomain' ) . '</label>';
        echo '<input type="text" id="phone_release_date" name="phone_release_date" value="' . esc_attr( $release_date ) . '" />';
    }
    
    function custom_meta_box_phone_details_save( $post_id ) {
        if ( ! isset( $_POST['custom_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['custom_meta_box_nonce'], 'custom_meta_box_phone_details' ) ) {
            return;
        }
    
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
    
        if ( isset( $_POST['phone_brand'] ) ) {
            update_post_meta( $post_id, '_phone_brand', sanitize_text_field( $_POST['phone_brand'] ) );
        }
    
        if ( isset( $_POST['phone_release_date'] ) ) {
            update_post_meta( $post_id, '_phone_release_date', sanitize_text_field( $_POST['phone_release_date'] ) );
        }
    }
    add_action( 'save_post', 'custom_meta_box_phone_details_save' );