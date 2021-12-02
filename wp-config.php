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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '22607282f120034309f5f6a140d3755de8902a5fbc669713' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'LTWI1Ej8q;@g Wr>0sUfC&?15YP?r0<`MgYfwyiv*?msMyDCfyW?O;Y:peB=2;2t' );
define( 'SECURE_AUTH_KEY',  ' 1_L^[A(EQ9=Czlh1=Y1Exj@.7N&pekj(#%_FSagyO>TG/*7X4WS7Np4 N(:JoQp' );
define( 'LOGGED_IN_KEY',    'F|nbG8VxzLe?f8CfMwie6>:l6)^fFu~x!%J*lZJHH!)LN%U9^9b9<=(Cb54-A2A;' );
define( 'NONCE_KEY',        '|)67Cp~PU.9(6z>A]S,SnP 320R)Zul3bDCujdGFN k`X;WA0sqXiDFuyh2ABJr&' );
define( 'AUTH_SALT',        '+a?iEd}:^^E!d }mSS ony)3Hk]lXORxnGTla14|Gk12KUpq[9]XQ7NE<5d*BZd6' );
define( 'SECURE_AUTH_SALT', 'G)Y;dH;HRuLE$dp_h(FPfj8QYJocKr.,9iwJ< Eh;f q:6/4-}gM.%O}A7hws>`K' );
define( 'LOGGED_IN_SALT',   'UkTF&2?@cPH_wZ^rB%J:H5fO`)}d[8`wf{gSRq^&<(#s|]6u08lVyzJ>j,7ZVLN%' );
define( 'NONCE_SALT',       'WgL>!9)Fp{b(|@yoeQ6EfHkA<b|&D@o=>I RBHNU:ATu`7YRbQ5tNm<tU-M^{1DL' );

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
