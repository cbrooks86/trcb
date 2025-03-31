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
define( 'AUTH_KEY',         '[,Ap#/?#ea*cpfvihxb?t}/iJ0a k=>IxW(;cN{z3PZy6k*wfzHjuGf-:rB-6`C^' );
define( 'SECURE_AUTH_KEY',  '%:Di,<WX~&-GU0h5Zk)q ru?qy&=BCq%<V$h~ga(<Oy]PB8gRZXC?k``r:r!&cv&' );
define( 'LOGGED_IN_KEY',    'fz+fYDs6*E=0qguTbnL_A?)Oh]?Z[|i4;sSVv,6SmId0_Vq~}~}d[WH]x)(PhvBU' );
define( 'NONCE_KEY',        '-|}-/heK2VlwM,H0lg~%Q-MI5A_ 5+YkNq?YHgsIB$,,o9-)3A`:*_qzu}~YbSQ]' );
define( 'AUTH_SALT',        '$ZnkQB-QjfaXr0fR?L[RbpDi:]d?A,6!nzK:w[sFMew=JGL%j u[>T8 *bz@UmP7' );
define( 'SECURE_AUTH_SALT', ')Va8Ux5on|k?QOU! Mt2_.UZ{W0@v-6IS>JW%Xvx$@u-qhLmB$/]JD5<YgByp,[D' );
define( 'LOGGED_IN_SALT',   '?KSb7i$h)x:IpBLW>m]X$cK4^-pdAw^J0FuF:mp9x]L1f1O%?edfN[Nl?i&<j2&p' );
define( 'NONCE_SALT',       '(~oka^iq|,<&kb(=[!VU2,2[Y>^GQ`S)GFV&#cW3lO+E`,<_uXy~}$szRwn{AAZF' );

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

