<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-thumbnails');
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
}
add_action('widgets_init', 'category_widget');

set_post_thumbnail_size(200, 170, true); // Sets the Post Main Thumbnails 
add_image_size('delicious-recent-thumbnails', 55, 55, true); // Sets Recent Posts Thumbnails 

?>
<ul>
    <?php
    function delicious_recent_posts()
    {
        $del_recent_posts = new WP_Query();
        $del_recent_posts->query('showposts=3');
        while ($del_recent_posts->have_posts()):
            $del_recent_posts->the_post(); ?>
            <li>
                <a href="<?php esc_url(the_permalink()); ?>">
                    <?php the_post_thumbnail('delicious-recent-thumbnails'); ?>
                </a>
                <h4>
                    <a href="<?php esc_url(the_permalink()); ?>">
                        <?php esc_html(the_title()); ?>
                    </a>
                </h4>
            </li>
        <?php endwhile;
        wp_reset_postdata();
    }
    ?>
</ul>
<?php

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