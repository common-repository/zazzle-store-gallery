<?php

add_action('widgets_init', create_function('', 'return register_widget("ZazzleWidget");'));

class ZazzleWidget extends WP_Widget {
    /** constructor */
    function ZazzleWidget() {
        parent::WP_Widget(false, $name = 'Zazzle');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $widget_title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($widget_title) {
            echo $before_title . $widget_title . $after_title;
        }
        $widget_id = $args['widget_id'];
        
        $gallery_config = array(
            rows => is_int($instance['zazzle_number_of_items']) ? $instance['zazzle_number_of_items'] : 1,
            cols => 1,
            bg   => $instance['zazzle_background_color'],
            pt   => $instance['zazzle_product_line'],
        );
        echo fetch_gallery($gallery_config);

        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $widget_title = esc_attr($instance['title']);
        $zazzle_product_line = esc_attr($instance['zazzle_product_line']);
        $zazzle_background_color = esc_attr($instance['zazzle_background_color']);
        $zazzle_number_of_items = esc_attr($instance['zazzle_number_of_items']);
?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'zazzle'); ?>:
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $widget_title; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('zazzle_product_line'); ?>"><?php _e('Product Line', 'zazzle') ?>:
					<select class="widefat" name="<?php echo $this->get_field_name('zazzle_product_line'); ?>" id="<?php echo $this->get_field_id('zazzle_product_line'); ?>">
					<option value=""><?php _e('All', 'zazzle') ?></option>
					<option value="">----------</option>
					<?php
						global $zazzle_product_line;
						foreach ($zazzle_product_line as $key => $value) {
                    ?>
                            <option value="<?php echo $key ?>" <?php selected($key, $instance["zazzle_product_line"]); ?>><?php _e($value, 'zazzle') ?></option>
                    <?php
						}
					?>
					</select>
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('zazzle_background_color'); ?>"><?php _e('Background Color', 'zazzle') ?>:
                    <input class="widefat" id="<?php echo $this->get_field_id('zazzle_background_color'); ?>" name="<?php echo $this->get_field_name('zazzle_background_color'); ?>" type="text" value="<?php echo $zazzle_background_color; ?>" />
                </label>
                <span class="description" style="font-size: 85%"><?php _e('Background color of the product image in HEX without "#".', 'zazzle') ?></span>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('zazzle_number_of_items'); ?>"><?php _e('Number of Items to Show', 'zazzle'); ?>:
                    <input class="widefat" id="<?php echo $this->get_field_id('zazzle_number_of_items'); ?>" name="<?php echo $this->get_field_name('zazzle_number_of_items'); ?>" type="text" value="<?php echo $zazzle_number_of_items; ?>" />
                </label>
            </p>
<?php
    }

} // class ZazzleWidget    

?>