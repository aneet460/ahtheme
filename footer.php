<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Themetacular
 */

?>

	<!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ahtheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ahtheme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ahtheme' ), 'ahtheme', '<a href="http://underscores.me/" rel="designer">Aneet H</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php $options = get_option('ah_options_settings'); ?>
<?php wp_footer(); ?>
    <style type="text/css">
        #secondary{
            background-color: <?php echo $options['ah_rad_field']; ?>
        }
</style>

</body>
</html>
