<?php
add_action('post_edit_form_tag', 'post_edit_form_tag');

function post_edit_form_tag() {
    echo ' enctype="multipart/form-data"';
}

/* Creation of post meta box for important speces */
add_action('add_meta_boxes', 'important_specs_metaboxes');

function important_specs_metaboxes() {
    add_meta_box('important_specs', 'Important specs', 'important_specs', 'post', 'side', 'default');
}

/* define post meta box html for important speces here */

function important_specs() {
    global $post;

    $important_specs = get_post_meta($post->ID, 'important_specs', true);
    $serialize_imp_spec = maybe_unserialize($important_specs);
    $value1 = (isset($serialize_imp_spec['key1'])) ? $serialize_imp_spec['key1'] : '';
    $value2 = (isset($serialize_imp_spec['key2'])) ? $serialize_imp_spec['key2'] : '';

    $nonce = wp_create_nonce('post-save-nonce');
    echo '<input type="hidden" name="post_noncename" id="post_noncename" value="' . $nonce . '" />';

    echo '<div class="row auto_field_wrapper">';
    if (!empty($serialize_imp_spec)) {
        $speccounter = 0;
        foreach ($serialize_imp_spec as $spec_key => $spec_value) {
            if ($speccounter == 0) {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="add_button" title="Add field">+</a>
                    </div>      
                </div>';
            } else {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="remove_button" title="Remove field">-</a>
                    </div>      
                </div>';
            }
            echo '<div id="main_parent_' . ($speccounter + 1) . '">
                <div class="col-xs-5 boot_padding">
                    <label for="imp_spec_key">Enter Specification Key</label>
                    <div class="input text">
                        <input placeholder="Enter specification type" type="text" name="post_meta[imp_spec_key][]" value="' . $spec_key . '" class="widefat" />
                    </div>                        
                </div>
                <div class="col-xs-4 boot_padding">
                    <label for="imp_spec_value">Enter Specification Value</label>
                    <div class="input text">
                        <input placeholder="Enter specification value" type="text" name="post_meta[imp_spec_value][]" value="' . $spec_value . '" class="widefat" />
                    </div>      
                </div>';
            echo $button;
            echo '</div>';

            $speccounter++;
        }
    } else {
        echo '<div>
        <div class="col-xs-5 boot_padding">
            <label for="imp_spec_key">Enter Specification Key</label>
            <div class="input text">
                <input placeholder="Enter specification type" type="text" name="post_meta[imp_spec_key][]" value="' . $value1 . '" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-4 boot_padding">
            <label for="imp_spec_value">Enter Specification Value</label>
            <div class="input text">
                <input placeholder="Enter specification value" type="text" name="post_meta[imp_spec_value][]" value="' . $value2 . '" class="widefat" />
            </div>      
        </div>
        <div class="col-xs-1 boot_padding">
            <label for="add_spec_div">&nbsp;</label>
            <div class="input text">
                <a href="javascript:void(0);" class="add_button" title="Add field">+</a>
            </div>      
        </div>';
        echo '</div>';
    }
    echo '</div>';
    ?>

    <script>
        var jq = jQuery.noConflict();
        jq(document).ready(function () {
            var maxField = 10;
            var addButton = jq('.add_button');
            var wrapper = jq('.auto_field_wrapper');
            var x = '<?php echo (empty($serialize_imp_spec)) ? 1 : count($serialize_imp_spec); ?>';
            jq(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    var fieldHTML = '<div class="col-xs-5 boot_padding"><label for="imp_spec_key">Enter Specification Key</label><div class="input text"><input placeholder="Enter specification key" type="text" name="post_meta[imp_spec_key][]" value="" class="widefat" /></div></div><div class="col-xs-4 boot_padding"><label for="imp_spec_value">Enter Specification Value</label><div class="input text"><input placeholder="Enter specification value" type="text" name="post_meta[imp_spec_value][]" value="" class="widefat" /></div></div><div class="col-xs-1 boot_padding"><label for="remove_spec_div">&nbsp;</label><div class="input text"><a href="javascript:void(0);" class="remove_button" title="Remove field">-</i></a></div></div>';
                    jq(wrapper).append('<div id="main_parent_' + x + '">' + fieldHTML + '</div>');
                }
            });
            jq('.auto_field_wrapper').on('click', '.remove_button', function (e) {
                e.preventDefault();
                jq(this).parents().eq(2).remove();
                x--;
            });
        });
    </script><?php
}

/* Creation of post meta box for how we work speces */
add_action('add_meta_boxes', 'how_we_work_metaboxes');

function how_we_work_metaboxes() {
    add_meta_box('how_we_work', 'How We Work', 'how_we_work', 'post', 'side', 'default');
}

/* define post meta box html for how we work here */

function how_we_work() {
    global $post;
    $how_we_work = get_post_meta($post->ID, 'how_we_work', true);
    echo '<div class="row">
        <div class="col-xs-12 boot_padding">
            <div class="input text">
                <textarea placeholder="Enter how we work" type="text" name="post_meta[how_we_work]" class="widefat" style="min-height: 125px; width: 770px;"/>' . $how_we_work . '</textarea>
            </div>                        
        </div>
    </div>';
}

/* Add bootstrap css for meta box design */
add_action('admin_print_scripts-post-new.php', 'post_admin_script', 11);
add_action('admin_print_scripts-post.php', 'post_admin_script', 11);

function post_admin_script() {
    global $post_type;
    if ('post' == $post_type) {
        wp_enqueue_style('tokeninput', get_stylesheet_directory_uri() . '/css/admin/token-input.css');
        wp_enqueue_script('fastselectjs', get_stylesheet_directory_uri() . '/js/admin/jquery.tokeninput.js');
    }
}

/* Saving of post meta box */
add_action('save_post', 'post_save_meta', 1, 1);

function post_save_meta($post_id) {
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['post_noncename'], 'post-save-nonce')) {
        return $post_id;
    }

    /* save important specs */
    $post_meta = $_POST['post_meta'];

    if (get_post_meta($post_id, 'how_we_work', false)) {
        update_post_meta($post_id, 'how_we_work', $post_meta['how_we_work']);
    } else {
        add_post_meta($post_id, 'how_we_work', $post_meta['how_we_work']);
    }

    if (!empty($post_meta['imp_spec_key']) && !empty($post_meta['imp_spec_value'])) {
        $imp_spec_key = array_filter($post_meta['imp_spec_key']);
        $imp_spec_value = array_filter($post_meta['imp_spec_value']);
        $imp_spec = array_combine($imp_spec_key, $imp_spec_value);
        $serialize_imp_spec = maybe_serialize($imp_spec);

        if (get_post_meta($post_id, 'important_specs', false)) {
            update_post_meta($post_id, 'important_specs', $serialize_imp_spec);
        } else {
            add_post_meta($post_id, 'important_specs', $serialize_imp_spec);
        }
    }

    /* Save Related Article Data */
    if (!empty($post_meta['related_link'])) {
        $related_articles = array_filter($post_meta['related_link']);
        $related_file = $post_meta['related_file'];
        $article_title = $post_meta['article_title'];
        $article_arr = [];
        if (!empty($related_articles)) {
            foreach ($related_articles as $art_key => $art_value) {
                if (!empty($art_value)) {

                    $link_name = ($related_file[$art_key]) ? $related_file[$art_key] : '';
                    $article_title_meta = ($article_title[$art_key]) ? $article_title[$art_key] : '';

                    $article_arr[] = array('artcle_title' => $article_title_meta, 'artcle_link' => $art_value, 'artcle_img' => $link_name);
                }
            }
        }

        if (get_post_meta($post_id, 'related_article_data', false)) {
            update_post_meta($post_id, 'related_article_data', maybe_serialize($article_arr));
        } else {
            add_post_meta($post_id, 'related_article_data', maybe_serialize($article_arr));
        }
    }


    /* Save Top Product Data */
    if (!empty($post_meta['top_product_link'])) {
        $top_product_link = array_filter($post_meta['top_product_link']);
        $top_product_file = $post_meta['top_product_file'];
        $top_product_link_name = $post_meta['top_product_link_name'];

        $top_product_arr = [];
        if (!empty($top_product_link)) {
            foreach ($top_product_link as $top_key => $top_value) {
                if (!empty($top_value)) {
                    $link_name = ($top_product_link_name[$top_key]) ? $top_product_link_name[$top_key] : '';
                    $top_product_img = ($top_product_file[$top_key]) ? $top_product_file[$top_key] : '';
                    $top_product_arr[] = array('top_product_link_level' => $link_name, 'top_product_link' => $top_value, 'top_product_img' => $top_product_img);
                }
            }
        }
        if (get_post_meta($post_id, 'top_product_data', false)) {
            update_post_meta($post_id, 'top_product_data', maybe_serialize($top_product_arr));
        } else {
            add_post_meta($post_id, 'top_product_data', maybe_serialize($top_product_arr));
        }
    }

    /* Saving top product status here */
    $top_product_status = $post_meta['top_product_status'];
    if (get_post_meta($post_id, 'top_product_status', false)) {
        update_post_meta($post_id, 'top_product_status', $top_product_status);
    } else {
        add_post_meta($post_id, 'top_product_status', $top_product_status);
    }
}

add_action('add_meta_boxes', 'related_article_metabox');

function related_article_metabox() {
    add_meta_box('related_article', __('Related Article', 'text-domain'), 'related_article', 'post', 'side', 'low');
}

function related_article($post) {
    global $content_width, $_wp_additional_image_sizes;
    wp_enqueue_media();
    wp_enqueue_script('related-article-js', get_stylesheet_directory_uri() . '/js/admin/related_article.js');
    $related_article = get_post_meta($post->ID, 'related_article_data', true);

    $related_file_arr = maybe_unserialize($related_article);
    $nonce = wp_create_nonce('post-save-nonce');
    echo '<input type="hidden" name="post_noncename" id="post_noncename" value="' . $nonce . '" />';

    echo '<div class="row auto_field_related_field">';
    if (!empty($related_file_arr)) {
        $speccounter = 0;
        foreach ($related_file_arr as $rel_key => $rel_value) {
            if ($speccounter == 0) {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="add_button_related_field" title="Add field">+</a>
                    </div>      
                </div>';
            } else {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="remove_button_related_field" title="Remove field">-</a>
                    </div>      
                </div>';
            }

            echo '<div class="single_parent_container" rel="' . $speccounter . '" id="main_parent_' . ($speccounter + 1) . '">
                
                <div class="col-xs-2 boot_padding">
                    <label for="imp_spec_key">Enter Article Title</label>
                    <div class="input text">
                        <input placeholder="Enter article title" type="text" name="post_meta[article_title][]" value="' . $rel_value['artcle_title'] . '" class="widefat" />
                    </div>                        
                </div>

                <div class="col-xs-4 boot_padding">
                    <label for="imp_spec_key">Enter Article Link</label>
                    <div class="input text">
                        <input placeholder="Enter article link" type="text" name="post_meta[related_link][]" value="' . $rel_value['artcle_link'] . '" class="widefat" />
                    </div>                        
                </div>
                <div class="col-xs-2 boot_padding">
                    <label for="imp_spec_value">&nbsp;</label>
                    <div class="input text" id="article_view_featured_' . ($speccounter + 1) . '">
                        <input type="button" name="related_file[]"  onclick="return set_article_featured(' . ($speccounter + 1) . ');" value="Set Image" class="more_featured_button" />
                        <img src="' . $rel_value['artcle_img'] . '" width="30" height="30">
                        </div>      
                </div>';
            echo '<div class="related_featured_hidden_area_' . ($speccounter + 1) . '"><input type="hidden" name="post_meta[related_file][]" value="' . $rel_value['artcle_img'] . '"></div>';
            echo $button;
            echo '</div>';

            $speccounter++;
        }
    } else {
        echo '<div>
            
        <div class="col-xs-2 boot_padding">
            <label for="imp_spec_key">Enter Article Title</label>
            <div class="input text">
                <input placeholder="Enter article title" type="text" name="post_meta[article_title][]" value="" class="widefat" />
            </div>                        
        </div>
        
        <div class="col-xs-4 boot_padding">
            <label for="imp_spec_key">Enter Article Link</label>
            <div class="input text">
                <input placeholder="Enter article link" type="text" name="post_meta[related_link][]" value="" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-2 boot_padding">
            <label for="imp_spec_value">&nbsp;</label>
            <div class="input text" id="article_view_featured_0">
                <input type="button" name="related_file[]"  onclick="return set_article_featured(0);" value="Set Image" class="more_featured_button" />
            </div>      
        </div>
        <div class="col-xs-1 boot_padding">
            <label for="add_spec_div">&nbsp;</label>
            <div class="input text">
                <a href="javascript:void(0);" class="add_button_related_field" title="Add field">+</a>
            </div>      
        </div>';
        echo '<div class="related_featured_hidden_area_0"></div>';
        echo '</div>';
    }

    echo '</div>';
    ?>

    <script>
        var jq = jQuery.noConflict();
        jq(document).ready(function () {
            var file_frame;
            var maxField = 10;
            var addButton = jq('.add_button_related_field');
            var wrapper = jq('.auto_field_related_field');
            var x = '<?php echo (empty($related_file_arr)) ? 1 : count($related_file_arr); ?>';
            jq(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    var fieldHTML = '<div class="col-xs-2 boot_padding"><label for="imp_spec_key">Enter Article Title</label><div class="input text"><input placeholder="Enter article title" type="text" name="post_meta[article_title][]" value="" class="widefat" /></div></div><div class="col-xs-4 boot_padding"><label for="realted_link">Enter Article Link</label><div class="input text"> <input placeholder="Enter article link" type="text" name="post_meta[related_link][]" value="" class="widefat" /></div></div><div class="col-xs-2 boot_padding"><label for="choose _image">&nbsp;</label><div class="input text" id="article_view_featured_' + x + '"><input type="button" onclick="return set_article_featured(' + x + ');" value="Set Image" class="more_featured_button" /></div></div><div class="col-xs-1 boot_padding"><label for="remove_spec_div">&nbsp;</label><div class="input text"><a href="javascript:void(0);" class="remove_button_related_field" title="Remove field">-</i></a></div></div><div class="related_featured_hidden_area_' + x + '"></div></div>';
                    jq(wrapper).append('<div class="single_parent_container" rel="' + x + '" id="main_parent_' + x + '">' + fieldHTML + '</div>');
                }
            });
            jq('.auto_field_related_field').on('click', '.remove_button_related_field', function (e) {
                e.preventDefault();
                jq(this).parents().eq(2).remove();
                x--;
            });
        });
    </script><?php
}

/* Creation of post meta box for top products */
add_action('add_meta_boxes', 'top_product_metaboxes');

function top_product_metaboxes() {
    add_meta_box('top_product', 'Top Product', 'top_product', 'post', 'side', 'default');
}

/* define post meta box html for top products */

function top_product($post) {
    global $content_width, $_wp_additional_image_sizes;
    wp_enqueue_media();
    wp_enqueue_script('top-product-js', get_stylesheet_directory_uri() . '/js/admin/top_product.js');
    $top_product = get_post_meta($post->ID, 'top_product_data', true);
    $top_product_arr = maybe_unserialize($top_product);
    $product_status = get_post_meta($post->ID, 'top_product_status', true);
    $status_arr = array(1 => 'Enable', 0 => 'Disable');

    $nonce = wp_create_nonce('post-save-nonce');
    echo '<input type="hidden" name="post_noncename" id="post_noncename" value="' . $nonce . '" />';

    echo '<div class="row status">';
    echo '<div class="col-xs-2 boot_padding">
                    <label for="imp_spec_key">Select Status</label>
                    <div class="input text">';

    echo '<select name="post_meta[top_product_status]">';
    echo '<option value="">Choose Status</option>';
    foreach ($status_arr as $status_key => $status_value) {
        ?><option value="<?php echo $status_key; ?>" <?php if($status_key==$product_status){ echo "selected"; }?>><?php echo $status_value; ?></option><?php
    }

    echo '</select>';
    echo '</div>                        
    </div>';
    echo '<div class="col-xs-2 boot_padding">
                    <label for="imp_spec_key">Order </label>
                    <div class="input text">
                        <input placeholder="Enter order value" name="post_meta[top_product_link_name][]" value="' . $top_value['top_product_link_level'] . '" class="widefat" type="text">
                    </div>                          
                </div>';
    echo '</div>';

    echo '<hr>';
    echo '<div class="row top_product_parent_container">';

    if (!empty($top_product_arr)) {
        $speccounter = 0;
        foreach ($top_product_arr as $top_key => $top_value) {
            if ($speccounter == 0) {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="add_button_top_product" title="Add field">+</a>
                    </div>      
                </div>';
            } else {
                $button = '<div class="col-xs-1 boot_padding">
                    <label for="remove_spec_div">&nbsp;</label>
                    <div class="input text">
                        <a href="javascript:void(0);" class="remove_button_top_product" title="Remove field">-</a>
                    </div>      
                </div>';
            }

            echo '<div class="single_parent_container" rel="' . $speccounter . '" id="main_parent_' . ($speccounter + 1) . '">
                <div class="col-xs-2 boot_padding">
                    <label for="imp_spec_key">Enter Product Name</label>
                    <div class="input text">
                        <input placeholder="Enter product name" name="post_meta[top_product_link_name][]" value="' . $top_value['top_product_link_level'] . '" class="widefat" type="text">
                    </div>                        
                </div>
                
                <div class="col-xs-4 boot_padding">
                    <label for="imp_spec_key">Enter Product Link</label>
                    <div class="input text">
                        <input placeholder="Enter product link" type="text" name="post_meta[top_product_link][]" value="' . $top_value['top_product_link'] . '" class="widefat" />
                    </div>                        
                </div>
                <div class="col-xs-2 boot_padding">
                    <label for="imp_spec_value">&nbsp;</label>
                    <div class="input text" id="top_product_view_featured_' . ($speccounter + 1) . '">
                        <input type="button" name="related_file[]"  onclick="return set_top_product(' . ($speccounter + 1) . ');" value="Set Image" class="more_featured_button" />
                        <img src="' . $top_value['top_product_img'] . '" width="30" height="30">
                        </div>      
                </div>';
            echo '<div class="top_product_hidden_area_' . ($speccounter + 1) . '"><input type="hidden" name="post_meta[top_product_file][]" value="' . $top_value['top_product_img'] . '"></div>';
            echo $button;
            echo '</div>';

            $speccounter++;
        }
    } else {
        echo '<div>
        <div class="col-xs-2 boot_padding">
            <label for="imp_spec_key">Enter Product Name</label>
            <div class="input text">
                <input placeholder="Enter product name" type="text" name="post_meta[top_product_link_name][]" value="" class="widefat" />
            </div>                        
        </div>
        
        <div class="col-xs-4 boot_padding">
            <label for="imp_spec_key">Enter Product Link</label>
            <div class="input text">
                <input placeholder="Enter product link" type="text" name="post_meta[top_product_link][]" value="" class="widefat" />
            </div>                        
        </div>
        <div class="col-xs-2 boot_padding">
            <label for="imp_spec_value">&nbsp;</label>
            <div class="input text" id="top_product_view_featured_0">
                <input type="button" name="related_file[]"  onclick="return set_top_product(0);" value="Set Image" class="more_featured_button" />
            </div>      
        </div>
        <div class="col-xs-1 boot_padding">
            <label for="add_spec_div">&nbsp;</label>
            <div class="input text">
                <a href="javascript:void(0);" class="add_button_top_product" title="Add field">+</a>
            </div>      
        </div>';
        echo '<div class="top_product_hidden_area_0"></div>';
        echo '</div>';
    }

    echo '</div>';
    ?>

    <script>
        var jq = jQuery.noConflict();
        jq(document).ready(function () {
            var file_frame;
            var maxField = 10;
            var addButton = jq('.add_button_top_product');
            var wrapper = jq('.top_product_parent_container');
            var x = '<?php echo (empty($top_product_arr)) ? 1 : count($top_product_arr); ?>';
            jq(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    var fieldHTML = '<div class="col-xs-2 boot_padding"><label for="imp_spec_key">Enter Product Name</label><div class="input text"><input placeholder="Enter product name" type="text" name="post_meta[top_product_link_name][]" value="" class="widefat" /></div></div><div class="col-xs-4 boot_padding"><label for="realted_link">Enter Product Link</label><div class="input text"> <input placeholder="Enter product link" type="text" name="post_meta[top_product_link][]" value="" class="widefat" /></div></div><div class="col-xs-2 boot_padding"><label for="choose _image">&nbsp;</label><div class="input text" id="top_product_view_featured_' + x + '"><input type="button" onclick="return set_top_product(' + x + ');" value="Set Image" class="more_featured_button" /></div></div><div class="col-xs-1 boot_padding"><label for="remove_spec_div">&nbsp;</label><div class="input text"><a href="javascript:void(0);" class="remove_button_top_product" title="Remove field">-</i></a></div></div><div class="top_product_hidden_area_' + x + '"></div></div>';
                    jq(wrapper).append('<div class="single_parent_container" rel="' + x + '" id="main_parent_' + x + '">' + fieldHTML + '</div>');
                }
            });
            jq('.top_product_parent_container').on('click', '.remove_button_top_product', function (e) {
                e.preventDefault();
                jq(this).parents().eq(2).remove();
                x--;
            });
        });
    </script><?php
}
