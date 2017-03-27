<?php
include 'templates/post-template.php';

/* den offset irgendwie aus index.php herauskriegen
oder alternativ das hier bei index.php verlinken... */
$offset = 4;
$step = 3;

if (isset($_POST['action'])) {
    call_user_func($_POST['action']);
}

function load_more(){
    global $offset, $step;
    $args = array(
        'numberposts' => $step,
        'offset' => $offset,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' =>'',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    foreach (get_posts($args) as $post) {
        create_post($post, "post col-xs-12 col-sm-6 col-lg-4",
                            "headline", "truncate", "date");
    }

    $offset += $step;
}

?>