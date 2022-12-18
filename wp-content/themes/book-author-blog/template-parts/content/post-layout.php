<?php
$get_post_column_layout = '3';
if (is_home()) {
	$get_post_column_layout = get_theme_mod('blog_page_post_column', '1');
}elseif(is_search()){
	$get_post_column_layout = get_theme_mod('search_page_post_column', '1');
}elseif(is_archive()){
	$get_post_column_layout = get_theme_mod('archive_page_post_column', '1');
}
$post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
if ( $get_post_column_layout == '1' ) {
	$post_column_layout = 'col-md-12';
} elseif ( $get_post_column_layout == '2' ) {
	$post_column_layout = 'col-lg-6 col-md-12';
} elseif ( $get_post_column_layout == '3' ) {
	$post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
} elseif ( $get_post_column_layout == '4' ) {
	$post_column_layout = 'col-sm-12 col-md-6 col-lg-3';
}
$post_classes = 'book-author-blog-standard-post';
if ( ! has_post_thumbnail() ) {
	$post_classes = 'book-author-blog-standard-post no-post-thumbnail ';
}
$post_el_is_on = array(
	'show_post_category' => get_theme_mod('show_post_category', true),
	'show_post_thumbnail' => get_theme_mod('show_post_thumbnail', true),
	'show_post_date' => get_theme_mod('show_post_date', true),
	'show_post_author' => get_theme_mod('show_post_author', true),
	'show_post_title' => get_theme_mod('show_post_title', true),
	'show_post_excerpt' => get_theme_mod('show_post_excerpt', true),
);
if (!is_single()) :
?>
<div class="<?php echo esc_attr( $post_column_layout ); ?> blog-grid-layout">
<?php endif; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
		<div class="book-author-blog-standard-post__entry-content text-left">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="book-author-blog-standard-post__thumbnail post-header">
					<?php
					if (true == $post_el_is_on['show_post_thumbnail']) :
						book_author_blog_post_thumbnail();
					endif;
					if(true == $post_el_is_on['show_post_category']) :
					?>
					<div class="book-author-blog-standard-post__overlay-category">
						<?php book_author_blog_categories(); ?>
					</div>
					<?php endif; ?>
				</div>
			<?php endif;?>
			<div class="book-author-blog-standard-post__content-wrapper">
				<?php
				if (!has_post_thumbnail()) : ?>
				<div class="book-author-blog-standard-post__post-meta">
					<?php
					if(true == $post_el_is_on['show_post_category']) :
					?>
					<div class="book-author-blog-standard-post__post-meta mb-3">
						<?php book_author_blog_categories(); ?>
					</div>
					<?php
					endif;?>
				</div>
				<?php
				endif;?>
				<div class="book-author-blog-standard-post__post-title">
					<?php
					if(true == $post_el_is_on['show_post_title']) :?>
						<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
					<?php
					endif;
					$nolinebetweenmeta = '';
					if (false == $post_el_is_on['show_post_author']) {
						$nolinebetweenmeta = ' no-line-between-meta';
					}
				?>
				</div>
				<?php if(true == $post_el_is_on['show_post_excerpt']) : ?>
					<div class="book-author-blog-standard-post__post-excerpt">
						<?php the_excerpt();?>
					</div>
				<?php endif;?>
				<div class="book-author-blog-standard-post__blog-meta justify-content-between border-top<?php echo esc_attr($nolinebetweenmeta);?>">
					<?php
					if (true == $post_el_is_on['show_post_author']) :
						book_author_blog_posted_by( true );
					endif;
					if(true == $post_el_is_on['show_post_date']) :
						book_author_blog_posted_on(true);
					endif;
					?>
				</div>
			</div>
		</div>
	</article>
<?php
if (!is_single()) : ?>
</div>
<?php endif; ?>