<?php
/**
 * The header for the theme.
 *
 * Displays all of the <head> section and everything up till <div id="content" class="site-content">
 *
 * @package Decode
 */
?><!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php tha_head_top(); ?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod( 'favicon_image', '' ) ) { echo '<link rel="icon" href="' . esc_url( get_theme_mod( 'favicon_image', '' ) ) . '">'; } ?>
<?php if ( get_theme_mod( 'favicon_image', '' ) ) { echo '<link rel="apple-touch-icon-precomposed" href="' . esc_url( get_theme_mod( 'favicon_image', '' ) ) . '">'; } ?>

<?php tha_head_bottom(); ?>
<?php wp_head(); ?>

<script src="//use.typekit.net/swe2zbl.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
	<?php tha_body_top(); ?>
<div id="top-border-bar"></div>
<div id="page" class="hfeed site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'decode' ); ?></a>
	
	<?php function decode_create_sidebar_link() {
		if ( get_theme_mod( 'show_sidebar', true ) == true ) : ?>
		<button id="sidebar-link" class="sidebar-link SidebarLink <?php echo get_theme_mod( 'sidebar_button_position', 'left' );?>" title="<?php _e( 'Show sidebar', 'decode' )?>">
		<p> MENU </p> 
		</button>
        
       

		<?php endif;
	}?>
	<?php add_action( 'tha_header_before', 'decode_create_sidebar_link' ); ?>
	
	<?php tha_header_before(); ?>
	<?php if ( get_theme_mod( 'constant_sidebar', 'closing' ) == 'constant' && get_theme_mod( 'show_sidebar', true ) == true ) { echo '<div class="site-scroll">'; } ?>
    
	<header id="masthead" class="site-header" role="banner">
		<?php tha_header_top(); ?>
		
		<div class="site-branding">
			
			<?php function decode_create_header_image() {
				if ( get_header_image() != '' ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img class="site-logo" src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="100%" alt="">
					</a>
				<?php endif;
			}
			add_action( 'decode_header_image', 'decode_create_header_image' ); ?>
			<?php decode_header_image(); ?>
				
			<?php if ( get_theme_mod( 'show_site_title', true ) == true ) : ?>			
				<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'show_site_description', true ) == true ) : ?>
				<?php if ( get_theme_mod( 'html_description', '' ) !== '' ) : ?>
				<h2 class="site-description"><?php echo get_theme_mod( 'html_description' ); ?></h2>
				<?php elseif ( get_theme_mod( 'html_description', '' ) == '' ) : ?>
				<h2 class="site-description"><?php echo get_bloginfo( 'description' );?></h2>
				<?php endif; ?>
			<?php endif; ?>
			
		</div>
		
		<?php if ( get_theme_mod( 'show_header_social_icons', false ) == true ) {
			get_template_part( 'social-links' );
		} ?>

		<?php if ( get_theme_mod( 'show_header_menu', true ) == true ) :
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'container'      => false,
				'menu_class'     => 'menu horizontal-menu header-menu',
				'menu_id'        => 'header-menu',
				'items_wrap'     => '<nav id="%1$s" class="%2$s" role="navigation"><ul>%3$s</ul></nav><!-- #header-menu -->',
			) );
		endif; ?>
		
		<?php tha_header_bottom(); ?>
        
            <?php if(is_home() && !is_paged()) { ?>
    <div class="introtext">
    <p class="site-main">
    	Learn History  &bull;  Be History  &bull;  Make History
    </p>
    </div>
	<?php 
	}
	?>
    
       
    <?php if(!is_home() && !is_paged()) { ?>
    
    <div class="orange-top"></div>
    <?php
    }
    ?>
        
		
	</header><!-- #masthead -->
 
    
		<?php tha_header_after(); ?>
	
		<?php if ( (function_exists( 'bcn_display' ) || function_exists( 'breadcrumb_trail' )) && ! is_front_page() ) : ?>
		
			<nav class="site-breadcrumbs" role="navigation">
				
				<div class="site-breadcrumbs-container">
				
				<?php if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
		
				if ( function_exists( 'breadcrumb_trail' ) ) {
					breadcrumb_trail();
				} ?>
				
				</div>
				
			</nav><!-- .breadcrumbs -->
			
		<?php endif; ?>

	<div id="content" class="site-content">
		<?php tha_content_top(); ?>
