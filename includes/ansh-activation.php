<?php

function ansh_install() {

    // Trigger our function that registers the custom post type
    
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();

}
register_activation_hook( plugin_dir_path(__FILE__).'../animal-shelter.php', 'ansh_install' );
