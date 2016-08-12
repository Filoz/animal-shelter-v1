<?php

/*
 * Add "archived" status
 */
function ansh_register_archived_status() {

    $args = array(
        'label'                     => __( 'Archived', ANSH_TEXT_DOMAIN ),
        'public'                    => true,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => false,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Archived <span class="count">(%s)</span>', 'Archived <span class="count">(%s)</span>', ANSH_TEXT_DOMAIN ),
    );
    register_post_status( 'archive', $args );

}
add_action( 'init', 'ansh_register_archived_status' );

/*
 * Append "Archived" status to the Post status list
 * Not included by default in Wordpress, see Notice: https://codex.wordpress.org/Function_Reference/register_post_status
 */
function ansh_append_archived_status_list(){
    global $post;
    $complete = '';
    $label = '';
    if($post->post_type == 'ansh_animal'){
        if($post->post_status == 'archive'){
            $complete = ' selected="selected"';
            $label = '<span id="post-status-display"> '.__('Archived', ANSH_TEXT_DOMAIN).'</span>';
        }
        wp_enqueue_script( 'ansh-append-archived-status', plugins_url ( '../js/ansh-append-archived-status.js', __FILE__ ), array( 'jquery'), '20160808', true);

        $isSelected = selected('archive', $post->post_status);
        $archiveName = __('Archived', ANSH_TEXT_DOMAIN);
        $republishLabel = _x('Republish', 'when republishing a post previously set as archived', ANSH_TEXT_DOMAIN);
        $archiveAction = _x('Archive', 'the act of archive a post', ANSH_TEXT_DOMAIN);
        $data = array(
            'isSelected' => $isSelected,
            'localizedName' => $archiveName,
            'republishLabel' => $republishLabel,
            'archiveAction' => $archiveAction
        );
        wp_localize_script( 'ansh-append-archived-status', 'archive', $data );
    }
}
add_action( 'admin_print_scripts-post.php', 'ansh_append_archived_status_list' );
add_action( 'admin_print_scripts-edit.php', 'ansh_append_archived_status_list' );



