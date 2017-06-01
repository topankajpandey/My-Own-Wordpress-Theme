<?php

/*
 * Service custom post type 
 * It would automatically triggered when theme activated 
 * Created Date: 13.05.2017
 * Created By: T:307
 */

/* Initialize the service post types */
add_action('init', 'services');
function services() {
    $labels = array(
        'name' => _x('Our Services', 'post type general name'),
        'singular_name' => _x('Our Service', 'post type singular name'),
        'add_new' => _x('Add New', 'Service'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit Service'),
        'new_item' => __('New Service'),
        'all_items' => __('All Service'),
        'view_item' => __('View Service'),
        'search_items' => __('Search Service'),
        'not_found' => __('No service found'),
        'not_found_in_trash' => __('No service found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Service'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our service and service specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail',),
        'has_archive' => true,
    );
    register_post_type('services', $args);
}


/* Message and notification 
 * It shows when new activity triggered regarding post type  
 */
add_filter('post_updated_messages', 'service_action_messages');
function service_action_messages($messages) {
    global $post, $post_ID;
    $messages['product'] = array(
        0 => '',
        1 => sprintf(__('Service updated. <a href="%s">View service</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Service updated.'),
        5 => isset($_GET['revision']) ? sprintf(__('Service restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Service published. <a href="%s">View service</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Service saved.'),
        8 => sprintf(__('Service submitted. <a target="_blank" href="%s">Preview Service</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Service scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Service</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Service draft updated. <a target="_blank" href="%s">Preview Service</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}



/* It is nothing just contextual help
 * one can understand it easily
 */
add_action('contextual_help', 'service_contextual_help', 10, 3);
function service_contextual_help($contextual_help, $screen_id, $screen) {
    if ('product' == $screen->id) {

        $contextual_help = '<h2>Service</h2>
    <p>Service show the details of the items what we are do. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
    <p>You can view/edit the details of each service by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';
    } elseif ('edit-service' == $screen->id) {

        $contextual_help = '<h2>Editing service</h2>
    <p>This page allows you to view/modify service details. Please make sure to fill out the available boxes with the appropriate details (Service image, price, brand) and <strong>not</strong> add these details to the service description.</p>';
    }
    return $contextual_help;
}


/* Add menu class for post type */
add_action('admin_head', 'service_icons');
function service_icons() {
    ?>
    <script type="text/javascript">
        var jq = jQuery.noConflict();
        jq(document).ready(function () {
            jq("#menu-posts-services").find('.wp-menu-image').addClass('dashicons dashicons-schedule');
        });
    </script><?php

}
