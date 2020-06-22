<?php
add_action( 'init', function() {

    # These settings are in common for the 3 hotels
    $settings = [
                    # Add the post type to the site's main RSS feed:
                    'show_in_feed'      =>   true,
                    // 'show_in_menu'      =>   'pets_menu', # Show under Hotels custom admin menu
                    'capability_type'   =>   'page',
                    'supports'          =>  [
                                                'title'
                                            ],
                    'show_in_rest'      => false,
                    'hierarchical'      => true,

                    'admin_cols'        =>  [
                                                'genre' =>  [
                                                                'title' => 'Type',
                                                                'taxonomy' => 'pet_category'
                                                            ]
                                            ]
                ];


    # $names, change for each hotel
    $names =    [
                    # Override the base names used for labels:
                    'singular'          => 'Pet',
                    'plural'            => 'Pets',
                    'slug'              => 'pet'
                ];

    # register cornucopia post type
    register_extended_post_type( 'pet_cpt', $settings, $names );


    # settings for taxonomies
	$settings =	[
					# Use radio buttons in the meta box for this taxonomy on the post editing screen:
                    'meta_box'		    =>	'radio'
				];

	# names for Pet Type (dog, cat, etc) taxonomy
	$names =	[
					# Override the base names used for labels:
					'singular'			=> 'Pet Category',
					'plural'			=> 'Pet Categories',
					'slug'				=> 'pet-category'
				];

    register_extended_taxonomy( 'pet_category', 'pet_cpt', $settings, $names );


    # names for Gender taxonomy
	$names =	[
					# Override the base names used for labels:
					'singular'			=> 'Pet Gender',
					'plural'			=> 'Pet Genders',
					'slug'				=> 'pet-gender'
				];

    register_extended_taxonomy( 'pet_gender', 'pet_cpt', $settings, $names );

    # names for Previously Owned taxonomy
	$names =	[
					# Override the base names used for labels:
					'singular'          => 'Previously Owned',
					'plural'			=> 'Previously Owned',
					'slug'				=> 'previously-owned'
				];

	register_extended_taxonomy( 'previously_owned', 'pet_cpt', $settings, $names );
} );


/**
 * Register Hotels & Careers custom menu page.
add_action( 'admin_menu', function() {
	add_menu_page(
		'Pets',
		'Pets',
		'edit_posts',
		'pets_menu',
		'',
		'dashicons-admin-home',
		6
	);
} );
*/
