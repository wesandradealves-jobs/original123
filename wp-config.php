<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'original123' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(zMwK3Xfls9CMzXXg,|}Vbd@BJQ+-SJ-PeD=cW^z4t|N7TXf./%i4*&JEwE*,wW?' );
define( 'SECURE_AUTH_KEY',  'JJ<DD+5=,t1[84[? z&@d-@VzOb]!$Ax(-:!FJx[(z?_1@Fx)O@=yU{RB.?_A14Z' );
define( 'LOGGED_IN_KEY',    'gHUGM!7Q%(o)4x9&QZE*Dd#vS<+d-w!AF{vX4fr-km{we*8p%q5`F+}Q,h*>(99b' );
define( 'NONCE_KEY',        'Ykx=L+bhE{VhL2a}HN*@x$5@tI`vw3MR=Rq6u]=AsDVt|dEVE6J.M-~UK^fh7b-.' );
define( 'AUTH_SALT',        '2nbWyT*{DO8kcvL4of_[L?1m|K2~_FFt/j*i~M{YjU5qmK%Z}FGADUEY|&k^(Mg:' );
define( 'SECURE_AUTH_SALT', 'I`C3DG@_c:W0/G)~_*SiR_t>::+,:&2PxrA(q9nX+ZyjG1jNVd>mI:!<35Fw6xz+' );
define( 'LOGGED_IN_SALT',   'hXIzSZ9ZEGmF[z/#:Upan`@BE)G39a#?HPoOZEOp=AXkm(%FOk(%QMUB_9xMf^@g' );
define( 'NONCE_SALT',       'MAVf(!bR{KBg}IWuR;(tRK,:FyayGB(Q!70*y {9sqP522b*UvG[Bq1fIE >mj4]' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
