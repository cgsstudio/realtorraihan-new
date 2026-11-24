<?php
$rr_developers = get_option( 'rr_developer_logos', array() );
if ( ! is_array( $rr_developers ) || empty( $rr_developers ) ) {
 $rr_developers = array(
  array('name'=>'Nakheel','domain'=>'nakheel.com'),array('name'=>'Emaar','domain'=>'emaar.com'),array('name'=>'Modon','domain'=>'modon.ae'),array('name'=>'Aldar','domain'=>'aldar.com'),array('name'=>'DAMAC','domain'=>'damacproperties.com'),array('name'=>'Danube','domain'=>'danubeproperties.com','logo'=>'https://danubeproperties.com/favicon.ico'),array('name'=>'Azizi','domain'=>'azizidevelopments.com'),array('name'=>'Imtiaz','domain'=>'imtiaz.ae'),array('name'=>'Samana','domain'=>'samanadevelopers.com'),array('name'=>'Omniyat','domain'=>'omniyat.com'),array('name'=>'Meraas','domain'=>'meraas.com'),array('name'=>'Dubai Properties','domain'=>'dp.ae'),array('name'=>'Expo City Developer','domain'=>'expocitydubai.com')
 );
}
?>
<section class="dev-marquee" aria-label="Developers I work with">
 <div class="dev-marquee__head"><p class="tag">TRUSTED DEVELOPER NETWORK</p><h2>Developers I Work With</h2></div>
 <div class="dev-marquee__viewport"><div class="dev-marquee__track">
 <?php for($rr_copy=0;$rr_copy<2;$rr_copy++): foreach($rr_developers as $rr_dev): ?>
 <div class="dev-marquee__item" <?php echo $rr_copy ? 'aria-hidden="true"' : ''; ?>>
 <img src="<?php echo esc_url( ! empty( $rr_dev['logo'] ) ? $rr_dev['logo'] : 'https://www.google.com/s2/favicons?domain=' . rawurlencode( $rr_dev['domain'] ) . '&sz=128' ); ?>" alt="" loading="lazy" decoding="async">
 <span><?php echo esc_html($rr_dev['name']); ?></span></div>
 <?php endforeach; endfor; ?>
 </div></div>
</section>