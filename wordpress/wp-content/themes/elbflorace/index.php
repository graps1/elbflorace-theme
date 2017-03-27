<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Elbflorace
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

<div id="posts" class="content-container container-fluid">
  <div class="col-xs-12 headline-big">Beiträge</div>

  <div id="posts">
        <?php
      
        $args = array(
        'numberposts' => 4,
        'offset' => 0,
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

        $posts_array = get_posts( $args );

        //Der erste Post soll hervorgehoben werden
        $first_post = $posts_array[0];
        create_post($first_post, "post col-xs-12", "headline-big", "truncate", "date");

        for ($i=1; $i<sizeof($posts_array); $i++) {
            $post = $posts_array[$i];

            create_post($post, "post col-xs-12 col-sm-6 col-lg-4", "headline", "truncate", "date");
        }
        ?>
  </div>
  <button class="load-more-btn">Mehr Laden...</button>

  <form class="newsletter col-xs-12 form-inline">
    <div class="headline">Für Newsletter anmelden</div>
    <p class="text-custom">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco
        laboris nisi ut aliquip ex ea commodo consequat.
    </p>
    <div class="form-group">
      <label class="text-custom-big" for="email">Email:</label>
      <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
      <label class="text-custom-big" for="name">Name:</label>
      <input type="text" class="form-control" id="name">
    </div>
    <button class="col-sm-3 glyphicon btn newsletter-button text-custom">
      Bestätigen
    </button>
  </form>

</div>

<?php get_footer(); ?>
