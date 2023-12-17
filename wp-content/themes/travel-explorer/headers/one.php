<?php
/**
 * Header Layout One
 * 
 * @package Travel Explorer
*/
$defaults           = travel_monster_get_general_defaults();
$trip_advisor_image = get_theme_mod( 'header_trip_advisor_image');
$vip_image          = get_theme_mod( 'header_contact_image');
$header_width       = get_theme_mod( 'header_width_layout', $defaults['header_width_layout']);
$add_class          = 'fullwidth' === $header_width ? 'container-full' : 'container';
$vip_img_id         = attachment_url_to_postid( $vip_image );
$trip_img_id        = attachment_url_to_postid( $trip_advisor_image );

/**
 * Mobile Header
 */
if( function_exists('travel_monster_mobile_header') ) travel_monster_mobile_header();
/**
 * Desktop Header
 */
?>
<header id="masthead" class="site-header header-layout-2" <?php if( function_exists('travel_monster_microdata') ) travel_monster_microdata( 'header' ); ?>>
    <div class="header-m">
        <div class="<?php echo esc_attr($add_class); ?>">
            <div class="header-m-lft-wrap">
                <?php if( function_exists('travel_monster_site_branding') ) travel_monster_site_branding( false ); ?>
            </div>
            <div class="header-m-mid-wrap">
                <?php if( $trip_advisor_image ){       
                    echo wp_get_attachment_image( $trip_img_id, 'full' );
                } ?>
            </div>
            <div class="header-m-rght-wrap">
                <div class="vib-whats">
                    <div class="vib-whats-txt">
                        <?php
                            if( function_exists('travel_monster_header_phone_label') ) travel_monster_header_phone_label();               
                            if( function_exists('travel_monster_header_phone') ) travel_monster_header_phone();
                        ?>
                    </div>
                    <?php if( $vip_image ){
                        ?>
                        <div class="vib-whats-dp">
                            <?php echo wp_get_attachment_image( $vip_img_id, 'full' ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header-b">
        <div class="<?php echo esc_attr($add_class); ?>">
            <div class="navigation-wrap">
                <?php if( function_exists('travel_monster_primary_navigation') ) travel_monster_primary_navigation(); ?>
                <?php if( function_exists('travel_monster_primary_header_button') ) travel_monster_primary_header_button(); ?>
            </div>
        </div><!-- container -->
    </div> <!-- header-b -->
    <?php if( function_exists('travel_monster_sticky_header') ) travel_monster_sticky_header(); ?>
    
</header><!-- #masthead -->