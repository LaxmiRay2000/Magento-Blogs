<?php
/**
 * Author Portfolo Page Header
 */
?>
<section class="page-header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left">
				<?php
				do_action('book_author_blog_before_page_title');
				if (is_page()) :
				?>
				<h1 class="page-title text-left"><?php the_title(); ?></h1>
				<?php
				elseif(is_category() || is_tag() || is_tax()):
					?>
					<h1 class="page-title text-left">
						<?php single_term_title('', true); ?>
					</h1>
					<?php
					the_archive_description();
				elseif(is_author()):
					book_author_blog_author_vcard();
				elseif (is_search()):
					printf( esc_html__( 'Search Results for: %s', 'book-author-blog' ), '<span>' . get_search_query() . '</span>' );
				elseif (class_exists('woocommerce') && is_woocommerce()) :
					if (is_shop()) :
						?>
						<h1 class="page-title text-left">
							<?php woocommerce_page_title(); ?>
						</h1>
						<?php
					endif;
				elseif (is_post_type_archive()) :
					?>
					<h1 class="page-title text-left">
						<?php post_type_archive_title(); ?>
					</h1>
					<div class="archive-description">
						<?php the_archive_description(); ?>
					</div>
					<?php
				elseif(is_archive()):
					the_archive_title( '<h1 class="page-title text-left">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				endif;
				 do_action('book_author_blog_after_page_title'); ?>
			</div>
		</div>
	</div>
</section>