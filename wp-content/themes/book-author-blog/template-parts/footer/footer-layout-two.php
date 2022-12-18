<?php if ( is_active_sidebar( 'footer-layout-two' ) ) :?>
<section class="footer-content">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-12">
			   <?php dynamic_sidebar( 'footer-layout-two' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
