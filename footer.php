			<footer>
				<div class="site_main_footer">
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar('footer-widget'); ?>
						</div>
					</div>
				</div>
				<div class="site_copyright">
					<?php echo do_shortcode('[copyright]'); ?>
					<?php echo do_shortcode('[developer]'); ?>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
		<?php
			if(get_option('rocket_scripts')!=null){
				echo get_option("rocket_scripts");		
			}
		?>
	</body>
</html>