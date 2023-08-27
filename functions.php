<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Register Menu
    register_nav_menus(
        array(
            'header_menu' => 'Header Menu',
            'footer_menu' => 'Footer Menu'
        )
    );


    // Post Type of Services
    register_post_type(
        'services',
        array(

            'labels' => array(
                'name' => 'Services',
                'add_new' => 'Add New Service',
                'add_new_item' => 'Add New Service'
            ),

            'public' => true,
            'menu_icon' => 'dashicons-chart-pie'
        )
    );

    // Post Type of Alt Services
    register_post_type(
        'alt_services',
        array(

            'labels' => array(
                'name' => 'Alt Services',
                'add_new' => 'Add New Service',
                'add_new_item' => 'Add New Service'
            ),

            'public' => true,
            'menu_icon' => 'dashicons-schedule'
        )
    );

    // Taxonomy of Alt Services
    register_taxonomy(
        'alt_service_category',
        'alt_services',
        array(
            'labels' => array(
                'name' => 'Alt Item Category',
                'singular_name' => 'Category',
                'search_name' => 'Search Category',
                'popular_items' => 'Popular Categories',
                'all_items' => 'All Categories',
                'parent_item' => 'Parent Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => 'New Category',
                'not_found' => 'Category not found'
            ),
            'hierarchical' => true
        )
    );


    // Post Type of Our Project
    register_post_type(
        'our_projects',
        array(

            'labels' => array(
                'name' => 'Porjects',
                'add_new' => 'Add New Projects',
                'add_new_item' => 'Add New Projects',
                'edit_item' => 'Edit Project',
                'new_item' => 'New Project',
                'remove_featured_image' => 'Remove Project Image',
                'featured_image' => 'Project Image',
                'set_featured_image' => 'Set Project Image'
            ),
            'supports' => array('title', 'editor', 'thumbnail'),
            'public' => true,
            'menu_icon' => 'dashicons-align-right'
        )
    );

    // Register Taxonomy For Our Projects
    register_taxonomy(
        'projects_filter',
        'our_projects',
        array(
            'labels' => array(
                'name' => 'Project Filters',
                'singular_name' => 'Filter',
                'search_name' => 'Search Filter',
                'popular_items' => 'Popular Filters',
                'all_items' => 'All Filters',
                'parent_item' => 'Parent Filter',
                'add_new_item' => 'Add New Filter',
                'new_item_name' => 'New Filter',
                'not_found' => 'Filter not found'
            ),
            'hierarchical' => true
        )
    );

    // Post Type of Our Project
    register_post_type(
        'testimonials',
        array(

            'labels' => array(
                'name' => 'Testimonials',
                'add_new' => 'Add New Testimonial',
                'add_new_item' => 'Add New Testimonial',
                'edit_item' => 'Edit Testimonial',
                'new_item' => 'New Testimonial',
            ),
            'public' => true,
            'menu_icon' => 'dashicons-testimonial'
        )
    );

});



function category_widget()
{
    register_sidebar(
        array(
            'id' => 'blog_category',
            'name' => 'Blog Category',
            'description' => 'This is Blog Sidebar',
            'before_title' => '<h3 class="sidebar-title">',
            'after_title' => '</h3>',
            'before_widget' => '<div class="custom-widget    %2$s">',
            'after_widget' => '</div>'
        )
    );
    register_sidebar(
        array(
            'id' => 'footer_menus',
            'name' => 'Footer Menus',
            'description' => 'This is footer Menus',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
            'before_widget' => '<div class="col-lg-2 col-md-3 footer-links">',
            'after_widget' => '</div>',

        ),
    );
}
add_action('widgets_init', 'category_widget');

// Footer Menu





//Comment Field Order
add_filter('comment_form_fields', 'mo_comment_fields_custom_order');
function mo_comment_fields_custom_order($fields)
{
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset($fields['comment']);
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['cookies']);
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}


// Check core class for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'codestar';

    // Create options
    CSF::createOptions(
        $prefix,
        array(
            'menu_title' => 'Theme Options',
            'menu_slug' => 'my-framework',
        )
    );


    //Custom Section for Search Page
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Header Options',
            'fields' => array(

                // A text field
                array(
                    'id' => 'header_logo',
                    'type' => 'text',
                    'title' => 'Logo Text',
                    'default' => 'UpConstruction'
                ),

            )
        )
    );

    //Custom Field for Footer
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Footer Options',
            'fields' => array(

                // Footer Title
                array(
                    'id' => 'footer_logo',
                    'type' => 'text',
                    'title' => 'Footer Logo',
                    'default' => 'UPCONSTRUCTION'
                ),
                // Footer Address
                array(
                    'id' => 'footer_address',
                    'type' => 'text',
                    'title' => 'Footer Address',
                    'default' => 'A108 Adam Street NY 535022 USA'
                ),
                // Footer Contacts info email and phone number
                array(
                    'id' => 'footer_contact',
                    'type' => 'repeater',
                    'title' => 'Contact Info',
                    'fields' => array(
                        array(
                            'id' => 'contact_name',
                            'type' => 'text',
                            'title' => 'Contact Name',
                            'default' => 'Phone'
                        ),
                        array(
                            'id' => 'contact_info',
                            'type' => 'text',
                            'title' => 'Contact Info',
                            'default' => '+880 179294 5956'
                        ),
                    )
                ),
                // Footer Social Media
                array(
                    'id' => 'socials',
                    'type' => 'repeater',
                    'title' => 'Socials',
                    'fields' => array(
                        array(
                            'id' => 'social_link',
                            'type' => 'text',
                            'title' => 'Social Link',
                            'default' => 'https://www.facebook.com/razai-zim-100063912362370'
                        ),
                        array(
                            'id' => 'social_icon',
                            'type' => 'text',
                            'title' => 'Social Icon',
                            'default' => 'bi bi-facebook'
                        )
                    )
                )

            )
        )
    );

    //Custom Section for Search Page
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Search Page Title',
            'fields' => array(

                // A text field
                array(
                    'id' => 'search_title',
                    'type' => 'text',
                    'title' => 'Page Title',
                    'default' => 'Search'
                ),

            )
        )
    );

    // Create a section
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Blog Page Title',
            'fields' => array(

                // A text field
                array(
                    'id' => 'blog_title',
                    'type' => 'text',
                    'title' => 'Page Title',
                    'default' => 'Blog'
                ),

            )
        )
    );


    // Create a section for Breadcrumb
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Breadcrumb Background Image',
            'fields' => array(

                // A text field
                array(
                    'id' => 'breadcrumb_background_image',
                    'type' => 'media',
                    'title' => 'Breadcrumb Background Image'
                ),

            )
        )
    );

    // Create a section
    CSF::createSection(
        $prefix,
        array(
            'title' => 'Author Info',
            'fields' => array(

                // A text field
                array(
                    'id' => 'social',
                    'type' => 'repeater',
                    'title' => 'Social Links & Icons',
                    'fields' => array(
                        array(
                            'id' => 'social_link',
                            'type' => 'text',
                            'title' => 'Social Link',
                            'default' => 'https://instagram.com/#',
                        ),
                        array(
                            'id' => 'social_icon',
                            'type' => 'text',
                            'title' => 'Social Icon',
                            'default' => 'biu bi-instagram'
                        )
                    )

                ),
                array(
                    'id' => 'about',
                    'type' => 'textarea',
                    'title' => 'About Author',
                    'default' => 'Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.'
                ),

            )
        )
    );

}








?>