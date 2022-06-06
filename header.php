<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEMPLATENAME
 */
	$fav = esc_attr( get_option( 'favicon_url' ) );
	$logo = esc_attr( get_option( 'logo_url' ) );
	$supportUrl = esc_attr( get_option( 'support_url' ) );
	$salesUrl = esc_attr( get_option( 'sales_url' ) );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
		<?php
        if (wp_title('', false)) {
			echo "";
        } else {
            echo bloginfo('description');
        } wp_title('');
		?>
	</title>
    <link rel="icon" href="<?php echo $fav; ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<?php wp_head(); ?>
	<?php 
		$custom_css = get_option( 'theme_css' );
		if(!empty($custom_css)) {
			?>
				<?php echo '<style type="text/css">'. $custom_css. '</style> '; ?>
			<?php
		}
	?>
</head>
<body <?php body_class(); ?>>

<!-- header -->
<header class="header">
	<div class="top-header">
		<div class="container">
			<div class="top-header-wrapper">
				<a href="tel:7207024608">Call Now: 720.702.4608</a>
			</div>
		</div>
	</div>
	<div class="header-nav">
		<div class="container">
			<div class="header-wrapper">
				<div class="header-logo">
					<a href="<?php bloginfo('home'); ?>" class="header-logo-link">
						<img src="<?php echo $logo; ?>" alt="">
					</a>
				</div>
				<div class="header-nav-menu" id="main-menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => false,
						'menu_class' => '',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="header-nav-list">%3$s</ul>',
						'depth' => 3,
						'walker' => new bootstrap_5_wp_nav_menu_walker()
					));
					?>
				</div>
				<div class="burger-wrapper">
					<span class="burger-menu"></span>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- end of header -->

<main>