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
define( 'DB_NAME', 'demo-1' );

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
define( 'AUTH_KEY',         'a[/K&{qtwy+/wD;@pK`_/Fh{<Y;|g@~nsT{xP&=EFf8I ]fX|M @6MUJ1;YmX.qi' );
define( 'SECURE_AUTH_KEY',  '[a#$u)&t#ub;@3)5yaa7H!qJ%)MS6um#cX2SGf1{-t.)EBU@UW*7&dTs|u=K*/Df' );
define( 'LOGGED_IN_KEY',    'lX#Y}]*(6NE+sNW1Sa-=DG);qaU*QPC,U6@AXT_[6@U]HKuqv|TAt6t88se3EHxg' );
define( 'NONCE_KEY',        'm>h&yaA_rSL kW[NU:5|3z?a` /xuvUMuL}IMvgvN^/IJw/UBR08HzdA&nhR?!RF' );
define( 'AUTH_SALT',        'XG!!~M]m~=[n_[R:1awX_8RexvbPY]o>!Y2~OS3I3K;UP6>t.Jia!>&oW3*QE1w ' );
define( 'SECURE_AUTH_SALT', '+0`X$i=+_cKx@FRGBY>~K*?DL-@d]N=AM~c)o~*,]})Ytc^c>$1Zg%;o>l?F>20R' );
define( 'LOGGED_IN_SALT',   '6*4BRH:?B]eZ=!em<l<#+R*u]DF6u=WR/k|$dMzGgo asgLx;Y<D5SRExB=GX7@#' );
define( 'NONCE_SALT',       ':4ndRiVLtAdJQ:5:v+ 3[n<Tx]HNFi`VaJ0:r0Pdq8o(k>~2kF?#Rcn0|1~]~L+6' );

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
