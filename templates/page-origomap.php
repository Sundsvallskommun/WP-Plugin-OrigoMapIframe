


<?php sk_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="container-fluid">

<div class="origomap">

	<div class="origomap__content" id="post-content">

		<?php do_action('sk_before_page_title'); ?>

		<h1 class="single-post__title"><?php the_title(); ?></h1>

		<?php do_action('sk_after_page_title'); ?>

		<?php do_action('sk_before_page_content'); ?>

		<?php Sk_Origo_Map_Iframe_Public::print_map(); ?>

		<div class="clearfix"></div>

		<?php do_action('sk_after_page_content'); ?>


	</div>

</div> <?php //.row ?>

</div> <?php //.container-fluid ?>

<?php endwhile; ?>

<?php get_footer(); ?>
