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
define('DB_NAME', 'webit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '9iI BxX_18$jn&6YlI<)u&qN^-A7wZJfXGdX6&t(!;1j3W+5W&1 C5iDhE6;.kE)');
define('SECURE_AUTH_KEY',  'rEOc+EixBW()QBX#+M1JffN;fl5c2?{shk*<i0G)>?Wf?J)Vv8BRp^:+B9E#~Cd ');
define('LOGGED_IN_KEY',    'ak-(b=o[g}s5)`r6dLO*F[FvO$|6<)+PV-8W/UHRp8X-7B8uM7yM.w^-liVC,Y3N');
define('NONCE_KEY',        '7K7O.j5?!+=U#nrowtk;E|zQ=Vd,a/Sb&@hPz?Bw_.}^>[Wes BB}}>MW?oWm sT');
define('AUTH_SALT',        'fFq7(fiQRw:Nwupt5o]Ic8gzi;s6-RP %>}*/Zt0!bs^07+]NVjq7&$7{_Tb_i|q');
define('SECURE_AUTH_SALT', '*tZcRuMZT?^tnE8)2,|00;9_*{b$!Oq=Af/_%#IbyPP4`qP=*4{+w:mAL3v]vLt.');
define('LOGGED_IN_SALT',   'IBWL~@[|]tEv&(jsuZ5tA!pOO4/Q;Vm*x 3pd015a4hR#`qtD%R=,rYXz3Z`y,>v');
define('NONCE_SALT',       'GS0v]l}I&j!#C?nOM<EI7 0_i4HjmLp1b-:24oWQDOA[57+j^l02vM,&sKA -qY^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'webit_';

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
