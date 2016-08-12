<?php

/*
 * Remove the meta boxes created by default for the animals' custom taxonomies
 */
function ansh_remove_default_meta_boxes() {

    remove_meta_box('tagsdiv-ansh_species', 'ansh_animal', 'normal');
    remove_meta_box('tagsdiv-ansh_sex', 'ansh_animal', 'normal');
    remove_meta_box('ansh_breeddiv', 'ansh_animal', 'normal');
    remove_meta_box('tagsdiv-ansh_age', 'ansh_animal', 'normal');
    remove_meta_box('ansh_special_needsdiv', 'ansh_animal', 'normal');
    remove_meta_box('ansh_rehoming_statusdiv', 'ansh_animal', 'normal');
    remove_meta_box('ansh_ownerdiv', 'ansh_animal', 'normal');
}
add_action('admin_menu', 'ansh_remove_default_meta_boxes');

/*
 * Add custom meta boxes for the animals' sexes custom taxonomy
 */
function ansh_add_custom_meta_boxes()
{
    //Animal Species
    add_meta_box(
        'ansh_species',
        esc_html__( 'Species', ANSH_TEXT_DOMAIN ),
        'ansh_animal_species_meta_box',
        'ansh_animal',
        'side'
    );

    //Animal Species
    add_meta_box(
        'ansh_species',
        esc_html__( 'Species', ANSH_TEXT_DOMAIN ),
        'ansh_animal_species_meta_box',
        'ansh_animal',
        'side'
    );

    //Animal Breed
    add_meta_box(
        'ansh_breed',
        esc_html__( 'Breed', ANSH_TEXT_DOMAIN ),
        'ansh_animal_breed_meta_box',
        'ansh_animal',
        'normal',
        'high'
    );

    //Animal Sex
    add_meta_box(
        'ansh_sex',
        esc_html__( 'Sex', ANSH_TEXT_DOMAIN ),
        'ansh_animal_sex_meta_box',
        'ansh_animal',
        'side'
    );

    //Animal Age
    add_meta_box(
        'ansh_age',
        esc_html__( 'Age', ANSH_TEXT_DOMAIN ),
        'ansh_animal_age_meta_box',
        'ansh_animal',
        'side'
    );

    //Special Needs
    add_meta_box(
        'ansh_special_needs',
        esc_html__( 'Special Needs', ANSH_TEXT_DOMAIN ),
        'ansh_animal_special_needs_meta_box',
        'ansh_animal',
        'normal',
        'high'
    );

    //Rehoming Status
    add_meta_box(
        'ansh_rehoming_status',
        esc_html__( 'Rehoming Status', ANSH_TEXT_DOMAIN ),
        'ansh_animal_rehoming_status_meta_box',
        'ansh_animal',
        'side'
    );

    //Rehoming Status
    add_meta_box(
        'ansh_owner',
        esc_html__( 'Owner', ANSH_TEXT_DOMAIN ),
        'ansh_animal_owner_meta_box',
        'ansh_animal',
        'side'
    );
}
add_action( 'add_meta_boxes', 'ansh_add_custom_meta_boxes' );

/*
 * Load already stored meta for current post in edit post screen

function ansh_load_animal_class_meta() {

    global $ansh_stored_meta;
    $ansh_stored_meta = get_post_meta( $_GET['post'] );
}
add_action('load-post.php', 'ansh_load_animal_class_meta');
 */

/*
 * Meta box for the Species taxonomy
 */
function ansh_animal_species_meta_box(){

    if($_GET['post']) {
        $ansh_current_species = get_post_meta($_GET['post'], 'ansh_species', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_species_nonce' );

    $terms = get_terms('ansh_species', array('hide_empty' => false));
    ?>
    <fieldset>
        <p>
            <label for="ansh_species" class="hidden"><?php esc_html_e('Species', ANSH_TEXT_DOMAIN); ?></label>
            <select id="ansh_species" name="ansh_species">
                <option disabled <?php (!$ansh_current_species) ? printf('selected') : ''; ?> value> -- <?php esc_html_e('select a species', ANSH_TEXT_DOMAIN); ?> -- </option>
                <?php
                foreach($terms as $term) {
                    ?>
                    <option value="<?php esc_attr_e($term->name); ?>" <?php selected($ansh_current_species, $term->name); ?> ><?php esc_html_e($term->name); ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
    </fieldset>

    <?php
}

/*
 * Meta box for the Breed taxonomy
 */
function ansh_animal_breed_meta_box(){

    if($_GET['post']) {
        $ansh_current_breed = get_post_meta($_GET['post'], 'ansh_breed', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_breed_nonce' );

    $terms = get_terms('ansh_breed', array('hide_empty' => false));
    ?>

    <fieldset>
        <p>
            <label for="ansh_breed" class="hidden"><?php esc_html_e('Breed', ANSH_TEXT_DOMAIN); ?></label>
            <select id="ansh_breed" name="ansh_breed">
                <option disabled <?php (!$ansh_current_breed) ? printf('selected') : ''; ?> value> -- <?php esc_html_e('select a breed', ANSH_TEXT_DOMAIN); ?> -- </option>
                <?php
                foreach($terms as $term) {
                    ?>
                    <option value="<?php esc_attr_e($term->name); ?>" <?php selected($ansh_current_breed, $term->name); ?>><?php esc_html_e($term->name); ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
    </fieldset>

    <?php
}


/*
 * Meta box for the Sex taxonomy
 */
function ansh_animal_sex_meta_box(){

    if($_GET['post']) {
        $ansh_current_sex = get_post_meta($_GET['post'], 'ansh_sex', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_sex_nonce' );

    $terms = get_terms('ansh_sex', array('hide_empty' => false));
    ?>
    <fieldset>
        <legend class="hidden"><?php esc_html_e('Sex', ANSH_TEXT_DOMAIN); ?></legend>
        <?php
        $count = 1;
        foreach($terms as $term) {
            ?>
            <p>
                <input type="radio" name="ansh_sex" id="sex_<?php echo $count; ?>" value="<?php esc_attr_e($term->name); ?>" <?php checked($ansh_current_sex, $term->name); ?> />
                <label for="sex_<?php echo $count; ?>"><?php esc_html_e($term->name); ?></label>
            </p>
            <?php
            $count++;
        }
        ?>
    </fieldset>

    <?php
}

/*
 * Meta box for the Age taxonomy
 */
function ansh_animal_age_meta_box(){

    if($_GET['post']) {
        $ansh_current_age = get_post_meta($_GET['post'], 'ansh_age', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_age_nonce' );

    $terms = get_terms('ansh_age', array('hide_empty' => false));
    ?>
    <fieldset>
        <p>
            <label for="ansh_age" class="hidden"><?php esc_html_e('Age', ANSH_TEXT_DOMAIN); ?></label>
            <select id="ansh_age" name="ansh_age">
                <option disabled <?php (!$ansh_current_age) ? printf('selected') : ''; ?> value> -- <?php esc_html_e('select an age', ANSH_TEXT_DOMAIN); ?> -- </option>
            <?php
            foreach($terms as $term) {
            ?>
                <option value="<?php esc_attr_e($term->name); ?>" <?php selected($ansh_current_age, $term->name); ?>><?php esc_html_e($term->name); ?></option>
                <?php
            }
                ?>
            </select>
        </p>
    </fieldset>

    <?php
}

/*
 * Meta box for the Special Needs taxonomy
 */
function ansh_animal_special_needs_meta_box(){

    if($_GET['post']) {
        $ansh_special_needs = get_post_meta($_GET['post'], 'ansh_special_needs', true);
    }
    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_special_needs_nonce' );

    $terms = get_terms('ansh_special_needs', array('hide_empty' => false));
    ?>
    <fieldset>
        <?php
        $count = 1;
        foreach($terms as $term) {
            if($ansh_special_needs)
                $inArrayCheck = in_array($term->name, $ansh_special_needs);
        ?>
        <p class="inline">
            <label>
                <input type="checkbox" id="ansh_special_need_<?= $count ?>" name="ansh_special_needs[]" value="<?php esc_attr_e($term->name); ?>" <?php $inArrayCheck ? printf('checked="checked"') : ''; ?> />
                <?php esc_html_e($term->name); ?>
            </label>
        </p>
        <?php
            $count++;
        }
        ?>
    </fieldset>

    <?php
}


/*
 * Meta box for the Rehoming Status taxonomy
 */
function ansh_animal_rehoming_status_meta_box(){

    if($_GET['post']) {
        $ansh_current_status = get_post_meta($_GET['post'], 'ansh_rehoming_status', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_rehoming_status_nonce' );

    $terms = get_terms(array('taxonomy' => 'ansh_rehoming_status', 'hide_empty' => false));
    ?>
    <fieldset>
        <p>
            <label for="ansh_rehoming_status" class="hidden"><?php esc_html_e('Rehoming Status', ANSH_TEXT_DOMAIN); ?></label>
            <select id="ansh_rehoming_status" name="ansh_rehoming_status">
                <option disabled <?php (!$ansh_current_status) ? printf('selected') : ''; ?> value> -- <?php esc_html_e('select a status', ANSH_TEXT_DOMAIN); ?> -- </option>
                <?php
                foreach($terms as $term) {
                    ?>
                    <option value="<?php esc_attr_e($term->name); ?>" <?php selected($ansh_current_status, $term->name); ?>><?php esc_html_e($term->name); ?></option>
                    <?php
                }
                ?>
            </select>
        </p>
    </fieldset>
    <?php
}

/*
 * Meta box for the Owner taxonomy
 */
function ansh_animal_owner_meta_box(){

    if($_GET['post']) {
        $ansh_current_owner = get_post_meta($_GET['post'], 'ansh_owner', true);
    }

    wp_nonce_field( basename( __FILE__ ), 'ansh_animal_owner_nonce' );

    $terms = get_terms(array('taxonomy' => 'ansh_owner', 'hide_empty' => false));
    ?>
    <fieldset>
        <p>
            <label for="ansh_owner" class="hidden"><?php esc_html_e('Owner', ANSH_TEXT_DOMAIN); ?></label>
            <select id="ansh_owner" name="ansh_owner">
                <option disabled <?php (!$ansh_current_owner) ? printf('selected') : ''; ?> value> -- <?php esc_html_e('select an owner', ANSH_TEXT_DOMAIN); ?> -- </option>
                <?php
                foreach($terms as $term) {
                ?>
                    <option value="<?php esc_attr_e($term->name); ?>" <?php selected($ansh_current_owner, $term->name); ?>><?php esc_html_e($term->name); ?></option>
                <?php
                }
                ?>
            </select>
        </p>
    </fieldset>
    <?php
}

/*
 * Save data
 */
function ansh_save_animal_class_meta( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );

    if ( $is_autosave || $is_revision ) {
        return;
    }

    if ( !is_user_logged_in() || !current_user_can( 'edit_ansh_animals', $post_id ) ) {
        return;
    }

    //Animal Species
    if ( isset( $_POST[ 'ansh_species' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_species_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta( $post_id, 'ansh_species', sanitize_text_field( $_POST['ansh_species'] ) );
        }
        else
            return;
    }

    //Animal Breed
    if ( isset( $_POST[ 'ansh_breed' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_breed_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta( $post_id, 'ansh_breed', sanitize_text_field( $_POST['ansh_breed'] ) );
        }
        else
            return;
    }

    //Animal Sex
    if ( isset( $_POST[ 'ansh_sex' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_sex_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta( $post_id, 'ansh_sex', sanitize_text_field( $_POST['ansh_sex'] ) );
        }
        else
            return;
    }

    //Animal Age
    if ( isset( $_POST[ 'ansh_age' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_age_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta( $post_id, 'ansh_age', sanitize_text_field( $_POST['ansh_age'] ) );
        }
        else
            return;
    }

    //Special Needs
    if ( wp_verify_nonce( $_POST[ 'ansh_animal_special_needs_nonce' ], basename( __FILE__ ) ) ) {
        $new_meta = $_POST[ 'ansh_special_needs' ];
        $count = count($new_meta);
        for ($i=0; $i<$count; ++$i) {
            $new_meta[$i] = sanitize_text_field($new_meta[$i]);
        }
        $old_meta = get_post_meta($post_id, 'ansh_special_needs', true);
        if(!empty($old_meta) || is_null($old_meta)){
            update_post_meta($post_id, 'ansh_special_needs', $new_meta);
        } else {
            add_post_meta($post_id, 'ansh_special_needs', $new_meta, true);
        }
    }
    else
        return;

    //Rehoming Status
    if ( isset( $_POST[ 'ansh_rehoming_status' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_rehoming_status_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta($post_id, 'ansh_rehoming_status', sanitize_text_field($_POST['ansh_rehoming_status']));
        }
        else
            return;
    }

    //Owner
    if ( isset( $_POST[ 'ansh_owner' ] ) ) {
        if ( wp_verify_nonce( $_POST[ 'ansh_animal_owner_nonce' ], basename( __FILE__ ) ) ) {
            update_post_meta( $post_id, 'ansh_owner', sanitize_text_field( $_POST['ansh_owner'] ) );
        }
        else
            return;
    }
}
add_action( 'save_post', 'ansh_save_animal_class_meta' );
