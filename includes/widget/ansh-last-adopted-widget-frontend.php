<?php

/*
 * File included in '../ansh-add-last-adopted-widget.php'
 */

    // WP_Query arguments
    $args = array (
        'post_type'             => array( 'ansh_animal' ),
        'post_status'           => array( 'archive' ),
        'posts_per_page'        => 6,
        'orderby'               => 'modified',
        'rehoming_status'       => __('adopted', ANSH_TEXT_DOMAIN),
    );

    $last_adopted_animals = new WP_Query( $args );
    $data = array();
    if ( $last_adopted_animals->have_posts() ) :
        while ($last_adopted_animals->have_posts() ) : $last_adopted_animals->the_post();

            global $post;
            if ($last_adopted_animals->current_post < 1) {
                ?>
                <div class="ansh-adopted-animal active">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <img src="<?php the_post_thumbnail_url('medium'); ?>"/>
                        </a>
                    <?php endif; ?>
                    <h4><?php the_title(); ?></h4>
                </div>
                <?php
            } else {
                if (has_post_thumbnail()) $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');

                array_push($data, array(
                    'title'         => get_the_title(),
                    'titleAttr'     => the_title_attribute( array('echo' => false) ),
                    'permalink'     => get_permalink($post->id),
                    'thumbnailUrl'  => $thumbnail[0]
                ));
            }
        endwhile;

        ansh_adopted_data_to_script($data);

        wp_reset_query();
        wp_reset_postdata();

    else:
        ?>

        <p><?php esc_html_e('Wait to put this widget until some animal get adopted, or add past adopted animals to the archive.', ANSH_TEXT_DOMAIN); ?></p>

        <?php
    endif;



