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
define( 'DB_NAME', 'postua' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '>s]naXVVRr{8#7NK1W &8MJ1CZ%!8r_(+fl=[J!6CfoHJm-baiG*ww_oe6/mbk#C' );
define( 'SECURE_AUTH_KEY',  '`:ZE>)PFZ1K[RXKYIunU)&bF/G|79crU,NH0V>A_(4SI/pD;)N[vloTMy}L(?Zn6' );
define( 'LOGGED_IN_KEY',    '(fh>8VE;1B,Bda`zZ^6Ig:?wS+ 1`~u1U>/~ yd]k.flS~+}5b?,<tL2<1P`!F^6' );
define( 'NONCE_KEY',        'cOi<go&;g2kz7TrE9r0HNncmq+(l*7c->6>v{S(rZT[U`rs&[)`bzmM|3uWZL(i~' );
define( 'AUTH_SALT',        'n*afK*ngq7jo<x,oHVW[j8Yi77x69M><,6ey#A0%$$q!e4uI/&=B-<*(TpSC~(py' );
define( 'SECURE_AUTH_SALT', 'id02_g?Edh/hajOwIGx|Wh:$=&u%Kg&Gz_Cvl:R7dM?.G%q!Tv9<6RrS*=,37@4p' );
define( 'LOGGED_IN_SALT',   '/n$+S(uhyf/:RI;@O?!{nne@G_*X}K7*36#RoAz7Pi rE1$bL:Hj,eL?>N*c(V7*' );
define( 'NONCE_SALT',       '=Jr+zR!io_=$P9^bu@e 1YhpQdT3e$?[sJ!6}4%eG`DC8RA9X;Q =[Xt|FwV)V7L' );

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
