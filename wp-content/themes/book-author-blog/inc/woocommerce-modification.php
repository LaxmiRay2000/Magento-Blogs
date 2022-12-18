<?php
/**
 * Wrapper Markup
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_before_main_content', 'book_author_blog_woo_before_main_content', 10 );
function book_author_blog_woo_before_main_content() {
	?>
	<section class="shop-page-main-block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
	<?php
}
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action( 'woocommerce_after_main_content', 'book_author_blog_woo_after_main_content', 10 );
function book_author_blog_woo_after_main_content() {
	?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
// Remove Woocommerce Default Sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// Remove WooCommerce Default Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', 'book_author_blog_woocommerce_default_title_false' );
function book_author_blog_woocommerce_default_title_false( $default ) {
	return false;
}

/**
 * Woocommerce Page New Header
 */
add_action('woocommerce_before_main_content', 'book_author_blog_woocommerce_page_custom_header', 9);
function book_author_blog_woocommerce_page_custom_header(){
	if ( ! is_product()) {
		get_template_part('template-parts/page-header/page', 'header');
	}
}

/**
 * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
 */
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_reviews_title', '__return_null' );

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

function book_author_blog_product_gallery_images($gallery_image_size = 'full', $gallery_extra_classes = '', $lightbox = false){
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	if ( $attachment_ids && $product->get_image_id() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			$thumbnail_src = wp_get_attachment_image_url($attachment_id, 'full');
			?>
			<div class="gallery-slider-item <?php echo esc_attr($gallery_extra_classes);?>">
				<?php
				echo wp_get_attachment_image($attachment_id, $gallery_image_size);
				?>
			</div>
			<?php
		}
	}
}

/**
 * Book Author Blog Product Gallery Slider
 */
add_action('woocommerce_before_single_product_summary', 'book_author_blog_product_gallery_sliders');

function book_author_blog_product_gallery_sliders(){
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	?>
	<div class="product-gallery-section">
		<div class="product-single-gallary-section">
			<div class="single-gallery-inner">
				<div class="active-single-gallery">
					<div class="gallery-slider-item large-slider-item">
						<?php the_post_thumbnail( 'authors-profile-pro-header-single-product' );?>
					</div>
					<?php
					if (!empty($attachment_ids)) :
						book_author_blog_product_gallery_images('authors-profile-pro-header-single-product', 'large-slider-item', true);
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Comment List Modification
 */

add_action('woocommerce_review_before', 'book_author_blog_woo_comment_list_image_wrapper_start', 9);
function book_author_blog_woo_comment_list_image_wrapper_start(){
	?>
	<div class="rswpthemes-comment-image-wrapper-start">
	<?php
}


add_action('woocommerce_review_before', 'book_author_blog_woo_comment_list_image_wrapper_end', 11);
function book_author_blog_woo_comment_list_image_wrapper_end(){
	?>
	</div>
	<?php
}