<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TEMPLATENAME
 */
$logo = esc_attr( get_option( 'logo_url' ) );
$fb = esc_attr( get_option('fb_url') );
$insta = esc_attr( get_option('insta_url') );
$yt = esc_attr( get_option('yt_url') );
$in = esc_attr( get_option('in_url') );

$addressUrl = nl2br(esc_attr( get_option( 'address_url' ) ));
$salesUrl = esc_attr( get_option( 'sales_url' ) );
$supportUrl = esc_attr( get_option( 'support_url' ) );
$copyright = esc_attr( get_option( 'copyright_url' ) );

?>

	</main>
	
	<div class="footer-bai-contact">
		<div class="container">
			<div class="footer-bai-contact-content">
				<h3>BEGIN AGAIN INSTITUTE</h3>
				<p>READY FOR A NEW BEGINNING</p>
				<div class="footer-bai-contact-button">
					<a href="<?php bloginfo('url'); ?>/contact">Contact Us</a>
				</div>
			</div>
		</div>
	</div>

	<footer class="bai-main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="bai-main-footer-address">
						<h4>CONTACT BEGIN AGAIN INSTITUTE</h4>
						<ul class="address-list">
							<li>
								<?php echo $addressUrl; ?>
							</li>
							<li>
								<a href="tel:7207024608">720.702.4608</a><br>
								<a href="mailto:info@beginagaininstitute.com">info@beginagaininstitute.com</a>
							</li>
						</ul>
					</div>
					<div class="bai-main-footer-nav">
						<div class="bai-nav-footer-wrapper">
							<h5>Resources</h5>
							<?php
								wp_nav_menu(array(
									'theme_location' => 'secondary',
									'container' => false,
									'menu_class' => '',
									'fallback_cb' => '__return_false',
									'items_wrap' => '<ul id="%1$s" class="bai-nav-footer">%3$s</ul>',
									'depth' => 2,
									'walker' => new bootstrap_5_wp_nav_menu_walker()
								));
							?>
						</div>
						<div class="bai-nav-footer-wrapper">
							<h5>Other Programs</h5>
							<?php
								wp_nav_menu(array(
									'theme_location' => 'third',
									'container' => false,
									'menu_class' => '',
									'fallback_cb' => '__return_false',
									'items_wrap' => '<ul id="%1$s" class="bai-nav-footer">%3$s</ul>',
									'depth' => 2,
									'walker' => new bootstrap_5_wp_nav_menu_walker()
								));
							?>
							<ul class="footer-social">
								<li>
									<a href="<?php echo $fb; ?>" target="_blank">
										<i class="fa-brands fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo $insta; ?>" target="_blank">
										<i class="fa-brands fa-instagram-square"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo $in; ?>" target="_blank">
										<i class="fa-brands fa-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo $yt; ?>" target="_blank">
										<i class="fa-brands fa-youtube"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="bai-iln-wrapper">
						<div class="bai-iln-logo">
							<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2022/05/iln_logo-white.png" alt="">
						</div>
						<h4>
							Begin Again Institute is a part of Integrative Life Network
						</h4>
						<div class="bai-iln-map">
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="bai-copyright">
		 <div class="container">
			 <div class="bai-copyright-wrapper">
				 <p><?php echo $copyright; ?></p>
				 <ul class="bai-copyright-list">
					 <li>Begin Again Institute Boulder, CO</li>
					 <li>
						 <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a>
					 </li>
					 <li>
						 <a href="<?php bloginfo('url'); ?>/sitemap">Sitemap</a>
					 </li>
				 </ul>
			 </div>
		 </div>
	</div>

	<div class="intensive-modal">
		<div class="intensive-modal-overlay intensive-modal-toggle"></div>
		<div class="intensive-modal-wrapper intensive-modal-transition">
		<div class="intensive-modal-header">
			<button class="intensive-modal-close intensive-modal-toggle"><i class="fa-solid fa-xmark"></i></button>
			<h2 class="intensive-modal-heading">Register Now for Intensive Programs</h2>
		</div>
		
		<div class="intensive-modal-body">
			<div class="intensive-modal-content">
				<?php echo do_shortcode('[contact-form-7 id="2942" title="Intensive Form"]'); ?>
			</div>
		</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.mixitup.min.js"></script>
	<?php wp_footer(); ?>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
	<?php 
		$custom_js = get_option( 'theme_js' );
		if(!empty($custom_js)) {
			?>
				<?php echo '<script>'. $custom_js. '</script> '; ?>
			<?php
		}
	?>
	</body>
</html>