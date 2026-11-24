<?php
/**
 * About page body, used by page-templates/about.php.
 *
 * @package RealtorRaihan
 */

$a = rr_about();

$icons = array(
	'shield'   => '<path d="M12 3 4 6v6c0 4.4 3.4 8.2 8 9 4.6-.8 8-4.6 8-9V6l-8-3Z"/><path d="m8.6 12.2 2.4 2.4 4.4-4.6"/>',
	'building' => '<path d="M4 21V6l8-3v18"/><path d="M12 21V10l8 2v9"/><path d="M7 8h2M7 12h2M7 16h2M15 14h2M15 18h2"/>',
	'process'  => '<path d="M3 12a9 9 0 1 0 9-9"/><path d="M3 4v5h5"/><path d="m9 13 2.5 2.5L16.5 10"/>',
	'phone'    => '<path d="M4 13a8 8 0 0 1 16 0"/><rect x="2.6" y="13" width="4" height="7" rx="2"/><rect x="17.4" y="13" width="4" height="7" rx="2"/><path d="M20 20a3 3 0 0 1-3 3h-3"/>',
	'home'     => '<path d="M3 10.5 12 4l9 6.5"/><path d="M5 10v10h14V10"/><path d="M9.5 20v-6h5v6"/>',
	'key'      => '<circle cx="8" cy="8" r="4.4"/><path d="m11.2 11.2 8.8 8.8"/><path d="m16 16 2.2-2.2"/><path d="m19 19 2-2"/>',
	'star'     => '<path d="M12 3.5 14.6 9l6 .8-4.4 4.2 1.1 6-5.3-2.9L6.7 20l1.1-6L3.4 9.8l6-.8z"/>',
);
?>
<div id="top" aria-hidden="true"></div>

<!-- 1. banner -->
<section class="ab-head" aria-labelledby="ab-title">
  <div class="ab-head__bg" aria-hidden="true">
    <img src="<?php echo esc_url( rr_img( $a['hero_img'], 'gen-office-dusk.webp' ) ); ?>" alt="" loading="eager" decoding="async">
  </div>
  <div class="ab-head__in">
    <p class="ab-head__dot rv"><?php echo esc_html( $a['eyebrow'] ); ?></p>
    <h1 class="rv" id="ab-title"><?php echo rr_rich( $a['title'] ); ?></h1>
    <nav class="ab-head__crumb rv" aria-label="<?php esc_attr_e( 'Breadcrumb', 'realtor-raihan' ); ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'realtor-raihan' ); ?></a><i aria-hidden="true"></i><span><?php esc_html_e( 'About', 'realtor-raihan' ); ?></span>
    </nav>
  </div>
</section>

<!-- 2. about us -->
<section class="ab-us sec" aria-labelledby="ab-us-h">
  <div class="sec__wrap">
    <div class="ab-us__grid">

      <div class="ab-us__copy rv">
        <p class="tag"><?php echo esc_html( $a['tag'] ); ?></p>
        <h2 id="ab-us-h"><?php echo rr_rich( $a['h2'] ); ?></h2>
        <p><?php echo wp_kses_post( $a['p1'] ); ?></p>
        <p><?php echo wp_kses_post( $a['p2'] ); ?></p>
        <blockquote class="ab-us__quote"><?php echo wp_kses_post( $a['quote'] ); ?></blockquote>
        <div class="ab-us__btns">
          <a class="pill pill--navy" href="<?php echo esc_url( rr_anchor( 'contact' ) ); ?>"><?php echo esc_html( $a['btn'] ); ?>
            <?php echo rr_arrow(); // phpcs:ignore ?>
          </a>
        </div>
      </div>

      <div class="ab-us__media rv">
        <span class="ab-us__pin" aria-hidden="true"></span>
        <figure class="ab-us__fig ab-us__fig--big">
          <img src="<?php echo esc_url( rr_img( $a['photo'], 'raihan-beach.webp' ) ); ?>" alt="<?php esc_attr_e( 'Raihan Shaikh, property consultant in Dubai', 'realtor-raihan' ); ?>" loading="lazy" decoding="async">
          <figcaption><?php esc_html_e( 'Raihan Shaikh · Dubai', 'realtor-raihan' ); ?></figcaption>
        </figure>
      </div>

    </div>
  </div>
</section>

<!-- 3. closing CTA -->
<section class="sec ab-close" aria-labelledby="ab-close-h">
  <div class="ab-close__bg" aria-hidden="true">
    <img src="<?php echo esc_url( get_theme_mod( 'rr_about_close_bg', RR_URI . '/assets/img/skyline-sunset-wide.webp' ) ); ?>" alt="" loading="lazy" decoding="async">
  </div>
  <div class="sec__wrap">
    <div class="ab-close__in">
      <div>
        <p class="tag rv"><?php echo esc_html( $a['close_tag'] ); ?></p>
        <h2 class="rv" id="ab-close-h"><?php echo rr_rich( $a['close_h2'] ); ?></h2>
      </div>
      <div class="ab-close__side rv">
        <p><?php echo wp_kses_post( $a['close_p'] ); ?></p>
        <div class="ab-close__btns">
          <a class="pill pill--gold" href="<?php echo esc_url( rr_anchor( 'contact' ) ); ?>"><?php echo esc_html( $a['close_btn'] ); ?>
            <?php echo rr_arrow(); // phpcs:ignore ?>
          </a>
          <a class="pill pill--ghost" href="<?php echo esc_url( rr_whatsapp() ); ?>"><?php echo esc_html( $a['close_wa'] ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
