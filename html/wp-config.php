<?php
define('FS_METHOD', 'direct');
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
define('DB_NAME', 'kentiastudio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'asauflvlhX');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';2e@4*~2f ux~ ^OE`Z<I5&gFN|y+2+*sAWn$hZ,h8eBRZ` >!STa8J o,MsG)Pb');
define('SECURE_AUTH_KEY',  '#$^~aP3m!T*cr*cQMv|/U)yb:MHyERQB{b>~e@]./e}p_;I#}DgW$~],^<V7r.y1');
define('LOGGED_IN_KEY',    'q0o9JwM%!cNNG{#UhYR?EZ&Q{GFf<Qve7D|:M|F_;.wc5tSPP2;z`I6).)|sFNI|');
define('NONCE_KEY',        '>!*v4yt$5fP8*uoXX!c/n535mg6^m@(V^r01<Y+&zoJ0d+~cC>Jp3]u7#.+A=W@N');
define('AUTH_SALT',        '+EuBxHokw[|o`fid+Q8dgYHQx4jH6 m{O0-M+`m,6$1`o`+}L&s.FrRL_rX;[Nc`');
define('SECURE_AUTH_SALT', 'DB4<eh#X7[sW5s-o02ccRYQ$5]wDW<9ficy/V< V@@k#_tA,**78U#|>HV2kY-cB');
define('LOGGED_IN_SALT',   ')xu/5n0$VFuiYL5?IVFw+r[q%W/,x>-+(=]z,5*Jd#Lf?Cw;^<8#y|M9VU@&f7ia');
define('NONCE_SALT',       'o**]c6^l,!hH.sWp@]} T.1I~5kEP%Y_7Y`M |tN5!AT@}QU&,x5OuU7u5jQl&XF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
