<?php

add_filter( 'block_categories_all', function( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'ava_block_category',
                'title' => __( 'Custom Blocks', 'ava_block' ),
            ],
        ]
    );
}, 10, 2);
