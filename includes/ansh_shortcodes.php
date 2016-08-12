<?php


function ansh_register_shortcodes() {
    add_shortcode('ansh_animals', 'ansh_animal_loop_shortcode');
}
add_action('init', 'ansh_register_shortcodes', 11);


function ansh_animal_loop_shortcode($atts, $content=null)
{

    $ansh_atts = shortcode_atts( array(
            'title'         => __('Currently waiting for adoption', ANSH_TEXT_DOMAIN),
            'count'         => -1,
            'species'       => '',
            'pagination'    => 'off',
        ), $atts );

    $pagination = $ansh_atts['pagination'] == 'on' ? false : true;
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type'         => array( 'ansh_animal' ),
        'post_status'       => array( 'publish' ),
        'posts_per_page'    => 2,
        'paged'             => true,
        'page'              => true,
        'meta_query'         => array(
                                    array(
                                        'key'  => 'ansh_species',
                                        'value' => strtolower($ansh_atts['species'])
                                    )
                                )
    );

    $animal_by_species = new WP_Query($args);
    if ($animal_by_species->have_posts()) :

        $display_by_species = '<div id="animals-by-breed">';
        $display_by_species .= '<h4>'.esc_html__($ansh_atts['title']).'</h4>';
        $display_by_species .= '<ul>';

        while ($animal_by_species->have_posts()) : $animal_by_species->the_post();
            global $post;

            $deadline = get_post_meta(get_the_ID(), 'application_deadline', true);

            $title = get_the_title();
            $slug = get_permalink();

            $display_by_species .= '<li class="ansh-animal">';
            $display_by_species .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug), esc_html($title));
            $display_by_species .= '</li>';

        endwhile;

        $display_by_species .= '</ul>';
        $display_by_species .= '</div>';

    else:
        return '<p>ciao!<br />'.__('Sorry, no posts matched your criteria.', ANSH_TEXT_DOMAIN).'</p>';
    endif;

    wp_reset_query();
    wp_reset_postdata();

    if ($animal_by_species->max_num_pages > 1 && is_page()) {

        $display_by_species .= 'ciao!';

    }

    return $display_by_species;
}
