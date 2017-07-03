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

 date_default_timezone_set('America/Los_Angeles');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'petgorillanew');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'E2<qUI)n|brPD?amW9a1U5}Qp-KkUJ[qI>/c:wm!JdUREEz3c^{CWj5{Cs37_:%y');
define('SECURE_AUTH_KEY',  '0s1M2Y7ZgrYR)7:fBt^*ZLw0CNm{4p40{UZK+O_Jc,QBt1h|0x/uXAvh{KTEs,8l');
define('LOGGED_IN_KEY',    'aMb@C5kfnfYU]8K/tu*29|iRJ+l) EtW+G08~Iadp;<Sv~$/q=cJ?.oG$|6xRxp#');
define('NONCE_KEY',        '3:~^F~/e8jjm=ny^:HDuArT /q5tG9a@)!!grA0)fCmTt(g@=u?.dD8^6UIX+w4=');
define('AUTH_SALT',        'i1+n`4-=1NsM|+m*m{$3^7Yp=:Hc)ARBO3P,f:w9wNMGn`<Fgdbm99x*.!:x cu$');
define('SECURE_AUTH_SALT', 'A7s!b34rHtJm`JpGDwZNxBo}z*A=K|Op4Z}//1zqE]X_uj^_^~FhN9z nldRR]{z');
define('LOGGED_IN_SALT',   '_<J]*/QJ@BrwC[G(i8)Yh,3GMX?Hgg;e ;oG]oUgJZZo$q1*:Rj0f;SX$?&_]iRj');
define('NONCE_SALT',       '98|5=s6Da@fxSb6O$D]Jq2}qG;RsN%:iO<fcjcQX-yGIqDY Whoe-]y915[cM1=]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ptgrilla_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
