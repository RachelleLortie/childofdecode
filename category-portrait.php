<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Decode
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
            
            <header class="page-header">
			<h1 class="page-title">
				<?php
					if ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'decode' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'decode' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'decode' ) ) . '</span>' );

					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'decode' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'decode' ) ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						_e( 'Galleries', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						_e( 'Images', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						_e( 'Videos', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						_e( 'Quotes', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						_e( 'Links', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						_e( 'Statuses', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						_e( 'Audios', 'decode' );

					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						_e( 'Chats', 'decode' );

					else :
						_e( 'Archives', 'decode' );

					endif;
				?>
			</h1>
                
            
        
            
                <nav class="filter-boxes">
                <div class="tax-stack">

                    <div class = "option-set">
                        <ul>
                        <?php
                        $terms = get_terms( 'period', array( 'hide_empty' => true ) );
                        
                        if (!empty( $terms ) && !is_wp_error( $terms ) ){
                            foreach( $terms as $term){ ?>
                                <li>
                                    <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" />
                                    <label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label>
                                </li>
                            <?php
                            }
                        }
                        ?>   
                        </ul>
                    </div>
                </nav>
                        <div id="innermain">

			<?php if ( have_posts() ) : ?>
            
            		

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                            <?php
                            // Do we have a featured image? If so, display it
                            if (has_post_thumbnail()){
                            ?>
                          
                                <figure class="history-portrait <?php echo custom_taxonomies_terms_links($post->ID); ?>">
                                    <a href="<?php echo get_the_permalink(); ?>" title="Read the article: <?php echo esc_attr(get_the_title()); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </figure>
                        
                            <?php
                            }
                            ?>

			<?php endwhile; ?>

		<?php endif; ?>

                        </div>
  

            
	</main><!-- #main -->
	
	<?php decode_paging_nav(); ?>
	
</section><!-- #primary -->

<?php get_footer(); ?>