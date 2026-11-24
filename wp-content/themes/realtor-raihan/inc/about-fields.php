<?php
/**
 * The About page editor. Content lives in one option array so the whole page is
 * editable from a single admin screen.
 *
 * @package RealtorRaihan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default About page content.
 *
 * @return array
 */
function rr_about_defaults() {
	return array(
		'eyebrow'    => 'About me',
		'title'      => 'Raihan <em>Shaikh</em>',
		'hero_img'   => 'gen-office-dusk.webp',
		'tag'        => 'About us',
		'h2'         => 'You are not buying a listing. You are buying a <em>decision.</em>',
		'photo'      => 'raihan-beach.webp',
		'p1'         => 'I am Raihan Shaikh, a senior property consultant in Dubai with Homes 4 Life Real Estate. Five years in this market has taught me one thing: the deal is easy, the decision is hard. So I work the decision first. What the service charge actually costs, what the rental cheques really look like, what resale looks like four years out.',
		'p2'         => 'Most of my clients start in Business Bay, Downtown or Dubai Marina and end up somewhere they did not expect: JVC, Arjan, a villa in Damac Hills. That is fine. My job is not to sell you a building. It is to make sure the one you pick still makes sense to you in 2030, not just on the day you sign.',
		'quote'      => 'If a deal is not right for you, I will say so. There is always another one.',
		'btn'        => 'More about us',
		'why_tag'    => 'Why choose us',
		'why_h2'     => "What you get that a portal<br>page cannot give you.",
		'why_photo'  => 'villa-pool-terrace.webp',
		'badge_b'    => '5+ years',
		'badge_s'    => 'in the Dubai market, from Business Bay to Damac Hills.',
		'features'   => array(
			array( 'icon' => 'shield', 'title' => 'Trusted property experts', 'text' => 'Five years, one market, real transactions. Every number I quote can be checked against the DLD register. I would rather you verify me than take my word for it.' ),
			array( 'icon' => 'building', 'title' => 'Access before the portal', 'text' => 'Off-plan launches, resale units and negotiated prices often move before an advert goes live. You hear about them from me first, with the payment plan attached.' ),
			array( 'icon' => 'process', 'title' => 'A process with no surprises', 'text' => 'Reservation, DLD fees, NOC, trustee transfer, snagging. You get the full checklist up front with the costs written next to each line, not after the deposit.' ),
			array( 'icon' => 'phone', 'title' => 'One number that answers', 'text' => 'No call centre, no rotating agents. You deal with me from the first WhatsApp to the handover, and after it, when the tenant or the resale question comes up.' ),
		),
		'close_tag'  => "Let's talk",
		'close_h2'   => "Tell me what you're after and I'll tell you <em>honestly.</em>",
		'close_p'    => 'One call, no pitch. Bring your budget and your timeline. I will bring the numbers.',
		'close_btn'  => 'Book a free consultation',
		'close_wa'   => 'WhatsApp me',
	);
}

/**
 * Read the About content, merged over the defaults.
 *
 * @return array
 */
function rr_about() {
	$saved = get_option( 'rr_about_page', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}
	$data = array_merge( rr_about_defaults(), $saved );
	if ( empty( $data['features'] ) || ! is_array( $data['features'] ) ) {
		$d                  = rr_about_defaults();
		$data['features']   = $d['features'];
	}
	return $data;
}

add_action(
	'admin_menu',
	function () {
		add_submenu_page(
			'rr-home',
			__( 'About page', 'realtor-raihan' ),
			__( 'About page', 'realtor-raihan' ),
			'edit_pages',
			'rr-about',
			'rr_about_admin_screen'
		);
	}
);

add_action(
	'admin_post_rr_about_save',
	function () {
		if ( ! current_user_can( 'edit_pages' ) ) {
			wp_die( esc_html__( 'Not allowed.', 'realtor-raihan' ) );
		}
		check_admin_referer( 'rr_about_save' );

		$defaults = rr_about_defaults();
		$posted   = isset( $_POST['rr'] ) && is_array( $_POST['rr'] ) ? wp_unslash( $_POST['rr'] ) : array(); // phpcs:ignore
		$clean    = array();

		foreach ( $defaults as $key => $default ) {
			if ( 'features' === $key ) {
				continue;
			}
			$clean[ $key ] = isset( $posted[ $key ] ) ? wp_kses_post( trim( (string) $posted[ $key ] ) ) : '';
		}

		$features = array();
		if ( isset( $_POST['rrf'] ) && is_array( $_POST['rrf'] ) ) { // phpcs:ignore
			foreach ( wp_unslash( $_POST['rrf'] ) as $row ) { // phpcs:ignore
				$row = array_map(
					static function ( $v ) {
						return wp_kses_post( trim( (string) $v ) );
					},
					(array) $row
				);
				if ( array_filter( $row ) ) {
					$features[] = $row;
				}
			}
		}
		$clean['features'] = $features;

		update_option( 'rr_about_page', $clean );
		wp_safe_redirect( add_query_arg( 'rr_saved', '1', admin_url( 'admin.php?page=rr-about' ) ) );
		exit;
	}
);

/**
 * The About admin screen.
 */
function rr_about_admin_screen() {
	$data  = rr_about();
	$saved = isset( $_GET['rr_saved'] ); // phpcs:ignore
	$long  = array( 'p1', 'p2', 'quote', 'badge_s', 'close_p' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'About page content', 'realtor-raihan' ); ?></h1>
		<?php if ( $saved ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'About page saved.', 'realtor-raihan' ); ?></p></div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="rr_about_save">
			<?php wp_nonce_field( 'rr_about_save' ); ?>

			<h2><?php esc_html_e( 'Page banner', 'realtor-raihan' ); ?></h2>
			<table class="form-table" role="presentation"><tbody>
				<?php
				foreach ( array( 'eyebrow' => 'Small label', 'title' => 'Page title (use <em> to set a word in gold)' ) as $k => $label ) {
					$label = ucfirst( $label );
					echo '<tr><th scope="row"><label>' . esc_html( $label ) . '</label></th><td><input type="text" class="large-text" name="rr[' . esc_attr( $k ) . ']" value="' . esc_attr( $data[ $k ] ) . '"></td></tr>';
				}
				?>
			</tbody></table>

			<h2><?php esc_html_e( 'About section', 'realtor-raihan' ); ?></h2>
			<table class="form-table" role="presentation"><tbody>
				<?php
				$fields = array(
					'tag'   => 'Small label',
					'h2'    => 'Heading',
					'p1'    => 'First paragraph',
					'p2'    => 'Second paragraph',
					'quote' => 'Pull quote',
					'btn'   => 'Button text',
				);
				foreach ( $fields as $k => $label ) {
					echo '<tr><th scope="row"><label>' . esc_html( $label ) . '</label></th><td>';
					if ( in_array( $k, $long, true ) ) {
						echo '<textarea class="large-text" rows="4" name="rr[' . esc_attr( $k ) . ']">' . esc_textarea( $data[ $k ] ) . '</textarea>';
					} else {
						echo '<input type="text" class="large-text" name="rr[' . esc_attr( $k ) . ']" value="' . esc_attr( $data[ $k ] ) . '">';
					}
					echo '</td></tr>';
				}
				?>
			</tbody></table>

			<h2><?php esc_html_e( 'Why choose us section', 'realtor-raihan' ); ?></h2>
			<table class="form-table" role="presentation"><tbody>
				<?php
				foreach ( array( 'why_tag' => 'Small label', 'why_h2' => 'Heading (use &lt;br&gt; for a line break)', 'badge_b' => 'Badge headline', 'badge_s' => 'Badge sentence' ) as $k => $label ) {
					echo '<tr><th scope="row"><label>' . esc_html( $label ) . '</label></th><td>';
					if ( 'badge_s' === $k ) {
						echo '<textarea class="large-text" rows="3" name="rr[' . esc_attr( $k ) . ']">' . esc_textarea( $data[ $k ] ) . '</textarea>';
					} else {
						echo '<input type="text" class="large-text" name="rr[' . esc_attr( $k ) . ']" value="' . esc_attr( $data[ $k ] ) . '">';
					}
					echo '</td></tr>';
				}
				?>
			</tbody></table>

			<h3><?php esc_html_e( 'Editable points', 'realtor-raihan' ); ?></h3>
			<p class="description"><?php esc_html_e( 'Leave a row empty to remove it. Icon options: shield, chart, phone, home, key, star.', 'realtor-raihan' ); ?></p>
			<?php
			$rows   = $data['features'];
			$rows[] = array( 'icon' => '', 'title' => '', 'text' => '' );
			foreach ( $rows as $i => $row ) :
				?>
				<fieldset style="border:1px solid #dcdcde;padding:12px 16px;margin:0 0 10px;border-radius:6px;background:#fff">
					<legend style="font-weight:600;padding:0 6px"><?php echo esc_html( sprintf( __( 'Point %d', 'realtor-raihan' ), $i + 1 ) ); ?></legend>
					<p style="margin:6px 0"><label style="display:block;font-weight:600"><?php esc_html_e( 'Icon', 'realtor-raihan' ); ?></label>
						<input type="text" class="regular-text" name="rrf[<?php echo (int) $i; ?>][icon]" value="<?php echo esc_attr( $row['icon'] ); ?>"></p>
					<p style="margin:6px 0"><label style="display:block;font-weight:600"><?php esc_html_e( 'Title', 'realtor-raihan' ); ?></label>
						<input type="text" class="regular-text" name="rrf[<?php echo (int) $i; ?>][title]" value="<?php echo esc_attr( $row['title'] ); ?>"></p>
					<p style="margin:6px 0"><label style="display:block;font-weight:600"><?php esc_html_e( 'Text', 'realtor-raihan' ); ?></label>
						<textarea class="large-text" rows="3" name="rrf[<?php echo (int) $i; ?>][text]"><?php echo esc_textarea( $row['text'] ); ?></textarea></p>
				</fieldset>
			<?php endforeach; ?>

			<h2><?php esc_html_e( 'Closing call to action', 'realtor-raihan' ); ?></h2>
			<table class="form-table" role="presentation"><tbody>
				<?php
				foreach ( array( 'close_tag' => 'Small label', 'close_h2' => 'Heading', 'close_p' => 'Sentence', 'close_btn' => 'Gold button text', 'close_wa' => 'WhatsApp button text' ) as $k => $label ) {
					echo '<tr><th scope="row"><label>' . esc_html( $label ) . '</label></th><td>';
					if ( 'close_p' === $k ) {
						echo '<textarea class="large-text" rows="3" name="rr[' . esc_attr( $k ) . ']">' . esc_textarea( $data[ $k ] ) . '</textarea>';
					} else {
						echo '<input type="text" class="large-text" name="rr[' . esc_attr( $k ) . ']" value="' . esc_attr( $data[ $k ] ) . '">';
					}
					echo '</td></tr>';
				}
				?>
			</tbody></table>

			<?php submit_button( __( 'Save About page', 'realtor-raihan' ) ); ?>
		</form>
	</div>
	<?php
}
