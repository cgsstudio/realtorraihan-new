<?php
/**
 * Section 11: contact.
 *
 * The form posts to admin-post.php and the theme emails the enquiry, so the
 * client genuinely receives messages (no plugin needed). A honeypot field keeps
 * most spam out. All text is fully editable in WordPress.
 *
 * @package RealtorRaihan
 */

$sent  = isset( $_GET['enquiry'] ) && 'sent' === $_GET['enquiry']; // phpcs:ignore
$error = isset( $_GET['enquiry'] ) && 'error' === $_GET['enquiry']; // phpcs:ignore
$c     = rr_contact();
$phone_clean = preg_replace( '/[^0-9+]/', '', $c['phone'] );
$wa_clean    = preg_replace( '/[^0-9]/', '', $c['whatsapp'] );
?>
<section class="ct" id="contact" aria-labelledby="ct-title">
  <div class="ct__wrap">

    <!-- left -->
    <div class="ct__left">
      <p class="ct__eyebrow rv"><?php echo esc_html( $c['eyebrow'] ); ?></p>

      <?php rr_head_lines( $c['title'], 'ct-title' ); ?>

      <p class="ct__lede rv"><?php echo wp_kses_post( $c['lede'] ); ?></p>

      <div class="ct__rows rv">
        <a class="ct__row" href="tel:<?php echo esc_attr( $phone_clean ); ?>">
          <span class="ct__rowIco" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2Z"/></svg>
          </span>
          <span class="ct__rowTx">
            <small><?php echo esc_html( $c['call_lbl'] ); ?></small>
            <span><?php echo esc_html( $c['phone'] ); ?></span>
          </span>
          <span class="ct__rowGo" aria-hidden="true"><?php echo rr_arrow(); // phpcs:ignore ?></span>
        </a>

        <a class="ct__row" href="https://wa.me/<?php echo esc_attr( $wa_clean ); ?>" target="_blank" rel="noopener">
          <span class="ct__rowIco" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm0 1.8a8.2 8.2 0 0 1 0 16.4 8.1 8.1 0 0 1-4.2-1.1l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 0 1 12 3.8Zm-3 4c-.2 0-.5.1-.7.3-.3.3-.8.8-.8 1.9s.8 2.1 1 2.2c.1.2 1.6 2.4 3.9 3.4 1.9.8 2.3.7 2.7.6.5 0 1.2-.5 1.4-1 .2-.5.2-.9.1-1l-.5-.3-1.4-.7c-.2-.1-.4-.1-.5.1l-.6.8c-.1.2-.3.2-.5.1-.2-.1-.9-.3-1.7-1a6.3 6.3 0 0 1-1.2-1.5c-.1-.2 0-.3.1-.4l.3-.4.2-.4v-.4l-.7-1.6c-.2-.4-.4-.4-.5-.4h-.5Z"/></svg>
          </span>
          <span class="ct__rowTx">
            <small><?php echo esc_html( $c['wa_lbl'] ); ?></small>
            <span><?php echo esc_html( $c['wa_sub'] ); ?></span>
          </span>
          <span class="ct__rowGo" aria-hidden="true"><?php echo rr_arrow(); // phpcs:ignore ?></span>
        </a>

        <a class="ct__row" href="mailto:<?php echo esc_attr( $c['email'] ); ?>">
          <span class="ct__rowIco" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="4.5" width="19" height="15" rx="2.5"/><path d="m3 6.5 9 6 9-6"/></svg>
          </span>
          <span class="ct__rowTx">
            <small><?php echo esc_html( $c['email_lbl'] ); ?></small>
            <span><?php echo esc_html( $c['email'] ); ?></span>
          </span>
          <span class="ct__rowGo" aria-hidden="true"><?php echo rr_arrow(); // phpcs:ignore ?></span>
        </a>

        <div class="ct__row" style="cursor:default">
          <span class="ct__rowIco" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/></svg>
          </span>
          <span class="ct__rowTx">
            <small><?php echo esc_html( $c['area_lbl'] ); ?></small>
            <span><?php echo esc_html( $c['area'] ); ?></span>
          </span>
        </div>
      </div>
    </div>

    <!-- right: form -->
    <div class="ct__card rv">
      <div class="ct__formHead">
        <h3><?php echo esc_html( $c['form_h'] ); ?></h3>
        <p><?php echo esc_html( $c['form_p'] ); ?></p>
      </div>

      <form class="ct__form" id="ctForm"<?php echo $sent ? ' style="display:none"' : ''; ?> action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
        <input type="hidden" name="action" value="rr_enquiry">
        <?php wp_nonce_field( 'rr_enquiry', 'rr_enquiry_nonce' ); ?>
        <?php
        $redirect_target = is_page_template( 'page-templates/contact.php' ) || is_page_template( 'page-contact.php' ) || is_page( 'contact' ) ? rr_contact_url() : home_url( '/' );
        ?>
        <input type="hidden" name="rr_redirect" value="<?php echo esc_url( $redirect_target . '#contact' ); ?>">
        <p style="position:absolute;left:-9999px" aria-hidden="true">
          <label for="rr_website">Website</label>
          <input id="rr_website" name="rr_website" type="text" tabindex="-1" autocomplete="off">
        </p>

        <div class="fld">
          <label for="ctName"><?php esc_html_e( 'First Name', 'realtor-raihan' ); ?></label>
          <input id="ctName" name="firstName" type="text" placeholder="<?php esc_attr_e( 'Your first name', 'realtor-raihan' ); ?>" autocomplete="given-name" required>
        </div>

        <div class="fld">
          <label for="ctEmail"><?php esc_html_e( 'Email', 'realtor-raihan' ); ?></label>
          <input id="ctEmail" name="email" type="email" placeholder="you@example.com" autocomplete="email" required>
        </div>

        <div class="fld fld--wide">
          <label for="ctPhone"><?php esc_html_e( 'Phone', 'realtor-raihan' ); ?> <span style="text-transform:none;letter-spacing:0;opacity:.6">(<?php esc_html_e( 'optional', 'realtor-raihan' ); ?>)</span></label>
          <input id="ctPhone" name="phone" type="tel" placeholder="+971 50 000 0000" autocomplete="tel">
        </div>

        <div class="fld fld--wide">
          <label for="ctReason"><?php esc_html_e( 'Inquiry Reason', 'realtor-raihan' ); ?></label>
          <select id="ctReason" name="reason" required>
            <option value="" selected disabled><?php esc_html_e( 'Select a reason', 'realtor-raihan' ); ?></option>
            <?php
            foreach ( array( 'Buying', 'Selling', 'Renting', 'Investing', 'Other' ) as $reason ) {
                printf( '<option value="%1$s">%1$s</option>', esc_attr( $reason ) );
            }
            ?>
          </select>
        </div>

        <div class="fld fld--wide">
          <label for="ctMsg"><?php esc_html_e( 'Message', 'realtor-raihan' ); ?></label>
          <textarea id="ctMsg" name="message" placeholder="<?php esc_attr_e( "Tell me what you're looking for, area, budget, timeline…", 'realtor-raihan' ); ?>" required></textarea>
        </div>

        <p class="ct__err" id="ctErr" role="alert"><?php esc_html_e( 'Please fill in your name, a valid email, an inquiry reason and a message.', 'realtor-raihan' ); ?></p>

        <button class="ct__submit" type="submit" id="ctSubmit">
          <?php echo esc_html( $c['btn_text'] ); ?>
          <?php echo rr_arrow(); // phpcs:ignore ?>
        </button>

        <p class="ct__fine"><?php echo esc_html( $c['fine_text'] ); ?></p>
      </form>

      <div class="ct__done<?php echo $sent ? ' is-on' : ''; ?>" id="ctDone" role="status" aria-live="polite"<?php echo $sent ? '' : ' style="display:none"'; ?>>
        <div class="ct__doneIco" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m4.5 12.5 5 5L20 7"/></svg>
        </div>
        <h3><?php echo esc_html( $c['done_h'] ); ?></h3>
        <p>
          <?php echo esc_html( $c['done_p'] ); ?>
          <a href="tel:<?php echo esc_attr( $phone_clean ); ?>"><?php echo esc_html( $c['phone'] ); ?></a>
          <?php esc_html_e( 'or', 'realtor-raihan' ); ?>
          <a href="https://wa.me/<?php echo esc_attr( $wa_clean ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'message me on WhatsApp', 'realtor-raihan' ); ?></a>.
        </p>

        <button class="ct__again" type="button" id="ctAgain"><?php esc_html_e( 'Send another enquiry', 'realtor-raihan' ); ?></button>
      </div>
    </div>

  </div>
</section>
