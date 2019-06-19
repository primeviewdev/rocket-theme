<?php
/**
 * The template for displaying all post page
 **/
 
$thumb = '/wp-content/uploads/2018/06/heavy-one-default-banner-page.jpg';
if(file_exists($thumb)){
	$image = get_field('banner_image');
	if ( $image ) : $thumb = $image; endif;	
}

get_header(); ?>
	<div id="primary" class="post innerpage site-content">
		<header style="background-image: url('<?= $thumb ?>')" class="innerpage-header">
			<h1 class="text-center innerpage-title"><?php the_title(); ?></h1>
		</header>
		<div class="container main_content">
			<div class="row" role="main">
				<div class="col-md-8">
				<?php 
					while (have_posts()){ 
						the_post(); 
						get_template_part( 'content', 'single' ); 
					} 
				?>
				</div><!-- .col-md-8 -->
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div><!-- .col-md-4 -->
			</div><!--.row -->
		</div><!-- .container--> 
	</div><!-- .primary -->
<?php get_footer(); ?>