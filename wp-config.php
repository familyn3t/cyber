<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '8gyI0skwdKjZ77' );

/** Database username */
define( 'DB_USER', '8gyI0skwdKjZ77' );

/** Database password */
define( 'DB_PASSWORD', 'UQcWzxx886KKku' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'JswfE{KSL~zzG[;0f#[j!2CpMKH|X ;}IY;.o. 2rrADg&q+-MYI-;q._Zb};#e#' );
define( 'SECURE_AUTH_KEY',   ':ba~]QWmIG!IM#Ul4l~Xhz^BRppk#XF4^h(Tk~FGQo^YUP%:u_-el7B*-su!.EWA' );
define( 'LOGGED_IN_KEY',     'ebfcdH^JtR,1cMvM#`iy&f[2huDE9l5zTQoI@`Q8y=2pU5wNIGK^s8fvRgYw4:6*' );
define( 'NONCE_KEY',         'xUf&a/9xMS4fAz!{1Fi_#N+DL76oo}YD(J2gi%-25@;!>iY4L^A&f*GQB@418bAs' );
define( 'AUTH_SALT',         'IPvo]<{^~KC{j0vZq QR%PK~VbY()!!l@+V/~F`>N=WIk(2@adB}QYQE)03(6d0)' );
define( 'SECURE_AUTH_SALT',  'h~b75Uost))9(Y-FanKPL`%f5V6HN%HnGJE<WN}fdLz:L3h!Nz,f)c/4D$8V`ikQ' );
define( 'LOGGED_IN_SALT',    'ZE#Z{<#tekX<xYrTEU-VF3xmn6q4-dIK?5H-xq[^Q~x-k;8kW8-~V[3tPX]$,KEz' );
define( 'NONCE_SALT',        '_{ $Z&g*o=F.Y`MiD%Z A@^cX2J~S<M$bN|[-Dq9H]Z6{T(4}7iLqdRMP@U DS(-' );
define( 'WP_CACHE_KEY_SALT', 'N0k`]E7<m?]`k5,ws)88jP :zX!(V wCE1~%bzD)4,gl K9LV>A!Ls);_Q4GUC3K' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
