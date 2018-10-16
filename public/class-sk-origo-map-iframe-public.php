<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Sk_Origo_Map_Iframe
 * @subpackage Sk_Origo_Map_Iframe/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sk_Origo_Map_Iframe
 * @subpackage Sk_Origo_Map_Iframe/public
 * @author     Daniel Pihlström <daniel.pihlstrom@cybercom.com>
 */
class Sk_Origo_Map_Iframe_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }

    /**
     * Register the shortcode.
     *
     * @author Daniel Pihlström <daniel.pihlstrom@cybercom.com>
     *
     * @return void
     */
    public function add_shortcode() {
        add_shortcode( 'karta', array( $this, 'output' ) );
    }

    /**
     * HTML output for shortcode
     *
     * @author Daniel Pihlström <daniel.pihlstrom@cybercom.com>
     *
     * @param $atts
     * @param $content
     *
     * @return string
     */
    public function output( $atts, $content ) {

        ob_start();

        $a = shortcode_atts( array(
            'url' => false,
            'width' => '100%',
            'height' => '500',
        ), $atts );

        if ( empty( $a['url'] ) ) {
            printf( '<div class="sk-origo-map-error">%s</div>', __( '[Fel vid visning av karta: Url/länk till karta saknas]', 'sk_tivoli' ) );
        } else {
            printf( '<div class="sk-origo-map"><iframe src="%s" width="%s" height="%s" allowfullscreen style="border:0"></div>', $a['url'], $a['width'], $a['height'] );
        }

        return ob_get_clean();

    }

	/**
	 * Call for short code when template page-origomap.php is in use.
	 * 
	 * @author Daniel Pihlström <daniel.pihlstrom@cybercom.com>
	 *
	 * @return void
	 */
    public static function print_map() {
        global $post;
        $url    = get_field( 'sk_origo_map_url', $post->ID );
        $width  = get_field( 'sk_origo_map_width', $post->ID );
        $height = get_field( 'sk_origo_map_height', $post->ID );

        echo do_shortcode( sprintf( '[karta url="%s" width="%s" height="%s"]', $url, $width, $height ) );
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sk-origo-map-iframe-public.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sk-origo-map-iframe-public.js', array( 'jquery' ), $this->version, false );

    }

}
