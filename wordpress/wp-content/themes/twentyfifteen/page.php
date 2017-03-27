<?php
/**
*Template Name: Static-Page
*/
get_header(); ?>

	<?php
	// TO SHOW THE PAGE CONTENTS
	while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
		<div class="content-container container-fluid">
			<?php the_content(); ?> <!-- Page Content -->
		</div><!-- .entry-content-page -->
	<?php endwhile?>

<?php get_footer(); ?>
