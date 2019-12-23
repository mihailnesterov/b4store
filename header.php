<?php
/**
 * The header for b4store theme.
 *
 * Displays all of the <head> section and everything up till <div id="page-content-container">
 *
 * @package b4store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-71405826-17', 'auto');
  ga('send', 'pageview');
</script>
</head>

<body <?php body_class(); ?>>

<?php //do_action( 'b4store_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php //do_action( 'b4store_before_header' ); ?>

	<header id="header" role="banner">
		<?php
			/**
			 * Functions hooked into b4store_header action
			 * @see inc/b4store-hooks.php
			 *
			 * @hooked b4store_header_navbar_open				- 0
			 * @hooked b4store_header_site_branding				- 5
			 * @hooked b4store_header_product_search			- 10
			 * @hooked b4store_header_contacts					- 20
			 * @hooked b4store_header_navbar_toggler			- 30
			 * @hooked b4store_header_navbar_collapse			- 40
			 * @hooked b4store_header_navbar_close				- 50
			 */
			do_action( 'b4store_header' );
		?>
    </header> <!-- ./ header -->

	<?php
	/**
	 * Functions hooked into b4store_main_menu
	 * @see inc/b4store-hooks.php
	 *
	 * @hooked b4store_main_menu_open			- 0
	 * @hooked b4store_main_menu_items			- 10
	 * @hooked b4store_shopping_cart			- 20
	 * @hooked b4store_main_menu_close			- 30
	 */
	do_action( 'b4store_main_menu' );
	?>

	<!-- Page Content -->
    <div id="page-content-container" class="container animated fadeIn mb-5">
        <div class="row">
            <div class="col-12">
		<?php
		//do_action( 'b4store_content_top' );
