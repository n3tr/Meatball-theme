<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package meatball
 */
?>
			</div> <!-- container -->
		</main><!-- #main -->
	</div><!-- #content -->

	<!-- <footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'meatball' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'meatball' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'meatball' ), 'meatball', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div>
	</footer> -->


	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X','auto');ga('send','pageview');
	</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
