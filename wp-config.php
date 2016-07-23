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
define('DB_NAME', 'thenexte_dreamhome');

/** MySQL database username */
define('DB_USER', 'thenexte_gps');

/** MySQL database password */
define('DB_PASSWORD', '$$$Cash2add2501$$$');

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
define('AUTH_KEY',         'GJ8NLn:fpGrjvb| EkEda2e#QaJQ$PmbfY+-1j!k`(qaI5XB^1K{:y4=.<3hbc~|');
define('SECURE_AUTH_KEY',  'BI7vv7.G_W3;xTg$2V3qPW[Ff7=+`d?#<:d/7|0_b)m5h)yA+>!s4ZnfPcLV&3&l');
define('LOGGED_IN_KEY',    '*YU50i4`pcbPY)ikgva=7)`29RS`[[H<!S.N3NOxM7.kXh}`H#DuE0t-`BAa=36T');
define('NONCE_KEY',        'l|*;.J[=WI,7>5<x$0ftg:n {#4H7C4+9 e#WVQN_TxO3<2wJ0h9eCQR5:D?ev+h');
define('AUTH_SALT',        'OMgKSE5ze~M{@vnL.9@+m2G$<:LO30b$7Io|0^-3w1t@+/z1BX`z$<cy6/j]-wG3');
define('SECURE_AUTH_SALT', 'N(-9t!dk$/T!5`jtY5#)VX?]YzK*F1lp-(gTA]L1)&kAe<%G=)ZN/y!^YtCnl3~2');
define('LOGGED_IN_SALT',   '<&VkW^x;<?i-7e]broM~UcGvI4/@Ym|I]X+jALH9za.kp_mztPkS_d!4%%p1&TTW');
define('NONCE_SALT',       '/EZr?p*L,XOI(/kR8KE5,JDOb|*&yKy~|/3G#sgL@n5Lcm ?zyH~O-*8jx|Y|pe[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jass_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
