<?php

function ava_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'ava_block_category',
                'title' => __( 'Custom Blocks', 'ava_block' ),
            ],
        ]
    );
} add_filter( 'block_categories', 'ava_block_category', 10, 2);

function imgResize( $image, $width, $height = null, $crop = null, $single = true, $upscale = false ) {
    $img = $image[ 'url' ];
    $alt = $image[ 'alt' ];
    $img = aq_resize( $img, $width, $height, $crop, $single, $upscale );

    $output = "<img src='{$img}' alt='{$alt}'>";

    echo $output;
}
