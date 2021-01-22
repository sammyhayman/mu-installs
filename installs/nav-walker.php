<?php
/**
 * Navigation Walker
 */
class MDBootstrapMenu extends Walker_Nav_menu {
    function start_el( &$output, $item, $depth = 0, $args = [  ], $id = 0 ) {
        $object        = $item->object;
        $type          = $item->type;
        $classes       = $item->classes;
        $title         = $item->title;
        $desc          = $item->description;
        $link          = $item->url;

        // Atts for the link itself.
        $atts = array();
        $atts['title']  = esc_attr( $item -> attr_title );
        $atts['target'] = esc_attr( $item -> target );
        $atts['rel']    = esc_attr( $item -> xfn );
        $atts['description']    = esc_attr( $item -> description );
        $atts['href']   = esc_url(  $item -> url );

        // Combine the atts into a string for inserting into the link tag.
        $atts_str = '';
        foreach ( $atts as $k => $v ) {
            if ( empty( $v ) ) { continue; }
            $atts_str .= " $k='$v' ";
        }

        if ( in_array( 'menu-item-has-children', $classes ) ) {
            if ( $depth === 0 ) {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item xyz-nested'>";
            } else {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item'>";
            }
            $output .= "<a {$atts_str} class='dropdown-item'>{$title}</a>";
            $output .= '<div class="drop-dropdown"><i class="fas fa-caret-down"></i></div>';
        } else {
            if ( $depth === 0 ) {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item xyz-nested'>";
            } else {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item'>";
            }
            $output .= "<a {$atts_str} class='dropdown-item'>{$title}</a>";
        }

        /*
        if ( in_array( 'menu-item-has-children', $classes ) && $depth == 0 ) {
            $output .= "<li class='" . implode( " ", $classes ) . " dropdown multi-level-dropdown nav-item'>";
            $output .= "<a class='nav-link dropdown-toggle' data-toggle='dropdown'>{$title}</a>";
        } else {
            if ( $depth == 0 ) {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item'>";
                $output .= "<a {$atts_str} class='nav-link'>{$title}</a>";
            } elseif ( in_array( 'menu-item-has-children', $classes ) ) {
                $output .= "<li class='" . implode( " ", $classes ) . " dropdown dropdown-submenu nav-item'>";
                $output .= "<a class='nav-link dropdown-toggle' data-toggle='dropdown'>{$title}</a>";
            } else {
                $output .= "<li class='" . implode( " ", $classes ) . " nav-item'>";
                $output .= "<a {$atts_str} class='dropdown-item'>{$title}</a>";
            }
        }
        */
    }

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( $depth > 0 ) {
            //$output .= "<div class='sub-menu-wrapper'>";
            $output .= "<ul class='sub-menu child'>";
        } else {
            $output .= "<ul class='sub-menu'>";
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( $depth > 0 ) {
            $output .= "</ul>";
            //$output .= "</div>";
        } else {
            $output .= "</ul>";
        }
    }
    /*
    */
}
