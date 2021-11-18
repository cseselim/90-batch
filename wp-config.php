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
define( 'DB_NAME', 'abc' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'fV*/a(1sDBa=g;)<dTEPJ#JLcFjyvUf|?:~yX09BGuI>(|z^gu5dNDx.KF~w/o:@' );
define( 'SECURE_AUTH_KEY',  '0gJQ[5RUXcI=j1DEhK*F=*}i%NH=^U@dEbY9.@~H0YvWAzKdV@dTO8!)%^P{q[o<' );
define( 'LOGGED_IN_KEY',    'kHiOf<1&pwxWChO1pM50@AAB2_~vBhyZ89!X-}]wN:MV0&/9}s9C:CL9##NdJ4A&' );
define( 'NONCE_KEY',        'a$2|Wpi<sV?K>=IAz,kTjkj+}XlCI?&0*PK+p|Qj:6]~pvie4P7Jh**{D+,!<rwQ' );
define( 'AUTH_SALT',        '96sA2MhOXHoR51_24K1+~~r$?!fO^|qB)$q@8rrwUL|4V+L!WL#Ta%^d5JQ1V=`j' );
define( 'SECURE_AUTH_SALT', '`/v[49Vc&W3%!<:hyhWH0=+h#G7)g_mSNw$;;slj}&R_<=J%LOV 3gwScqY]s[1t' );
define( 'LOGGED_IN_SALT',   ' ~d-FeFK5G*h`3k}H2=k&!:e0NS^C#[|`&i H;_3Rs5+hf`n3&~>Ea`RK6uPQx0@' );
define( 'NONCE_SALT',       'PB6jEjTWIXus9SC89GKR-ZGu7n0RN9Gu]%V/v`w/Z1Awuw:veV!U;Tp`rpwGpLoI' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ng_';

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
