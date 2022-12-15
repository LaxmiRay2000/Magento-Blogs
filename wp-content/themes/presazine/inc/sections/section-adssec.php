<?php 
    //adssec
    $number_of_adssec = presazine_get_option( 'number_of_adssec' );
    $adssec_col = presazine_get_option( 'adssec_column_option' ); 
    $adssec_enable = presazine_get_option( 'disable_adssec_section' ); 
?>
<?php if ($adssec_enable==true): ?>
    <div class="site-advertisement <?php echo esc_attr($adssec_col); ?>">
        <?php for ($i=1; $i <= $number_of_adssec ; $i++) { 
            $adssec_img = presazine_get_option( 'adssec_img_'.$i ); 
            $adssec_url = presazine_get_option( 'adssec_url_'.$i );
            ?>
            <?php if ($adssec_img): ?>
                <article class="ads-info">
                    <a target="_blank" href="<?php echo esc_url($adssec_url) ?>"><img  src="<?php echo esc_url($adssec_img) ?>"></a>
                </article>
            <?php endif ?>
        <?php } ?>
    </div>
<?php endif; ?>