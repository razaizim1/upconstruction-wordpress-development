<?php

//Declare Vars
$comment_send = 'Post a comment';
$comment_reply = 'Leave a Message';
$comment_reply_to = 'Reply';

$comment_author = 'Your Name*';
$comment_email = 'Your Email*';
$comment_body = 'Your Comment*';
$comment_url = 'Your Website';
$comment_cookies_1 = ' By commenting you accept the';
$comment_cookies_2 = ' Privacy Policy';

$comment_before = 'Your email address will not be published. Required fields are marked *';

$comment_cancel = 'Cancel Reply';

//Array
$comments_args = array(
    //Define Fields
    'fields' => array(
        //Author field
        'author' => '<div class="form-group blog-form"><p class="comment-form-author">
        <br />
        <input class="form-control" id="author" name="author" aria-required="true" placeholder="' . $comment_author . '">
        </input>
        </p>
        </div>',
        //Email Field
        'email' => '<div class="blog-form form-group">
        <p class="comment-form-email">
        <br />
        <input class="form-control" id="email" name="email" placeholder="' . $comment_email . '"></input>
        </p>
        </div>',
        //URL Field
        'url' => '<p class="blog-form comment-form-url"><br /><input class="form-control" id="url" name="url" placeholder="' . $comment_url . '"></input></p>',
        //Cookies
        'cookies' => '<input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
    ),
    // 'submit_button' => '<input type="submit" class="btn btn-primary">'.$comment_send.'</input>',
    // Change the title of send button
    'label_submit' => __($comment_send),
    // Change the title of the reply section
    'title_reply' => __($comment_reply),
    // Change the title of the reply section
    'title_reply_to' => __($comment_reply_to),
    //Cancel Reply Text
    'cancel_reply_link' => __($comment_cancel),
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="form-group comment-form-comment blog-form"><br /><textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="' . $comment_body . '"></textarea></p>',
    //Message Before Comment
    'comment_notes_before' => __($comment_before),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    //Submit Button ID
    'id_submit' => __('comment-submit'),
);
comment_form($comments_args);



