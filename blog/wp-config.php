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
define( 'DB_NAME', 'realchrisbrooks' );

/** MySQL database username */
define( 'DB_USER', 'wp-realcb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qUfBseipS5HO8TGehl9nzR38' );

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
define( 'AUTH_KEY',         '|T%xegQL7s-sTJ=-3+ZOOx;{^g7$t1Qy*v<^yf*f~w|)Gq(NwJ+XiC*kfY=AD;po' );
define( 'SECURE_AUTH_KEY',  '9a+LPMbK)3GnW0sBSpf~=2aR`Rp+7t>250aV,bd*Gowq,AbOitt91[}$Gah`#^^)' );
define( 'LOGGED_IN_KEY',    'UqI;3JUH+_U@Q:DzP}B#k~TlR7`:FyXS%_OhW+gGf0?YR<]k,rxg)i d!mwtFkSG' );
define( 'NONCE_KEY',        'T9!+I.*I`z+OV]Sr!xwcN)=E=p.6BOMkd91*9kq!t2-OI:.#MkE64Z~~onWN[>!v' );
define( 'AUTH_SALT',        ']AmYODtxC7*?.tU!P/:@qx?sm|Z Q=>kU]u8S&d5m[)ydp!2.dL5t8*..?24xrO-' );
define( 'SECURE_AUTH_SALT', '%JKfB6 OB[{OrpJ-QhcG~_Q&>F<}u.vyBy2oUGD8p),x0?[?rbO6r}.!^>*_Zb.+' );
define( 'LOGGED_IN_SALT',   '!+p:L>k>b;0@:$lh~cA<9qTQO:u6F,H|:MM>_nvRy5S9stG`25ULLe_=@G*@BTq!' );
define( 'NONCE_SALT',       't- iyd=LID<ui(9Ke{97D)]%V{%#i2DPSr-M#$bv W9~MYXlk>_y?p8NKCFByy!?' );

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

