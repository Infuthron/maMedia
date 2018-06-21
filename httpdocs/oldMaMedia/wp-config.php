<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mamedia_wordpress');

/** MySQL database username */
define('DB_USER', 'mamedia_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'contactweg36');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'HI>fsl:ENrW;!tp/-~hbqg*3<[1)8rZa:(hk,5Hxbq<ee^AAh=`Kab{ynbUl](/@');
define('SECURE_AUTH_KEY',  'p%74J%|;+]?i:*OTHk~_.XU2;SmFkHga)Z@I.+wM0hC_YsI-24*4pUs,1Rl1.~@M');
define('LOGGED_IN_KEY',    'm89DE>|iv<kP1B3JG,o-e,-Op5@dZ}+HJNnQ9{kp72j4G I/@|56-t?SO4+1Ok-f');
define('NONCE_KEY',        '(dY.l&uhTQNUt[n^A869*U3(3sBEKSqylqxMyNbst.+5:ob?2C*PF0xW<;=!+bN/');
define('AUTH_SALT',        '2:4h5+2.]=hd:2uxQ9l*POt!EzI9BB-3co:j*NM/l08sH[(N|pXhhd_fQh*si-*n');
define('SECURE_AUTH_SALT', 'qPRkXG,b@&OseNbOXHitRY(+-l3?8Ef]7Jj=:#1aO-+~nG8:L]*J4h H)H`|`ZF(');
define('LOGGED_IN_SALT',   'W375o-y|/u)BPDI4sBJ|_5)Vsmc^wHvn.Q/>RxltM8rn@Kgp{E3X^0,>-W^k7jJq');
define('NONCE_SALT',       'NpQEag@J},8j*d^oh7j?||SQi|Zv*CuQe&V>|Vy[%a.+)a}h_91R9-{dF1%u#cq{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
