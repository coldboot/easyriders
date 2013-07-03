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

define('DB_NAME', 'bobbinhe_sydneyea');



/** MySQL database username */

define('DB_USER', 'bobbinhe_sydneye');



/** MySQL database password */

define('DB_PASSWORD', 'sbwtstd');



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

define('AUTH_KEY',         'h4i`CT5%4E@y|}dl(ivT+(8xWd+yO_j02X,tf+x?^X7+KY-[cVo*Ll:L-].vK#t_');

define('SECURE_AUTH_KEY',  'obRk0nQ5-UEw1|w0~~<~D*M1/0.|H2^Hu]|?g;v,J+-s ann#GfSEjK&P%,Te_KV');

define('LOGGED_IN_KEY',    'zv!Lu!?8rr3]+VeP9B0Pz Y}].5!U218NfUIW5jS@]#4oYr*722R-MdVN<?Z3=p;');

define('NONCE_KEY',        'b4`FrFE}%[GD(e*vv(+A?* O;n=&w_(OG |JFH9v/Bf7} .~m,WxblwGT2/3R~LC');

define('AUTH_SALT',        '0=QaMR;a1TSgJ330mbWG8zD)h;nylQ.d{jg0(oa5qL<F{jk]TktQZM(AN-YN>Ap)');

define('SECURE_AUTH_SALT', 'wpn<Mp@]#Fg:aR)|F*TV-.LEgjv_K<qhO!(k8AjaoU@;Cyg]+kVRVlE|5q&,|d3i');

define('LOGGED_IN_SALT',   'e89wJ-Z]BAh5utruupT@lT36XdNs CXmwVHq*yXY[mjsNlM5dks(fwyJawa:*l&h');

define('NONCE_SALT',       'X9c~T0>xz43k6o.iw|j~_S8Gs9fQ{g~c-AdO:Lq=&v|tKTK{8(g|v$+r`H|a(hQ!');



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

