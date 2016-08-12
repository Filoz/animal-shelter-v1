<?php

/*
 * Add Animal Author role
 */
function ansh_add_roles() {

    add_role( 'ansh_animal_author', _x('Animal Author', 'name for the user role', ANSH_TEXT_DOMAIN), array(
        'read'                          => true,
        'upload_files'                  => true,
        'publish_ansh_animals'          => true,
        'edit_published_ansh_animals'   => true,
        'delete_published_ansh_animals' => true,
        'edit_ansh_animals'             => true,
        'delete_ansh_animals'           => true,
        'read_ansh_animal'              => true,
    ) );

    add_role( 'ansh_shelter_author', _x('Shelter Author', 'name for the user role', ANSH_TEXT_DOMAIN), array(
        'read'                          => true,
        'upload_files'                  => true,
        'publish_ansh_animals'          => true,
        'edit_published_ansh_animals'   => true,
        'delete_published_ansh_animals' => true,
        'edit_ansh_animals'             => true,
        'delete_ansh_animals'           => true,
        'read_ansh_animal'              => true,
        'publish_posts'                 => true,
        'create_posts'                  => true,
        'delete_posts'                  => true,
        'edit_posts'                    => true,
        'manage_categories'             => true,
        'edit_published_posts'          => true,
        'delete_published_posts'        => true,
    ) );

    ansh_update_admin_capabilities();
}

/*
 * Give admins new capabilities for managing all the Animal Custom Posts
 */
function ansh_update_admin_capabilities() {

    $administrator = get_role('administrator');

    $administrator->add_cap( 'publish_ansh_animals' );
    $administrator->add_cap( 'read_ansh_animals' );
    $administrator->add_cap( 'edit_ansh_animals' );
    $administrator->add_cap( 'edit_published_ansh_animals' );
    $administrator->add_cap( 'edit_others_ansh_animals' );
    $administrator->add_cap( 'delete_ansh_animals' );
    $administrator->add_cap( 'delete_published_ansh_animals' );
    $administrator->add_cap( 'delete_others_ansh_animals' );
    $administrator->add_cap( 'read_private_ansh_animals' );
}


/*
 * Remove Animal Author role on explicit ask
 */
function ansh_remove_roles() {

    remove_role('animal_author');
    remove_role('shelter_author');
}
