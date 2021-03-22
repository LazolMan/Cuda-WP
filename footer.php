<?php
?>

<footer class="footer">
	<div class="wrapper">
		<nav class="footer_social">
			<?php
			wp_nav_menu(array(
				'theme_location' 	=> 'footer',
				'menu_id' 			=> 'footer-menu',
				'container' 		=> 'ul',
			));
			?>
		</nav>
	</div>
</footer>

<!--<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'cuda')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'cuda'), 'WordPress');
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf(esc_html__('Theme: %1$s by %2$s.', 'cuda'), 'cuda', '<a href="http://underscores.me/">Underscores.me</a>');
				?>
		</div>
	</footer>
</div>-->

<?php wp_footer(); ?>

</body>

</html>