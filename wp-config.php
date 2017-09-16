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
define('DB_NAME', 'collectifarchitecture');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Admin&é"123');

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
define('AUTH_KEY',         '{%@Rtg*WrkmOBOa>oH?qZ|Cb3,hym,>9#3v1D?&Mdr^bTv+Bf2w- d$m}eiBB4r,');
define('SECURE_AUTH_KEY',  'DmN2fnh`,B~.0xSppWmZC;|PYoeKc}|M*vhxW_1K6*|_ARH]/g:AWj3z,D>hu@g2');
define('LOGGED_IN_KEY',    'Id4-09^rb^RZb`0xzVJVkJ<;u=SL2}ACFDvdCT=)_u966!OIr1DPCp~FK>_5rSbW');
define('NONCE_KEY',        '1_bz50xLAxa.83k{x3n^~sp!xAu+-3{9+XEd^.caw`(tEP:xK,:VC{L+x*X*7Gml');
define('AUTH_SALT',        'lcc<~wjTX<E7aUx&|eLQ0k36p>Zr50#lkJLC@bsx:1R_np&.]W$ N-T38C%!buJ6');
define('SECURE_AUTH_SALT', ']!}B`4Fr0g58LHDx=2:,),nC$=/K}0vmE0gWI;0!6*Jw:g@oaQ)Y6*;u|{q.MoB:');
define('LOGGED_IN_SALT',   'Dx{.&y.7ju70U*4Wj@efETst7` eE$s2])f7a3pYoE[6in@LVt1Pt`R*1/xoLp*u');
define('NONCE_SALT',       'z S6.|,,Lun, l4l%!J0>8!CI`B<v%8wFNan-e&<3|  8*:!8!#ck@m39W:MfuoG');
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