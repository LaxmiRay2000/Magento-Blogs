<?php
    $headlines_content_type     = presazine_get_option( 'headlines_content_type' );
    $headlines_title       = presazine_get_option( 'headlines_title' );
    $number_of_headlines_items  = presazine_get_option( 'number_of_headlines_items' );
    $headlines_category = presazine_get_option( 'headlines_category' );
    $header_font_size = presazine_get_option( 'headlines_font_size');    

    for( $i=1; $i<=$number_of_headlines_items; $i++ ) :
        $headlines_page_posts[] = absint(presazine_get_option( 'headlines_page_'.$i ) );
        $headlines_post_posts[] = absint(presazine_get_option( 'headlines_post_'.$i ) );
    endfor;

?>

<?php if( !empty($headlines_title)):?>
    <div class="news-header">
        <h2 class="news-title"><?php echo esc_html($headlines_title);?></h2>
    </div>       
<?php endif;?>  
<div class="headlines-posts">
    <div class="headline-animation">
        <ul>      
            <?php if(( $headlines_content_type == 'headlines_page') || ( $headlines_content_type =='headlines_post') || ( $headlines_content_type == 'headlines_category') ){ 
                if( $headlines_content_type == 'headlines_page' ) : ?>
                    <?php $args = array (
                        'post_type'     => 'page',
                        'post_per_page' => count( $headlines_page_posts ),
                        'post__in'      => $headlines_page_posts,
                        'orderby'       =>'post__in', 
                    ); 
                endif; 
                if( $headlines_content_type == 'headlines_post' ) :
                    $args = array (
                        'post_type'     => 'post',
                        'post_per_page' => count( $headlines_post_posts ),
                        'post__in'      => $headlines_post_posts,
                        'orderby'       =>'post__in', 
                        'ignore_sticky_posts' => true, 
                    ); 
                endif;

                if( $headlines_content_type == 'headlines_category' ) :
                    $args = array (

                        'posts_per_page' =>absint( $number_of_headlines_items ),              
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'paged' => 1,
                        'ignore_sticky_posts' => true, 
                        );
                        if ( absint( $headlines_category ) > 0 ) {
                            $args['cat'] = absint( $headlines_category );
                        }
                endif;
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                    $i=0; 
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?> 
                        <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url('post-thumnbail');?>');">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                         <li class="entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink();?>"><?php the_title();?></a></li>         
                    <?php endwhile;?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            <?php  }?>
        </ul>
    </div>
</div><!-- .section-content -->