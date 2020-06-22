<?php

class ava_Show_Product_Class extends WP_Widget {
    public function __construct(  ) {
        $widget_options = [
            'classname'     => 'ava_show_product',
            'description'   => 'Display a particular product.'
        ];

        parent::__construct( 'ava_show_product', 'Show Product', $widget_options );
    }

    public function widget( $args, $instance ) {
        $fields = get_fields( 'widget_' . $args[ 'widget_id' ] );
        echo \App\template(
                            "widgets/show-product",
                            [
                                'args'      => $args,
                                'instance'  => $instance,
                                'flds'      => $fields
                            ]
                        );
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }
}

function ava_Show_Product(  ) {
    register_widget( 'ava_Show_Product_Class' );
} add_action( 'widgets_init', 'ava_Show_Product' );
