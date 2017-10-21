<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Caos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>
    <!-- WP_Head -->
    <?php wp_head(); ?>
    <!-- End WP_Head -->

</head>
<?php
//Check if Rest Api plugin is enable
$caos_rest_api_plugin = "false";
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'rest-api/plugin.php' ) ){
    $caos_rest_api_plugin = "true";
}
?>
<body <?php body_class(); ?> data-name="<?php echo bloginfo( 'name' ); ?>" data-url="<?php echo esc_url( home_url( '/' ) ); ?>" data-rest-api="<?php echo $caos_rest_api_plugin; ?>">
<?php
$header_image = "";
if ( get_header_image() ){
    $header_image = 'style="background-image: url(' . get_header_image() . ');"';
}
?>
<header id="header" class="site-header" role="banner" <?php echo $header_image; ?>>

    <div class="logo_container col-md-5">
        <?php
        $logo = wp_get_attachment_image_src( absint( get_theme_mod( 'caos_logo' ) ), 'full' );
        $logo = $logo[0];
        ?>
        <?php if ( !empty( $logo ) ) : echo '<img src="' . esc_url( $logo ) . '" />';   endif; ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="ql_logo">
             <?php echo  get_option('blogname');?>
            </h1>
            <h3 class='sous-titre-site'>
                <?php echo get_option('blogdescription');?>
            </h3>
    </div><!-- /logo_container -->

    <button id="ql_nav_btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ql_nav_collapse" aria-expanded="false">
        <i class="fa fa-navicon"></i>
    </button>


    <div class="col-md-7">
        <div class="collapse navbar-collapse" id="ql_nav_collapse">
            <nav id="jqueryslidemenu" class="jqueryslidemenu navbar " role="navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'menu_id' => 'primary-menu',
                    'depth'             => 3,
                    'menu_class'        => 'nav',
                    'fallback_cb'       => 'caos_bootstrap_navwalker::fallback',
                    'walker'            => new caos_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div><!-- /ql_nav_collapse -->
    </div><!-- /col-md-7 -->

    <div class="clearfix"></div>

</header>
<div class="clearfix"></div>

