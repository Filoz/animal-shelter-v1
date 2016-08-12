<?php

/*
 * Registering Animal custom post type
 */
function ansh_register_animals_post() {

    $labels = array(
        'name'                  => _x( 'Animals', 'post type general name', ANSH_TEXT_DOMAIN ),
        'singular_name'         => _x( 'Animal', 'post type singular name', ANSH_TEXT_DOMAIN ),
        'menu_name'             => _x( 'Shelter', 'admin menu name', ANSH_TEXT_DOMAIN ),
        'name_admin_bar'        => _x( 'Animal', 'add new on admin bar', ANSH_TEXT_DOMAIN ),
        'add_new'               => _x( 'Add New', 'add new (animal)', ANSH_TEXT_DOMAIN ),
        'add_new_item'  		=> __('Add New Animal', ANSH_TEXT_DOMAIN),
        'new_item'	      	 	=> __('New Animal', ANSH_TEXT_DOMAIN),
        'edit_item'	        	=> __('Edit Animal', ANSH_TEXT_DOMAIN),
        'view_item' 			=> __('View Animal', ANSH_TEXT_DOMAIN),
        'all_items'             => __('All Animals', ANSH_TEXT_DOMAIN),
        'search_term'   		=> __('Search Animals', ANSH_TEXT_DOMAIN),
        'parent_item_colon' 	=> __('Parent Animal:', ANSH_TEXT_DOMAIN),
        'not_found' 			=> __('No animals found.', ANSH_TEXT_DOMAIN),
        'not_found_in_trash' 	=> _x('No posts found in Trash.', 'posts about animals', ANSH_TEXT_DOMAIN),
    );

    $capabilities = array(
        'publish_posts'             => 'publish_ansh_animals',
        'edit_posts'                => 'edit_ansh_animals',
        'edit_others_posts'         => 'edit_others_ansh_animals',
        'edit_published_posts'      => 'edit_published_ansh_animals',
        'delete_posts'              => 'delete_ansh_animals',
        'delete_others_posts'       => 'delete_others_ansh_animals',
        'delete_published_posts'    => 'delete_published_ansh_animals',
        'read_private_posts'        => 'read_private_ansh_animals',
        'edit_post'                 => 'edit_ansh_animal',
        'delete_post'               => 'delete_ansh_animal',
        'read_post'                 => 'read_ansh_animal'
    );

    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'comments',
        'revisions',
    );

    $rewrite = array(
        'slug'=> _x('animals', 'URL slug for the main page', ANSH_TEXT_DOMAIN),
        'with_front'=> true,
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'show_in_nav_menus'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home',
        'can_export'            => true,
        'delete_with_user'      => false,
        'hierarchical'          => false,
        'has_archive'           => true,
        'query_var'             => true,
        'capabilities'          => $capabilities,
        'map_meta_cap'          => true,
        'rewrite'               => $rewrite,
        'supports'              => $supports
    );
    register_post_type( 'ansh_animal', $args );
}
add_action('init', 'ansh_register_animals_post', 9);

/*
 * Registering taxonomies for Animal custom post
 */
function ansh_create_animals_taxonomies() {

    // Species taxonomy
    $labels = array(
        'name' => __( 'Species', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Species', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Species', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Species', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Species', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Species', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Species:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Species', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Species', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Species', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Species', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate species with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove species', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used species', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Species', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => __('species', ANSH_TEXT_DOMAIN)),
        'query_var' => true,
    );
    register_taxonomy( 'ansh_species', array('ansh_animal'), $args );

    // Breed taxonomy
    $labels = array(
        'name' => __( 'Breed', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Breed', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Breeds', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Breeds', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Breeds', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Breed', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Breed:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Breeds', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Breed', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Breed', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Breed', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate Breeds with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove Breeds', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used Breeds', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Breed', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => __('breed', ANSH_TEXT_DOMAIN)),
        'query_var' => true
    );
    register_taxonomy( 'ansh_breed', array('ansh_animal'), $args );

    // Sex taxonomy
    $labels = array(
        'name' => __( 'Sex', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Sex', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Sexes', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Sexes', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Sexes', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Sex', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Sex:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Sex', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Sex', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Sex', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Sex', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate Sexes with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove Sexes', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used Sexes', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Sex', ANSH_TEXT_DOMAIN ),
    );
    $args = array(

        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => __('sex', ANSH_TEXT_DOMAIN)),
        'query_var' => true,
    );
    register_taxonomy( 'ansh_sex', array('ansh_animal'), $args );

    // Age taxonomy
    $labels = array(
        'name' => __( 'Age', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Age', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Ages', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Ages', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Ages', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Age', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Age:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Age', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Age', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Age', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Age', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate Ages with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove Ages', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used Ages', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Age', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => __('age', ANSH_TEXT_DOMAIN)),
        'query_var' => true
    );
    register_taxonomy( 'ansh_age', array('ansh_animal'), $args );

    // Special Needs taxonomy
    $labels = array(
        'name' => __( 'Special Needs', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Special Needs', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Special Needs', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Special Needs', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Special Needs', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Special Needs', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Special Needs:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Special Needs', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Special Needs', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Special Needs', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Special Needs', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate Special Needs options with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove Special Needs', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used Special Needs', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Special Need', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => _x('special-needs', 'url slug', ANSH_TEXT_DOMAIN)),
        'query_var' => true
    );
    register_taxonomy( 'ansh_special_needs', array('ansh_animal'), $args );

    // Rehoming Status taxonomy
    $labels = array(
        'name' => __( 'Rehoming Status', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Rehoming Status', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Rehoming Status', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Rehoming Status', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Rehoming Status', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Rehoming Status', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Rehoming Status:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Rehoming Status', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Rehoming Status', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Rehoming Status', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Rehoming Status', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate rehoming status with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove rehoming status', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used rehoming status', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Rehoming Status', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'rehoming-status'),
        'query_var' => true,
    );
    register_taxonomy( 'ansh_rehoming_status', array('ansh_animal'), $args );

    // Owner taxonomy
    $labels = array(
        'name' => __( 'Owners', ANSH_TEXT_DOMAIN ),
        'singular_name' => __( 'Owner', ANSH_TEXT_DOMAIN ),
        'search_items' => __( 'Search Owners', ANSH_TEXT_DOMAIN ),
        'popular_items' => __( 'Popular Owners', ANSH_TEXT_DOMAIN ),
        'all_items' => __( 'All Owners', ANSH_TEXT_DOMAIN ),
        'parent_item' => __( 'Parent Owner', ANSH_TEXT_DOMAIN ),
        'parent_item_colon' => __( 'Parent Owner:', ANSH_TEXT_DOMAIN ),
        'edit_item' => __( 'Edit Owner', ANSH_TEXT_DOMAIN ),
        'update_item' => __( 'Update Owner', ANSH_TEXT_DOMAIN ),
        'add_new_item' => __( 'Add New Owner', ANSH_TEXT_DOMAIN ),
        'new_item_name' => __( 'New Owner', ANSH_TEXT_DOMAIN ),
        'separate_items_with_commas' => __( 'Separate owners with commas', ANSH_TEXT_DOMAIN ),
        'add_or_remove_items' => __( 'Add or remove owner', ANSH_TEXT_DOMAIN ),
        'choose_from_most_used' => __( 'Choose from the most used owners', ANSH_TEXT_DOMAIN ),
        'menu_name' => __( 'Owner', ANSH_TEXT_DOMAIN ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => __('owner', ANSH_TEXT_DOMAIN)),
        'query_var' => true
    );
    register_taxonomy( 'ansh_owner', array('ansh_animal'), $args );
}
add_action( 'init', 'ansh_create_animals_taxonomies');

/*
 * Creating default taxonomy values
 */
function ansh_create_mandatory_taxonomies_defaults() {

    /*
     * Sex defaults
     */
    if (!term_exists(__('Female', ANSH_TEXT_DOMAIN), 'ansh_sex'))
        wp_insert_term(__('Female', ANSH_TEXT_DOMAIN), 'ansh_sex');
    if (!term_exists(__('Male', ANSH_TEXT_DOMAIN), 'ansh_sex'))
        wp_insert_term(__('Male', ANSH_TEXT_DOMAIN), 'ansh_sex');

    /*
     * Rehoming Default
     */
    if (!term_exists(__('Adopted', ANSH_TEXT_DOMAIN), 'ansh_rehoming_status'))
        wp_insert_term(__('Adopted', ANSH_TEXT_DOMAIN), 'ansh_rehoming_status');
}
add_action( 'registered_taxonomy', 'ansh_create_mandatory_taxonomies_defaults');

function ansh_create_taxonomies_defaults() {

    /*
     * Age defaults
     */
    if(get_option( 'ansh_age_defaults', 'no' ) === 'yes') {

        if (!term_exists(__('Puppy', ANSH_TEXT_DOMAIN), 'ansh_age'))
            wp_insert_term(__('Puppy', ANSH_TEXT_DOMAIN), 'ansh_age');
        if (!term_exists(__('Young', ANSH_TEXT_DOMAIN), 'ansh_age'))
            wp_insert_term(__('Young', ANSH_TEXT_DOMAIN), 'ansh_age');
        if (!term_exists(__('Adult', ANSH_TEXT_DOMAIN), 'ansh_age'))
            wp_insert_term(__('Adult', ANSH_TEXT_DOMAIN), 'ansh_age');
        if (!term_exists(__('Old', ANSH_TEXT_DOMAIN), 'ansh_age'))
            wp_insert_term(__('Old', ANSH_TEXT_DOMAIN), 'ansh_age');
    }
}
add_action( 'add_option', 'ansh_create_taxonomies_defaults');

/*
 * Enable comments by default
 */
function ansh_default_comments_on() {
    update_option('default_comment_status', 'open');
}
add_filter( 'update_option', 'ansh_default_comments_on' );
