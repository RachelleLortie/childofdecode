<?php
/**
 * The template for displaying taxonomy archives
 *
 *
 * @package Decode
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
                                <?php
                                        $current_term = get_queried_object();
                                        $taxonomy = get_taxonomy($current_term->taxonomy);
                                        echo $taxonomy->label . ': ' . $current_term->name;
                                ?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php 
				if ( get_theme_mod( 'use_excerpts', false ) == true && ! is_sticky() ) {
					get_template_part( 'content', 'excerpt' );
				}
				
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				else {
					get_template_part( 'content', get_post_format() );
				}
			?>

		<?php endwhile; else : ?>
	
			<?php get_template_part( 'content-none', 'none' ); ?>
	
		<?php endif; ?>

	</main><!-- #main -->
	
	<?php decode_paging_nav(); ?>
	
</section><!-- #primary -->

<?php get_footer(); ?>