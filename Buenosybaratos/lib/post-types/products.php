<?php

/*
 * Product custom post type 
 * It would automatically triggered when theme activated 
 * Created Date: 13.05.2017
 * Created By: T:307
 */

/* Initialize the product post types */
add_action('init', 'products');

function products() {
    $labels = array(
        'name' => _x('Our Products', 'post type general name'),
        'singular_name' => _x('Our Product', 'post type singular name'),
        'add_new' => _x('Add New', 'Product'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit Product'),
        'new_item' => __('New Product'),
        'all_items' => __('All Product'),
        'view_item' => __('View Product'),
        'search_items' => __('Search Product'),
        'not_found' => __('No product found'),
        'not_found_in_trash' => __('No product found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Product'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our product and product specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail',),
        'has_archive' => true,
    );
    register_post_type('bue-products', $args);
}

/* Message and notification 
 * It shows when new activity triggered regarding post type  
 */

add_filter('post_updated_messages', 'products_action_messages');

function products_action_messages($messages) {
    global $post, $post_ID;
    $messages['product'] = array(
        0 => '',
        1 => sprintf(__('Products updated. <a href="%s">View products</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Products updated.'),
        5 => isset($_GET['revision']) ? sprintf(__('Products restored to revision from %s'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Products published. <a href="%s">View products</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Products saved.'),
        8 => sprintf(__('Products submitted. <a target="_blank" href="%s">Preview products</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Products scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview products</a>'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Products draft updated. <a target="_blank" href="%s">Preview products</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* It is nothing just contextual help
 * one can understand it easily
 */

add_action('contextual_help', 'products_contextual_help', 10, 3);

function products_contextual_help($contextual_help, $screen_id, $screen) {
    if ('product' == $screen->id) {

        $contextual_help = '<h2>Products</h2>
        <p>Products show the details of the items what we are do. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
        <p>You can view/edit the details of each products by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';
    } elseif ('edit-product' == $screen->id) {

        $contextual_help = '<h2>Editing products</h2>
        <p>This page allows you to view/modify products details. Please make sure to fill out the available boxes with the appropriate details (products image, price, brand) and <strong>not</strong> add these details to the products description.</p>';
    }
    return $contextual_help;
}

/* Creation of post meta box */
add_action('add_meta_boxes', 'add_product_metaboxes');

function add_product_metaboxes() {
    add_meta_box('beu_type', 'Product Type', 'beu_type', 'bue-products', 'side', 'default');
}

/* define post meta html here */
function beu_type() {
    global $post;

    $beu_type1 = get_post_meta($post->ID, 'beu_type_1', true);
    $beu_type2 = get_post_meta($post->ID, 'beu_type_2', true);
    $beu_type3 = get_post_meta($post->ID, 'beu_type_3', true);
    
    $beu_type_link_1 = get_post_meta($post->ID, 'beu_type_link_1', true);
    $beu_type_link_2 = get_post_meta($post->ID, 'beu_type_link_2', true);
    $beu_type_link_3 = get_post_meta($post->ID, 'beu_type_link_3', true);
    
    $bea_read_more_lebel = get_post_meta($post->ID, 'bea_read_more_lebel', true);
    $bea_read_more_link = get_post_meta($post->ID, 'bea_read_more_link', true);
    
    $nonce = wp_create_nonce('bue-product-save');
    echo '<input type="hidden" name="product_noncename" id="product_noncename" value="' . $nonce . '" />';

    echo '<div class="row">
        <div class="col-xs-6 boot_padding">
            <label for="folder_project_id">Enter Type1</label>
            <div class="input text">
                <input placeholder="Enter type first" type="text" name="beu_type[beu_type_1]" value="'.$beu_type1.'" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-5 boot_padding">
            <label for="folder_project_id">Enter Type1 Link</label>
            <div class="input text">
                <input placeholder="Enter Type1 Link" type="text" name="beu_type[beu_type_link_1]" value="'.$beu_type_link_1.'" class="widefat" />
            </div>      
        </div>
        
        <div class="col-xs-6 boot_padding">
            <label for="folder_project_id">Enter Type2</label>
            <div class="input text">
                <input placeholder="Enter type second" type="text" name="beu_type[beu_type_2]" value="'.$beu_type2.'" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-5 boot_padding">
            <label for="folder_project_id">Enter Type2 Link</label>
            <div class="input text">
                <input placeholder="Enter Type2 Link" type="text" name="beu_type[beu_type_link_2]" value="'.$beu_type_link_2.'" class="widefat" />
            </div>      
        </div>
        
        <div class="col-xs-6 boot_padding">
            <label for="folder_project_id">Enter Type3</label>
            <div class="input text">
                <input placeholder="Enter type third" type="text" name="beu_type[beu_type_3]" value="'.$beu_type3.'" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-5 boot_padding">
            <label for="folder_project_id">Enter Type3 Link</label>
            <div class="input text">
                <input placeholder="Enter Type3 Link" type="text" name="beu_type[beu_type_link_3]" value="'.$beu_type_link_3.'" class="widefat" />
            </div>      
        </div>
        
        <div class="col-xs-6 boot_padding">
            <label for="folder_project_id">Read More Lebel</label>
            <div class="input text">
                <input placeholder="Enter read more lebel" type="text" name="beu_type[bea_read_more_lebel]" value="'.$bea_read_more_lebel.'" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-5 boot_padding">
            <label for="folder_project_id">Read More Link</label>
            <div class="input text">
                <input placeholder="Enter read more link" type="text" name="beu_type[bea_read_more_link]" value="'.$bea_read_more_link.'" class="widefat" />
            </div>      
        </div>
    </div>';
}

/* Saving of post meta box */
add_action('save_post', 'bue_save_meta', 1, 1);

function bue_save_meta($post_id) {
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['product_noncename'], 'bue-product-save')) {
        return $post->ID;
    }

    $beu_type = $_POST['beu_type'];
    foreach ($beu_type as $key => $value) {
        if (get_post_meta($post_id, $key, false)) {
            update_post_meta($post_id, $key, $value);
        } else {
            add_post_meta($post_id, $key, $value);
        }
    }
}

// filter product column 
add_filter('manage_bue-products_posts_columns', 'columns_content_product_heading', 10);
add_action('manage_bue-products_posts_custom_column', 'columns_content_product_type', 10, 2);

// define column for types and links
function columns_content_product_heading($defaults) {
    $defaults['Type1'] = 'Type1 & Link';
    $defaults['Type2'] = 'Type2 & Link';
    $defaults['Type3'] = 'Type3 & Link';
    return $defaults;
}

// get column value for types and links
function columns_content_product_type($column_name, $post_ID) {
    if ($column_name == 'Type1') {
        echo '<strong>Type</strong>: '.get_post_meta($post_ID, 'beu_type_1', true).'<br>';
        echo '<strong>Link</strong>: '.get_post_meta($post_ID, 'beu_type_link_1', true).'<br>';
    }
    if ($column_name == 'Type2') {
        echo '<strong>Type</strong>: '. get_post_meta($post_ID, 'beu_type_2', true).'<br>';
        echo '<strong>Link</strong>: '.get_post_meta($post_ID, 'beu_type_link_2', true).'<br>';
    }
    if ($column_name == 'Type3') {
        echo '<strong>Type</strong>: '.get_post_meta($post_ID, 'beu_type_3', true).'<br>';
        echo '<strong>Link</strong>: '.get_post_meta($post_ID, 'beu_type_link_2', true).'<br>';
    }
}

/* Add bootstrap css for meta box design */
add_action('admin_print_scripts-post-new.php', 'product_admin_script', 11);
add_action('admin_print_scripts-post.php', 'product_admin_script', 11);

function product_admin_script() {
    global $post_type;
    if ('bue-products' == $post_type || 'post' == $post_type ){
        wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css');
    }
}

/* Add menu class for post type */
add_action('admin_head', 'product_icons');

function product_icons() {
    ?>
    <script type="text/javascript">
        var jq = jQuery.noConflict();
        jq(document).ready(function () {
            jq("#menu-posts-bue-products").find('.wp-menu-image').addClass('dashicons dashicons-cart');
        });
    </script><?php

}
