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
define('DB_NAME', 'i673484_wp3');

/** MySQL database username */
define('DB_USER', 'i673484_wp3');

/** MySQL database password */
define('DB_PASSWORD', 'K(s6zMrFHceCK919UT.69[(2');

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
define('AUTH_KEY',         '0ODLbEdaPGOakjhLAhZPqbMiE9oJOzuadu02BS6OuDaOoN3UMmg8XTRoljDgTTWf');
define('SECURE_AUTH_KEY',  'TCVbZMCFGzXWcC4UssXpEets2kcdGnmzAvKS5THDzhSnDCMXZK5YSGIx6v3X4BUW');
define('LOGGED_IN_KEY',    'X3BMy2IB0qrNhdrgq3NzJ98op59bc23AHuQIYApNEDm5JbI6wK8YEvmwRqe5OeQy');
define('NONCE_KEY',        '3nr1NP6sD4z1CthBCso7xHMSHa3iFOiLZq8xDuXDqKTVlhJPYOFyNSWXIZCIrvPX');
define('AUTH_SALT',        'JPRHq9LNLUG1XB6M3GH1ISJjEfHoqTmio4h0Dd8kxWC843FAgSgs0uSmhiOE5Hgk');
define('SECURE_AUTH_SALT', 'qZ7IhZZf1sqSxEUBzRVZFkeGP6MpeOdiBWK2uHx7Ud0QdFA1PdOyPtsiDJOSFgRP');
define('LOGGED_IN_SALT',   'pdUKSX4OSXUgfjhgYp52v1FIo6TKMLZWaJFXUEEN1293v4Q4zSlgkvr8ODqzsBnH');
define('NONCE_SALT',       '34vKc2tRLUcPRvedKRqIR5NjqQAeP1Wlf03oIzIV9She19gKSQU4rfDoKE7RphEQ');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
