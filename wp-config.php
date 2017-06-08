<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jB!@;EtGTV| {UC040Q;KO(upZ,K<P9nLCqO~K%3PQ2}G?Cy/|d~eR-W.<msiUv?');
define('SECURE_AUTH_KEY',  '6g}@>F.Kl]eaKI4!OP,CO]f<1owDnWy 4CJBye``2.^>3L I0xgN@<}KFt5{K%H:');
define('LOGGED_IN_KEY',    'bN(mzF^lCeul @+CC_*<>:a2E2i!LfXh<ClR7V31|ZuzIt/KERAZ|{{t%)_D/A S');
define('NONCE_KEY',        'tn5Tf FSy6<B^isTTnkfs0xM>Yxfv&CQsLc.b!]Ka[u9YP}mR>P>hdf?gG3}O>,S');
define('AUTH_SALT',        'I=+f!~el!HP>1>,gC.w&#&;4KN7a3SWco^(p_mc2YJw1{;p:}F6%ZzVFO|aYS0Mt');
define('SECURE_AUTH_SALT', 'v:(MtF;.msQsGUo+W)OFY=)9zDK p~x;Z_bY@FALi>7&[UkSO{}ux4TT?#JG;VAw');
define('LOGGED_IN_SALT',   'D&8EvayfM.sv0x2#[{b_Ns5OCdKAJ+gcKpP&.-#,RHH4|fv5b{?uY~-n(jGxTy!j');
define('NONCE_SALT',       'Xk#e9}RO$P}.`|zl`??F^jK_|*(r?IFKN3Rg{o<xGb FM_M/.jr3;]ep[zcS:m*m');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');