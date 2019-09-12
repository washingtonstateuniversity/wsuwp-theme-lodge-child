<?php
/**
 * Class for theme setup
 *
 * @class WSU_WP_Lodge_Child
 */
final class WSU_WP_Lodge_Child
{
	/**
	 * Enqueues scripts and styles.
	 *
	 * @return void
	 */
	static public function enqueue_scripts()
	{

		wp_enqueue_style( 'wsuwp-lodge-child-webpack-styles', get_stylesheet_directory_uri() . '/assets/dist/child-main.css', array('wsuwp-lodge-basic-styles', 'wsuwp-lodge-webpack-styles'), filemtime(get_stylesheet_directory() . '/assets/dist/child-main.css') );

		wp_enqueue_script( 'wsuwp-lodge-child-scripts', get_stylesheet_directory_uri() . '/assets/dist/child-scripts.js', array(), filemtime(get_stylesheet_directory() . '/assets/dist/child-scripts.js'), true );

		$whitelist = array( '127.0.0.1', '::1', '192.168.50.*' );
		$ip = $_SERVER['REMOTE_ADDR'];

		foreach($whitelist as $i){
			$wildcardPos = strpos($i, "*");

			if ( $wildcardPos !== false && substr($ip, 0, $wildcardPos) . "*" == $i ) {
				wp_enqueue_script( 'wsuwp-lodge-child-livereload', 'http://localhost:35729/livereload.js');
			}
		}
	}
}
