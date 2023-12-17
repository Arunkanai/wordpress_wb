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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wd_website' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '1[w3.ULf.cGWO.b*' );

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
define( 'AUTH_KEY',         '/H#k{BcOLS5Ig>d-fp`V=,I#Csz&BX61gBxMBs354ic@$Cgfc<UxE~Vx:k^7gT($' );
define( 'SECURE_AUTH_KEY',  '}/T1XKHEU^[3tJ:/fjnnd*:U25d{EN^3g1bOdHSqmR1;QK&)nM5t b9qH8OafYUn' );
define( 'LOGGED_IN_KEY',    'aM{g?cn~PdTOqA!&`n)dF9i!RbfKIST -iHjS{2H_>k:[9}HQx1(~ev(ClRY#WG<' );
define( 'NONCE_KEY',        'j@Y,s-,.Phr[$YQk97Y1UlzU@M1w#{/70|OS}hjg-5`.eM2>?dAv#LoR1}L2v<J]' );
define( 'AUTH_SALT',        '%?l*KC*sDp;w,D21lB[K/mE1r9L@btFAS@8c+fE>syuOY,H7qoC~p7o!f+^ldY<5' );
define( 'SECURE_AUTH_SALT', 'Wf_&U55[N6F<Mpi]iWg~ISw7s7k@]H;p/qDli0{msBvm14GwML1EJp8JpnH[ATN ' );
define( 'LOGGED_IN_SALT',   ']AT?ax.[5gxt{+wNp^DyS2;,SD{5O5{~Tdrq8|m<`d(R9-.3C#WiN>{>]K1S L}=' );
define( 'NONCE_SALT',       'UetmW|`ZmD3x( kvLuyj 4u|N= 0[b,K-^Ntg9?|={J&Ye^k&T[fWDj?X9]+<UGW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wd_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
