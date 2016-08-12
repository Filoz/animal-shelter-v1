<?php

function ansh_deactivate() {

    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();

}
register_deactivation_hook( plugin_dir_path(__FILE__).'../animal-shelter.php', 'ansh_deactivate' );
