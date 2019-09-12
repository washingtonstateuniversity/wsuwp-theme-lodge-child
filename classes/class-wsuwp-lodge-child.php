<?php
/**
 * Class for theme setup
 *
 * @class WSU_WP_Lodge
 */
final class WSU_WP_Lodge
{
	/**
	 * Enqueues scripts and styles.
	 *
	 * @return void
	 */
	static public function enqueue_scripts()
	{
		wp_enqueue_style( 'wsuwp-lodge-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css') );

		wp_enqueue_style( 'wsuwp-lodge-webpack-styles', get_stylesheet_directory_uri() . '/assets/dist/main.css', array(), filemtime(get_template_directory() . '/assets/dist/main.css') );

		wp_enqueue_script( 'wsuwp-lodge-scripts', get_stylesheet_directory_uri() . '/assets/dist/scripts.js', array(), filemtime(get_template_directory() . '/assets/dist/scripts.js'), true );

		$whitelist = array( '127.0.0.1', '::1', '192.168.50.*' );
		$ip = $_SERVER['REMOTE_ADDR'];

		foreach($whitelist as $i){
			$wildcardPos = strpos($i, "*");

			if ( $wildcardPos !== false && substr($ip, 0, $wildcardPos) . "*" == $i ) {
				wp_enqueue_script( 'wsuwp-lodge-livereload', 'http://localhost:35729/livereload.js');
			}
		}
	}
}