<?php

/* overide the widget section according to theme html design */
add_action('widgets_init', 'register_my_widgets');

function register_my_widgets() {
    register_widget('Buenosybaratos_Widget');
}

class Buenosybaratos_Widget extends WP_Widget_Text {

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $text = apply_filters('widget_text', empty($instance['text']) ? '' : $instance['text'], $instance);
        echo $before_widget;
        if (!empty($title)) {
            //echo $before_title . $title. $after_title;
        }
        echo!empty($instance['filter']) ? wpautop('<p>' . $text . '</p>') : '<p>' . $text . '</p>';
        echo $after_widget;
    }

}
