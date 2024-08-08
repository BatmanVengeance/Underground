<?php
// Enqueue Styles and Scripts
function enqueue_theme_assets() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// Register Custom Post Type for Events
function create_event_post_type() {
    register_post_type('event',
        array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_event_post_type');

// Add Custom Meta Boxes for Event Date and Time
function add_event_meta_boxes() {
    add_meta_box(
        'event_details',
        'Event Details',
        'render_event_meta_box',
        'event',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_event_meta_boxes');

function render_event_meta_box($post) {
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    ?>
    <p>
        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" />
    </p>
    <p>
        <label for="event_time">Event Time:</label>
        <input type="time" id="event_time" name="event_time" value="<?php echo esc_attr($event_time); ?>" />
    </p>
    <?php
}

function save_event_meta_box($post_id) {
    if (array_key_exists('event_date', $_POST)) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }
    if (array_key_exists('event_time', $_POST)) {
        update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
    }
}
add_action('save_post', 'save_event_meta_box');

// QR Code Generation
function generate_qr_code($order_id) {
    $order = wc_get_order($order_id);
    $qr_data = 'Order ID: ' . $order_id . ' - ' . $order->get_order_number();
    $qr_code_url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($qr_data);
    
    $to = $order->get_billing_email();
    $subject = 'Your Ticket QR Code';
    $message = '<p>Thank you for your purchase! Here is your QR code:</p>';
    $message .= '<img src="' . esc_url($qr_code_url) . '" alt="QR Code">';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    wp_mail($to, $subject, $message, $headers);
}
add_action('woocommerce_order_status_completed', 'generate_qr_code');

// Initialize WooCommerce and Dokan
function init_woocommerce_dokan() {
    if (class_exists('WooCommerce') && class_exists('Dokan')) {
        // Integrate WooCommerce and Dokan functionalities here
    }
}
add_action('init', 'init_woocommerce_dokan');
?>
