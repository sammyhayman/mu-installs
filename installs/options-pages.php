<?php

/**
 * Add Options Pages
 */
if ( function_exists( 'acf_add_options_page' ) ) {
    add_action(
        'acf/init',
        function() {
            /* acf_add_options_page([
                'page_title'    => 'Admin Only Settings',
                'menu_title'    => 'Admin Only Settings',
                'menu_slug'     => 'admin-only-settings',
                'capability'    => 'manage_options',
                'redirect'      => false,
                'autoload'      => true
            ]); */

            acf_add_options_page([
                'page_title'    => 'Site Settings',
                'menu_title'    => 'Site Settings',
                'menu_slug'     => 'general-site-settings',
                'capability'    => 'edit_posts',
            ]);

            acf_add_options_page([
                'page_title'    => 'Announcements',
                'menu_title'    => 'Announcements',
                'menu_slug'     => 'announcements-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false,
                'autoload'      => true
            ]);

            /*
            acf_add_options_sub_page(array(
                'page_title'    => 'Theme Footer Settings',
                'menu_title'    => 'Footer',
                'parent_slug'   => 'theme-general-settings',
            ));*/
        }
    );
}
