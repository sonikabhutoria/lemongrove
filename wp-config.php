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
define( 'DB_NAME', 'lemongrove' );

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
define( 'AUTH_KEY',         'NV6#/J=8Gm&)9tk/df#fNUZ~ixH-byGX&E^!e!A<b3jBQ}wU]Y)zc2aZ8J!(27f1' );
define( 'SECURE_AUTH_KEY',  'd;<JyF)/9I0xX&$ocoNoQ/XAc(0~+gB>ON^&WSt+Z;J`0 OMNQI5pEgl:=%>#HE1' );
define( 'LOGGED_IN_KEY',    '|#UD&/~t7<Jsc8^>hvl7Yae/hJvmE#mD B*4xEV^aCX<N44Z;sZ4?0BuUV7{,vW5' );
define( 'NONCE_KEY',        '%{WUm9lrcN9Q[avS9YQ5[PJEW}Ni?Ejs<)9`w<zpW3Swd ~DOvt=#a6aF`pQt/2r' );
define( 'AUTH_SALT',        'm62b&2hp+/jQF+dwQI@Y7/Ro)}n>N~PGU:ya7{u]B_buDhL3b=ua b8Fn`@&IeI[' );
define( 'SECURE_AUTH_SALT', 'b3<IdF(B$t;O<,p]EOC]@CDj|L z%alC)0k]o og-Wj8Flvn#LZD|T7=C/P*02Xc' );
define( 'LOGGED_IN_SALT',   '3=do$vSCE/mNjr5]XO%Zwvc~eM]X%+:UGac8zF,}2K&]}`l%/xj$i$XF:j7)*6Ia' );
define( 'NONCE_SALT',       '4K}6vqi>nm9GLdIvh.mDg)qJC/2MTYb1bP&qj%%5&jTO3dH,EcOXQw<X&RS59eu]' );

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
