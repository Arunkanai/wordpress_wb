<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function travel_explorer_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'travel-explorer', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'travel_explorer_theme_setup', 100 );

function travel_explorer_styles() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style( 'travel-monster-style', get_template_directory_uri()  . '/style.css' );
    wp_enqueue_style( 'travel-explorer', get_stylesheet_directory_uri() . '/style.css', array( 'travel-monster-style' ), $version );

}
add_action( 'wp_enqueue_scripts', 'travel_explorer_styles', 20 );

function travel_explorer_customizer_register( $wp_customize ) {

     /** Phone Label */
    $wp_customize->add_setting(
        'tmp_phone_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        new Travel_Monster_Text_Control( 
            $wp_customize,
            'tmp_phone_label',
            array(
                'section'  => 'layout_header',
                'priority' => 7,
                'label'    => __( 'Phone Label', 'travel-explorer' ),
                'group'    => 'main_header_contact_information_group',
            )
        )
    );

    $wp_customize->add_setting(
        'header_trip_advisor_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'travel_monster_sanitize_image'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control (
            $wp_customize,
            'header_trip_advisor_image',
            array(
                'label'       => __( 'Trip Advisor Image', 'travel-explorer' ),
                'description' => __( 'Recommended image size is 350px by 135px.', 'travel-explorer' ),
                'section'     => 'layout_header',
                'priority'    => 12,
            )
        )
    );

    $wp_customize->add_setting(
        'header_contact_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'travel_monster_sanitize_image',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control (
            $wp_customize,
            'header_contact_image',
            array(
                'label'       => __( 'Contact Image', 'travel-explorer' ),
                'description' => __( 'Recommended image size is 50px by 50px.', 'travel-explorer' ),
                'section'     => 'layout_header',
                'priority'    => 12,
            )
        )
    );
}
add_action( 'customize_register', 'travel_explorer_customizer_register', 40 );

/**
 * Header Phone Label
*/
function travel_monster_header_phone_label(){
    $phone_label = get_theme_mod( 'tmp_phone_label');
    if( $phone_label ) echo '<div class="contact-phone-label">' . esc_html( $phone_label ) . '</div>';
}

function travel_monster_has_contact_image() {
    $header_layout = get_theme_mod('header_layout', 'one');
    $my_theme      = wp_get_theme();
    $name          = $my_theme['Name'];
    if ($name === 'Travel Explorer') return true;
    return ($header_layout === 'two' || $header_layout === 'three' || $header_layout === 'four' || $header_layout === 'six') ? true : false;
}

function travel_monster_get_typography_defaults(){
    $defaults = array(
        
        'primary_font' => array(
            'family'         => 'Roboto Flex',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.75,
                'letter_spacing' => 0,
            )
        ),
        'site_title' => array(
            'family'    => 'Bestigia',
            'variants'  => '',
            'category'  => '',
            'weight'    => 'bold',
            'transform' => 'none',
            'desktop' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0
            ),
            'tablet' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'button' => array(
            'family'         => 'Default Family',
            'variants'       => '',
            'category'       => '',
            'weight'         => '400',
            'transform'      => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_one' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 40,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 40,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 36,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            )
        ),
        'heading_two' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 32,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 32,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 30,
                'line_height'    => 1.3,
                'letter_spacing' => 0,
            )
        ),
        'heading_three' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 28,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 26,
                'line_height'    => 1.4,
                'letter_spacing' => 0,
            )
        ),
        'heading_four' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 24,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 24,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 22,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_five' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 20,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 20,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 18,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        ),
        'heading_six' => array(
            'family'      => 'Libre Caslon Text',
            'variants'    => '',
            'category'    => '',
            'weight'      => '700',
            'transform'   => 'none',
            'desktop' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'tablet' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            ),
            'mobile' => array(
                'font_size'      => 16,
                'line_height'    => 1.5,
                'letter_spacing' => 0,
            )
        )
    );

    return apply_filters( 'travel_monster_typography_options_defaults', $defaults ); 
}

function travel_monster_get_color_defaults(){
    $defaults = array(
        'primary_color'                     => '#1B5E59',
        'secondary_color'                   => '#FEE25A',
        'body_font_color'                   => '#494d41',
        'heading_color'                     => '#232323',
        'section_bg_color'                  => 'rgba(40, 181, 164, 0.05)',
        'site_bg_color'                     => '#FFFFFF',
        'site_title_color'                  => '#232323',
        'site_tagline_color'                => '#232323',
        'header_btn_text_color'             => '#ffffff',
        'header_btn_text_hover_color'       => '#ffffff',
        'header_btn_bg_color'               => '#FEE25A',
        'header_btn_bg_hover_color'         => 'rgba(27, 94, 89, 1)',
        'btn_text_color_initial'            => '#ffffff',
        'btn_text_color_hover'              => '#ffffff',
        'btn_bg_color_initial'              => '#FEE25A',
        'btn_bg_color_hover'                => '#1B5E59',
        'btn_border_color_initial'          => '#FEE25A',
        'btn_border_color_hover'            => '#1B5E59',
        'notification_bg_color'             => '#1B5E59',
        'notification_text_color'           => '#ffffff',
        'upper_footer_bg_color'             => '#26786e',
        'upper_footer_text_color'           => '#ffffff',
        'upper_footer_link_hover_color'     => 'rgba(255, 255, 255, 0.8)',
        'upper_footer_widget_heading_color' => '#ffffff',
        'bottom_footer_bg_color'            => '#26786e',
        'bottom_footer_text_color'          => '#ffffff',
        'bottom_footer_link_initial_color'  => '#ffffff',
        'bottom_footer_link_hover_color'    => 'rgba(255, 255, 255, 0.8)',
        'theme_white_color'                 => '#ffffff',
        'theme_black_color'                 => '#000000',
        'top_header_bg_color'               => '#1B5E59',
        'top_header_text_color'             => '#ffffff',
    );

    return apply_filters( 'travel_monster_color_options_defaults', $defaults );
}

function travel_monster_footer_bottom(){ ?>
    <div class="footer-b">
        <div class="container">             
            <div class="footer-b-wrap">
                <div class="site-info">
                    <div class="footer-cop">
                        <?php 
                            travel_monster_get_footer_copyright();
                            if( travel_monster_pro_is_activated() ){
                                $partials = new Travel_Monster_Pro_Partials;
                                $partials->travel_monster_pro_ed_author_link();
                                $partials->travel_monster_pro_ed_wp_link();
                            } else {
                                echo '<span class="author-link">'.
                                __( ' Travel Explorer by ', 'travel-explorer' ) .'
                                <a href="' . esc_url( 'https://wptravelengine.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'WP Travel Engine', 'travel-explorer' ) . '.</a></span>';
                                printf( esc_html__( '%1$s Powered by %2$s%3$s', 'travel-explorer' ), '<span class="wp-link">', '<a href="'. esc_url( 'https://wordpress.org/', 'travel-monster' ) .'" rel="nofollow" target="_blank">WordPress</a>.', '</span>' );
                            }
                        ?> 
                    </div>
                    <?php if( has_nav_menu( 'footer' ) || current_user_can( 'manage_options' ) || function_exists( 'the_privacy_policy_link' ) ){ ?>
                        <nav class="footer-inf">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'menu_class'     => 'footer_menu',
                                    'fallback_cb'    => false,
                                ) );
                                if ( function_exists( 'the_privacy_policy_link' ) ) {
                                    the_privacy_policy_link();
                                }
                            ?>
                        </nav><!-- Footer Privacy -->
                    <?php }
                    ?>
                </div>
            </div>   
            <?php if( function_exists('travel_monster_footer_payments') ) travel_monster_footer_payments(); ?>        
        </div>
    </div>			            
    <?php	
}

/**
 * Demo Importer filter
 */
function travel_monster_demo_importer_checked() {
    if ( function_exists('DEMO_IMPORTER_PLUS_setup') ) {
        add_filter(
            'demo_importer_plus_api_id',
            function () {
                return  array( '81','73','428','65','183','182', '377', '418' );
            }
        );
    }
}