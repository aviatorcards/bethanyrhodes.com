<?php
/**
 * Bethany Rhodes Theme Functions
 */

// Theme Setup
function bethany_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'bethany-rhodes' ),
    ] );
}
add_action( 'after_setup_theme', 'bethany_setup' );

// Enqueue Styles & Scripts
function bethany_scripts() {
    $ver = '1.0.5';

    // Google Fonts
    wp_enqueue_style( 'google-fonts-playfair',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&family=Montserrat:wght@400;500;600;700&display=swap',
        [], null );
    wp_enqueue_style( 'google-fonts-crimson',
        'https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&display=swap',
        [], null );

    // Font Awesome
    wp_enqueue_style( 'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [], '6.5.2' );

    // Main stylesheet
    wp_enqueue_style( 'bethany-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [ 'google-fonts-playfair', 'google-fonts-crimson', 'font-awesome' ],
        $ver );

    // Main JS (hamburger + hero flip)
    wp_enqueue_script( 'bethany-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [], $ver, true );

    // Contact page
    if ( is_page( 'contact' ) ) {
        wp_enqueue_script( 'bethany-contact',
            get_template_directory_uri() . '/assets/js/contact.js',
            [], $ver, true );
        wp_localize_script( 'bethany-contact', 'bethanyContact', [
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'bethany_contact_nonce' ),
        ] );
    }
}
add_action( 'wp_enqueue_scripts', 'bethany_scripts' );

// Helper: get theme image URL
function bethany_img( $filename ) {
    return get_template_directory_uri() . '/assets/images/' . $filename;
}

// ── Events Custom Post Type ────────────────────────────────────────────────

function br_register_event_cpt() {
    register_post_type( 'br_event', [
        'labels' => [
            'name'               => 'Events',
            'singular_name'      => 'Event',
            'add_new_item'       => 'Add New Event',
            'edit_item'          => 'Edit Event',
            'new_item'           => 'New Event',
            'search_items'       => 'Search Events',
            'not_found'          => 'No events found',
            'not_found_in_trash' => 'No events found in trash',
            'menu_name'          => 'Events',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'supports'     => [ 'title' ],
        'menu_icon'    => 'dashicons-calendar-alt',
        'show_in_rest' => false, // use classic meta boxes
    ] );
}
add_action( 'init', 'br_register_event_cpt' );

// Meta box: Event Details (date + location)
function br_event_add_meta_box() {
    add_meta_box(
        'br_event_details',
        'Event Details',
        'br_event_meta_box_html',
        'br_event',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'br_event_add_meta_box' );

function br_event_meta_box_html( $post ) {
    wp_nonce_field( 'br_event_save', 'br_event_nonce' );
    $date     = get_post_meta( $post->ID, '_event_date',     true );
    $time     = get_post_meta( $post->ID, '_event_time',     true );
    $location = get_post_meta( $post->ID, '_event_location', true );
    $url      = get_post_meta( $post->ID, '_event_url',      true );
    $notes    = get_post_meta( $post->ID, '_event_notes',    true );
    ?>
    <style>
        #br_event_details table { width:100%; }
        #br_event_details th    { width:120px; padding:8px 0; vertical-align:middle; font-weight:600; }
        #br_event_details td    { padding:6px 0; }
        #br_event_details input[type=text],
        #br_event_details input[type=url],
        #br_event_details input[type=date],
        #br_event_details input[type=time],
        #br_event_details textarea { width:100%; max-width:480px; }
        #br_event_details textarea  { height:60px; resize:vertical; }
        #br_event_details .description { color:#777; font-size:12px; margin-top:3px; }
    </style>
    <table class="form-table">
        <tr>
            <th><label for="br_event_date">Date <span style="color:red">*</span></label></th>
            <td>
                <input type="date" id="br_event_date" name="event_date" value="<?php echo esc_attr( $date ); ?>" required />
                <p class="description">Events before today automatically move to "Past Performances".</p>
            </td>
        </tr>
        <tr>
            <th><label for="br_event_time">Time</label></th>
            <td>
                <input type="time" id="br_event_time" name="event_time" value="<?php echo esc_attr( $time ); ?>" />
                <p class="description">Optional — leave blank if time is TBD.</p>
            </td>
        </tr>
        <tr>
            <th><label for="br_event_location">Location</label></th>
            <td>
                <input type="text" id="br_event_location" name="event_location" value="<?php echo esc_attr( $location ); ?>" placeholder="e.g. Federal Hill Commons, Noblesville, IN" />
            </td>
        </tr>
        <tr>
            <th><label for="br_event_url">Event Link</label></th>
            <td>
                <input type="url" id="br_event_url" name="event_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://..." />
                <p class="description">Optional — tickets page, Facebook event, venue website, etc. Adds a "More Info" button to the listing.</p>
            </td>
        </tr>
        <tr>
            <th><label for="br_event_notes">Notes</label></th>
            <td>
                <textarea id="br_event_notes" name="event_notes"><?php echo esc_textarea( $notes ); ?></textarea>
                <p class="description">Optional — any extra details shown on the listing (e.g. "Free admission", "Ages 21+").</p>
            </td>
        </tr>
    </table>
    <?php
}

function br_event_save_meta( $post_id ) {
    if ( ! isset( $_POST['br_event_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['br_event_nonce'], 'br_event_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $text_fields = [
        'event_date'     => '_event_date',
        'event_time'     => '_event_time',
        'event_location' => '_event_location',
        'event_notes'    => '_event_notes',
    ];

    foreach ( $text_fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
        }
    }

    // URL field — use esc_url_raw for proper sanitization
    if ( isset( $_POST['event_url'] ) ) {
        update_post_meta( $post_id, '_event_url', esc_url_raw( $_POST['event_url'] ) );
    }
}
add_action( 'save_post_br_event', 'br_event_save_meta' );

// ── Projects Custom Post Type ──────────────────────────────────────────────

function br_register_project_cpt() {
    register_post_type( 'br_project', [
        'labels' => [
            'name'               => 'Projects',
            'singular_name'      => 'Project',
            'add_new_item'       => 'Add New Project',
            'edit_item'          => 'Edit Project',
            'new_item'           => 'New Project',
            'search_items'       => 'Search Projects',
            'not_found'          => 'No projects found',
            'not_found_in_trash' => 'No projects found in trash',
            'menu_name'          => 'Projects',
        ],
        'public'       => true,
        'show_ui'      => true,
        'show_in_menu' => true,
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
        'menu_icon'    => 'dashicons-portfolio',
        'show_in_rest' => true, // allow block editor
    ] );
}
add_action( 'init', 'br_register_project_cpt' );

// Meta box: Project Link
function br_project_add_meta_box() {
    add_meta_box(
        'br_project_details',
        'Project Details',
        'br_project_meta_box_html',
        'br_project',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'br_project_add_meta_box' );

function br_project_meta_box_html( $post ) {
    wp_nonce_field( 'br_project_save', 'br_project_nonce' );
    $url = get_post_meta( $post->ID, '_project_url', true );
    $subtitle = get_post_meta( $post->ID, '_project_subtitle', true );
    ?>
    <style>
        #br_project_details table { width:100%; }
        #br_project_details th    { width:120px; padding:8px 0; vertical-align:middle; font-weight:600; }
        #br_project_details td    { padding:6px 0; }
        #br_project_details input[type=text],
        #br_project_details input[type=url] { width:100%; max-width:480px; }
    </style>
    <table class="form-table">
        <tr>
            <th><label for="br_project_subtitle">Subtitle</label></th>
            <td>
                <input type="text" id="br_project_subtitle" name="project_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" placeholder="e.g. Lead Vocalist, Piano Trio, etc." />
            </td>
        </tr>
        <tr>
            <th><label for="br_project_url">Project Link</label></th>
            <td>
                <input type="url" id="br_project_url" name="project_url" value="<?php echo esc_attr( $url ); ?>" placeholder="https://..." />
                <p class="description">Optional — link to project website or social page.</p>
            </td>
        </tr>
    </table>
    <?php
}

function br_project_save_meta( $post_id ) {
    if ( ! isset( $_POST['br_project_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['br_project_nonce'], 'br_project_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['project_subtitle'] ) ) {
        update_post_meta( $post_id, '_project_subtitle', sanitize_text_field( $_POST['project_subtitle'] ) );
    }
    if ( isset( $_POST['project_url'] ) ) {
        update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
    }
}
add_action( 'save_post_br_project', 'br_project_save_meta' );

// Custom page template loader
function bethany_template_include( $template ) {
    if ( is_page() ) {
        $slug = get_post_field( 'post_name', get_queried_object_id() );
        $custom = get_template_directory() . '/page-' . $slug . '.php';
        if ( file_exists( $custom ) ) {
            return $custom;
        }
    }
    return $template;
}
add_filter( 'template_include', 'bethany_template_include' );

// ── Contact Form AJAX Handler ──────────────────────────────────────────────

function bethany_contact_form_handler() {
    check_ajax_referer( 'bethany_contact_nonce', 'nonce' );

    $name         = sanitize_text_field( $_POST['name'] ?? '' );
    $email        = sanitize_email( $_POST['email'] ?? '' );
    $phone        = sanitize_text_field( $_POST['phone'] ?? '' );
    $inquiry_type = sanitize_text_field( $_POST['inquiry_type'] ?? '' );
    $event_date   = sanitize_text_field( $_POST['event_date'] ?? '' );
    $message      = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( empty( $name ) || empty( $email ) || empty( $inquiry_type ) || empty( $message ) ) {
        wp_send_json_error( 'Missing required fields.' );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( 'Invalid email address.' );
    }

    $to      = 'booking@bethanyrhodes.com';
    $subject = "New message from {$name}!";
    $body    = "You got a new message from {$name} ({$email}).\n\n";
    $body   .= "Phone: " . ( $phone ?: 'Not provided' ) . "\n";
    $body   .= "Inquiry Type: {$inquiry_type}\n";
    $body   .= "Event Date: " . ( $event_date ?: 'Not specified' ) . "\n\n";
    $body   .= "Message:\n{$message}\n";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: {$name} <{$email}>",
    ];

    if ( wp_mail( $to, $subject, $body, $headers ) ) {
        wp_send_json_success( 'Message sent.' );
    } else {
        wp_send_json_error( 'Failed to send message.' );
    }
}
add_action( 'wp_ajax_bethany_contact',        'bethany_contact_form_handler' );
add_action( 'wp_ajax_nopriv_bethany_contact', 'bethany_contact_form_handler' );
