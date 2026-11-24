<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realtorraihan' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'D8-nD)0.c/;uKRV,HGZ:cwwi_CEn/L#qmx2fZcaLBg04k*6J4<SSA7n;6m^cfpU3' );
define( 'SECURE_AUTH_KEY',  'QM8teB] U1|bP_bzt.8am{nY8J:[P/$gmO:r{h6)AzO<>1;KP,$;zbd/38q<j{fQ' );
define( 'LOGGED_IN_KEY',    'T13e;icI:Iwhm6^X4[O_ iwqUgPQgdSsa`_z8&p1RG^~e5bv0f]}~qB/6s>3j3Uv' );
define( 'NONCE_KEY',        'Y>,lmu4[r%)n+@E|cgSp0r6Cu)KuDFaNh6q1QZ6|a~:A8d96)Zl3?.l<I$-ZeMou' );
define( 'AUTH_SALT',        'r~X;qK^sv~xmP,.[W4RGGNjk5VE%H.?5<~^/6/TE?WBX/FR*)frYI4=;OD(BkIB8' );
define( 'SECURE_AUTH_SALT', 'lOQYLqKpdCMV@YkM_VovDy]mZuKFD3W9<e,wM57Lt^UNy$](7Z@@g}WBqCg/diI(' );
define( 'LOGGED_IN_SALT',   ',KmM=B2S[a/#*(H=b0M&Z*D)lr^aH>rpf:yx:L4Yvd6Cg;Iz8[~ A!yvq+aLtIo[' );
define( 'NONCE_SALT',       'zsGizY5vsSHkM~GLa4f|Wx|30fF005pR6$N0qgj?@zc57w`xDO(1F:T{R[5Go^;f' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
