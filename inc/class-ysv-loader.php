<?php
/**
 * YSV Loader.
 *
 * @package YoutubeStickyVideo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Youtube sticky video register block and rander callback.
 *
 * @since 1.0.0
 *
 * @return void
 */
class YSV_Loader {

    /**
	 * Add actions.
	 */
    public function __construct(){
        add_action( 'init', array($this,'create_block_youtube_customize_sticky_video_block_init') );
        add_action( 'enqueue_block_assets', array($this,'ysv_block_scripts'), 10 );
	}

    /**
	 * Youtube sticky video register block.
     *
     * @since 1.0.0
     *
     * @return void
	 */
    function create_block_youtube_customize_sticky_video_block_init() {
        
        wp_register_style(
            'ysv-style-css',
            plugin_dir_url(__FILE__).'assets/css/main.css',
            is_admin() ? array('wp-editor') : null,
            null
        );
    
        wp_register_script(
            'ysv-jquery-js',
            'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
            is_admin() ? array('wp-editor') : null,
            null,
            false
        );
    
        register_block_type( 
            plugin_dir_path(__DIR__).'/build',
            array(
                'style'           => 'ysv-style-css',
                'script'          => 'ysv-jquery-js',
                'render_callback' => array( $this,'ysv_render_callback' ),
                'attributes'      => array(
                    'video_id'        => array(
                        'type'    => 'string',
                        'default' => 'XvEG9XWD4JI',
                    ),
                    'video_possion'        => array(
                        'type'    => 'string',
                        'default' => 'br',
                    ),
                    'bottom'        => array(
                        'type'    => 'number',
                        'default' => '10',
                    ),
                    'top'        => array(
                        'type'    => 'number',
                        'default' => '10',
                    ),
                    'right'        => array(
                        'type'    => 'number',
                        'default' => '10',
                    ),
                    'left'        => array(
                        'type'    => 'number',
                        'default' => '10',
                    ),
                ),
            )
        );
    }
    
     /**
	 * Youtube sticky video enqueue script
     * 
     * @since 1.0.0
     *
     * @return void
	 */
    function ysv_block_scripts() {
        $data = get_option( 'ysv_attributes' );
        wp_enqueue_script(
            'main-js',
            plugins_url( '/assets/js/main.js', __FILE__ ),
            [],
        );
        wp_localize_script( 'main-js', 'ysvObj',
            array( 
                'data' => $data,
            )
        );
    }
    
    /**
	 * Youtube sticky video callback function for display youtube video and on scroll effect.
     *
     * @since 1.0.0
     *
     * @return void
	 */
    function ysv_render_callback( $attributes ) {
        update_option( 'ysv_attributes', $attributes );
        ob_start();
        ?>
            <div class="video-wrap">
                <div class="video">
                    <!-- <img class="btn_close up" src="<?php //echo esc_url( plugins_url( '/assets/images/close-button.png', __FILE__ ) ) ?>" /> -->
                    <iframe src="https://www.youtube.com/embed/<?php esc_attr_e( $attributes['video_id'] ); ?>" ></iframe>
                    <!-- <img class="btn_close down" src="<?php //echo esc_url( plugins_url( '/assets/images/close-button.png', __FILE__ ) ) ?>" /> -->
                </div>
            </div>
        <?php
        return ob_get_clean();
    }

}

if( class_exists( 'YSV_Loader' ) ){
	$ysv_class = new YSV_Loader();
}