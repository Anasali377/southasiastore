<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'southasiastore2_db' );

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
define( 'AUTH_KEY',         '>yp]C1*SVo<5n+5U6wv%F&/^F`v`g7{L]Y7fU-B1A8&~HAuQ7wmO/Ovyuc05jZ} ' );
define( 'SECURE_AUTH_KEY',  '2BNiV8ZX|n(4K6e5@JjQG}P4X/GwF0_cBoT}c*Shu%XRK>-S1^A[$={!xFK6#~R,' );
define( 'LOGGED_IN_KEY',    'Y%nWqZ.CmH3&wO((wFYR+Dz#dR>*00OiyM1)O,_z(?@wB#4nPOau5Bu8l L%{(mf' );
define( 'NONCE_KEY',        '/44v!,&lL]M+uHh0P~73!QZ,cL5k55n,]PsyCZ#)fQc@0qe3.R]V(}aVE6tL%De@' );
define( 'AUTH_SALT',        '9s,<G(GE5 @WVw7N3daEE{/HikJ%{L*skx~e2C{OYBLhE5sVx5&/mmOm&Il+THvI' );
define( 'SECURE_AUTH_SALT', 'Gtsv8;u-m-sCEp/ydfP?KP)~A7s pW ][:8yo/TBDOh&!8Z25,zi]b>Pf07C&&(D' );
define( 'LOGGED_IN_SALT',   '$^-XuA/ Cj*Rs[za7y`9yIzt^AczaqyRwCm<DG-B3,^jE2-OMAAEpFZ#82GQBpZS' );
define( 'NONCE_SALT',       'J^,afxz,8I,__f{dVG*psf(cM{Vtp~5F`HKc`JGn2$.t8~b1ORWAq(%`U.6+%v)m' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
