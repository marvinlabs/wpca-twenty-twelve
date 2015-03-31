<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package TwentyTwelvePlus
 *
 * @since Twenty Twelve Plus 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'wpcatt_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twenty-twelve-plus' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twenty-twelve-plus' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twenty-twelve-plus' ), 'WordPress' ); ?></a>
            &dash;
            <a href="<?php echo esc_url( __( 'http://wp-customerarea.com/', 'twenty-twelve-plus' ) ); ?>" title="<?php esc_attr_e( 'Publish private content, easily', 'twenty-twelve-plus' ); ?>"><?php printf( __( 'Supports %s', 'twenty-twelve-plus' ), 'WP Customer Area' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>