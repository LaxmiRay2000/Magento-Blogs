<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

$options = bloguide_get_theme_options(); ?>

    <article id="post-<?php the_ID(); ?>" class="has-post-thumbnail">
        <div class="featured-image" style="background-image: url('<?php echo (!empty(get_the_post_thumbnail_url())) ? the_post_thumbnail_url( 'medium_large' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg' ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link" title="<?php echo the_title_attribute( ); ?>"></a>
        </div>
        <div class="entry-container">

            <header class="entry-header">
                <?php echo bloguide_article_footer_meta(); ?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-meta">
                <?php echo bloguide_posted_on(); ?>
                <span class="min-read"><?php echo bloguide_reading_time(); ?></span>                          

            </div><!-- .entry-meta -->
            <div class="entry-content"><?php the_excerpt(); ?></div>

            <?php if(!empty($options['archive_btn_txt'])): ?>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html($options['archive_btn_txt']); ?></a>
            </div><!-- .read-more -->
            <?php endif; ?>

        </div>
        
    </article>
