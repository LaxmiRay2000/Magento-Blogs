<?php 
    //ads
    $number_of_ads = presazine_get_option( 'number_of_ads' );
    $ads_col = presazine_get_option( 'ads_column_option' ); 
    $ads_enable = presazine_get_option( 'disable_ads_section' ); 
?>
<?php if ($ads_enable==true): ?>
    <div class="site-advertisement <?php echo esc_attr($ads_col); ?>">
        <?php for ($i=1; $i <= $number_of_ads ; $i++) { 
            $ads_img = presazine_get_option( 'ads_img_'.$i ); 
            $ads_url = presazine_get_option( 'ads_url_'.$i );
            ?>
            <?php if ($ads_img): ?>
                <article class="ads-info">
                    <a target="_blank" href="<?php echo esc_url($ads_url) ?>"><img  src="<?php echo esc_url($ads_img) ?>"></a>
                </article>
            <?php endif; ?>
        <?php } ?>
    </div>
<?php endif; ?>