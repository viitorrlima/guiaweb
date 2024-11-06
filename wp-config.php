<?php
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
define( 'DB_NAME', 'wp_guiaweb' );

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
define( 'AUTH_KEY',         '3fH5~-5:t<g@(@x:&1o`0n@+P3gl9&}s0g&1Z5s0L>}0]bUb./ULz~-lR5lo0qd+' );
define( 'SECURE_AUTH_KEY',  'IEt#&5r*+VIIl(lWo=<RVx|>LF {)g9]k>BULP8bz/F?Z L8y&$XW/3Kz2$>jrP`' );
define( 'LOGGED_IN_KEY',    'Z=y1>Nm[_WQ;iXUU]hU;P,&|{^D<I9S1_*>D0IJ=9s;>X#Q;ixY),?0IC1D&*6dQ' );
define( 'NONCE_KEY',        'u(/Nv45dG@8h)mSaJ(.teyQ$Q%*cGpO@XUbK[U*byPDns2cGJ#n%=^5t;hY9~Nvu' );
define( 'AUTH_SALT',        'Y0d;pz+,8Ad=Y&>u]TuOR8Rk1OgNJ}B[Z1DK!QNbY,Mi^p-M.{#<:V,~hR=u8v?-' );
define( 'SECURE_AUTH_SALT', '*(;9v3iZ;ngxLZit;0FCpMUg+.J x>kzW>4h90Yz+f`@N{]Eox*#d/]P:{}%7vSB' );
define( 'LOGGED_IN_SALT',   'Cc|@;J8F;)v|E19ANU.oS=:etU=cj:7aL]&qs#NQz7q[UjS!b.]8ly&as3d[u-+q' );
define( 'NONCE_SALT',       'L(IlKV#h.D-~UP}VDx{CE/Vvu(>{*uQu|Hx}srLE,<-xuwrzhg,X%B9)- ?j^VjG' );

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
