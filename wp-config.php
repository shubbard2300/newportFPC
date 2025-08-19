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

define('DB_NAME', 'dreamhostnewportfpc');

/** MySQL database username */
define('DB_USER', 'choirboy1953');

/** MySQL database password */
define('DB_PASSWORD', 'radar1066');

/** MySQL hostname */
define('DB_HOST', 'mysql.newportfpc.org');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/*define('DB_NAME', 'fpcnewp1_ss_dbname2fa');*/

/** MySQL database username */
/*define('DB_USER', 'fpcnewp1_ss_d2fa');*/

/** MySQL database password */
/*define('DB_PASSWORD', 'hTu1doxoZpXy');*/

/** MySQL hostname */
/*define('DB_HOST', 'localhost');*/

/** Database Charset to use in creating database tables. */
/*define('DB_CHARSET', 'utf8');*/

/** The Database Collate type. Don't change this if in doubt. */
/*define('DB_COLLATE', '');*/

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'dyEffvOtXkK$-bd>?Bty>$MntvfaQeTg%>?yuqki&^AoJq]L=e!-gf*{/)yqbMh}Kq%ke}[-%F&cD*_xt>|VM=dc+eUAN;TJBN*]tF{fW^=YWm>>PH]Zl)w-R(u;OaHW');
define('SECURE_AUTH_KEY', ';YqqGFFmaLmC_Y@SvQ^fOzcDTwJ/]OGgm(]hOP/$xnh}>&lWhMXf[mP%hLS_GagVD!kK;XLq?rBZb]rsb}jQ>aiO;azQ(XqCqLtmRF[QdDsyW$rtwA>=|aTl)OBK^Xl;');
define('LOGGED_IN_KEY', 'V{_oA=Yprm=Xfw?dADaJc];>|UCT|bcGLFAk[-^AbSD{AtM^aMex>DK(Wn+eqR@t@;^uVT)<s&F>H<HO[ndeBaCQZ_zGzYs/TNij<AJxOR=HTEy-vYEWf-wJ_PB>!eDv');
define('NONCE_KEY', 'dUkrSkSWxP<xR)a>pV|Q*w|c|>rq!($@+<|]s_+GljTm$YAb)Iq=gKnc<uo@MQd__L?TxY&epD=n/?;QRMM-OcGmU])yMJ-Z<]e_&$)pb?rxoog!Zt@J?)Cx_?G_z-ZD');
define('AUTH_SALT', '!$CwrNMtpX]N<!JaW&ih$>{c}Q!SMFj}EwcGVCjEr<OgRYczNHIVTwxS(Nt$KHRdrV[WLRHw+e)PHsoWWPai>JMC{jm=Exvr{EbpPrku>JE}RMU{uIdhO/imXWUn)gz)');
define('SECURE_AUTH_SALT', 'HchMx=Y-a}BsE>;Lbq^MrUECd=MNiEFXwaxsFg@bnwLJhq%nEKC{Ap]!Ru@Zjl{h/kUcTSU$FUEvprbHYyixGzVaR!yYLBKQbenae_wFB{&cGJmf}Vv(KaMf=$UlOS_|');
define('LOGGED_IN_SALT', 'FeP{}z<ySAia;/cxIz+]WT_ESD/Qsm_kea|_gginpPnATz?vIX%Ir{xQ[U)*%l]Rd++?^;l-(;[U-%C@(MYWh>eQg{YM&Z*wqB(nUQsII%TtMZ|o|F)O)y*qJDJnU*CJ');
define('NONCE_SALT', 'O|ey>$aSGn|Q}VvXld@zMi(PhPhrgc?h%n=}suM)rj])JdQrn!^dKDO>E]tSbG$jCSyy(!&YxRirDW;>uDcU&jHq=z$$]MeLYB(q{]Nk@!$v+-Xpy;x|n(={]MH%gJIx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ktoi_';
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
// This disables debugging.  
// Debug to log (not screen)
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 0);

define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');

// Optional: silence PHP notices from plugins you don't control
define('WP_DISABLE_FATAL_ERROR_HANDLER', false);


define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 10 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
