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
define( 'DB_NAME', 'task14' );

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
define( 'AUTH_KEY',         '>;v]kLRllKS,yUGMtuAhwa#@=yRnr3cmHq3sGt*tw#KsR;(9X758Gws@gSO@#]-F' );
define( 'SECURE_AUTH_KEY',  '[k/zdE^vv>M~vQUHgs.EIPQfCV2po tqXAdC{jkr{[c*NMH`p(]}K<Vwn5SuNf7Q' );
define( 'LOGGED_IN_KEY',    '@?[AZ{ludv%%V}(/+fA+uz=;WK?7&/gV-f/U 0,7n1Ee+xa=~`>8@QTU$6UPE:nd' );
define( 'NONCE_KEY',        '587,UlV+k:V7L;A2c3dE) SmwSy%lH/lIO6!{lz@u|+-4Fx/6~8$5RVt4geA 1| ' );
define( 'AUTH_SALT',        'OBdO{8?|=|:P^Ts27^I@skO$wmnbbfIJ >`=[h< 3AxMss$x#[FX>H}BZxGKM8@.' );
define( 'SECURE_AUTH_SALT', 'LM[?N|3ujqivX0xy4.-#h$T.N{p@YKk#5!*,_*~fHUZGenYg@x^|)C21}z>pA*@`' );
define( 'LOGGED_IN_SALT',   'fS?GY%_a~#It$|b.9BJix^GMP?HT-95*d?J38}9;>{jmQ*uO2m|qG+q-:4O`iMd:' );
define( 'NONCE_SALT',       'mLW!U!_deeuDLmD*38GjCH{}M;u)E,82<N=w{{O(sJ{pni9x(/`Dvk9Yf}nQjG`i' );

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
