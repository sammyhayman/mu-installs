<?php

function imgResize( $image, $width, $height = null, $crop = null, $single = true, $upscale = false ) {
    if ( ! $image[ 'url' ] ) {
        return;
    }

    $img = $image[ 'url' ];
    $alt = $image[ 'alt' ];
    $img = aq_resize( $img, $width, $height, $crop, $single, $upscale );

    $output = "<img src='{$img}' alt='{$alt}'>";

    echo $output;
}
