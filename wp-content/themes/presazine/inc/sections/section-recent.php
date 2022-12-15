<?php
    $recent_content_type     = presazine_get_option( 'recent_content_type' );
    $recent_title       = presazine_get_option( 'recent_title' );
    $enable_category     = presazine_get_option( 'recent_category_enable' );
    $enable_content     = presazine_get_option( 'recent_content_enable' );
    $enable_author     = presazine_get_option( 'recent_author_enable' );
    $enable_posted_on     = presazine_get_option( 'recent_posted_on_enable' );
    $number_of_recent_items  = presazine_get_option( 'number_of_recent_items' );
    $number_of_col  = presazine_get_option( 'number_of_recent_column' );
    $recent_category = presazine_get_option( 'recent_category' );
    $header_font_size = presazine_get_option( 'recent_font_size');
    $recent_layout = presazine_get_option('recent_layout_option');
    $see_more_txt     = presazine_get_option( 'recent_see_all_txt' );
    $see_more_url     = presazine_get_option( 'recent_see_all_url' );
    $excerpt_length =presazine_get_option( 'recent_excerpt_length');
    

    for( $i=1; $i<=$number_of_recent_items; $i++ ) :
        $recent_page_posts[] = absint(presazine_get_option( 'recent_page_'.$i ) );
        $recent_post_posts[] = absint(presazine_get_option( 'recent_post_'.$i ) );
    endfor;

?>

<?php if( !empty($recent_title)):?>
    <div class="section-header">
        <?php if (!empty($recent_title)): ?>
            <h2 class="section-title"><?php echo esc_html($recent_title);?></h2>
        <?php endif; ?>
    </div>       
<?php endif;?>   
<div class="section-content col-<?php echo esc_attr($number_of_col) ?>">        
        <?php
            $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $recent_post_posts ),
                'post__in'      => $recent_post_posts,
                'orderby'       =>'post__in', 
                'ignore_sticky_posts' => true, 
            ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0; 
                $class=''; 
                while ($loop->have_posts()) : $loop->the_post(); $i++;?> 
                    <?php if ($recent_layout=='half-width') {
                         if ($number_of_col==1){ 
                            if ($i==1) {
                                $class='full-width';
                            }else{
                                $class='half-width';
                            }
                        } elseif($number_of_col==2){
                            if ($i<=2) {
                                $class='full-width';
                            } else{
                                $class='half-width';
                            }
                        }elseif($number_of_col==3){
                            if ($i<=3) {
                                $class='full-width';
                            } else{
                                $class='half-width';
                            }
                        }
                    } ?>
                <article class=" <?php if($recent_layout=='full-width') { echo 'full-width'; } else{ echo $class; } ?> <?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?> ">
                    <div class="recent-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image">
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url();?>');">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                    <?php $homepage_video_url = get_post_meta( get_the_ID(), 'presazine-video-url', true ); ?>
                                    <?php if (!empty($homepage_video_url)): ?>
                                       <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                    <?php endif ?>
                                </div><!-- .featured-image -->
                            </div>
                        <?php endif; ?>

                        <div class="entry-container">
                            <?php if ( ($enable_category==true) ) : ?>
                                <div class="entry-meta recent-cat">
                                    <?php presazine_entry_meta(); ?>
                                </div>
                            <?php endif; ?>
                            <header class="entry-header">
                                <h2 class="entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                            <?php if (($enable_posted_on==true) || ($enable_author==true)) : ?>
                                <div class="entry-meta">
                                    <?php 
                                        if (($enable_posted_on==true)) {
                                            presazine_posted_on();
                                        } 
                                        if (($enable_author==true)) {
                                            presazine_author();
                                        }
                                     ?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                            <?php if ( ($enable_content==true)): ?>
                                <div class="entry-content">
                                    <?php 
                                            $excerpt = presazine_the_excerpt( $excerpt_length );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    </div><!-- .recent-item -->
                </article>          
                <?php endwhile;?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
</div><!-- .section-content -->