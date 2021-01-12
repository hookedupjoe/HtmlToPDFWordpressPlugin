<?php
/*
Plugin Name: HTMLtoPDF
Plugin URI: http://www.hookedup.com/spipu
Version: 1.0.1
Author: Hookedup, inc. port of library from spipu
Author URI: https://github.com/spipu/html2pdf

** The Adding Admin Templates process is based on PageTemplater by wpexplorer.com
*/

/* package: HTMLtoPDF */

class PluginHTMLtoPDF {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	//--- Update this if the forms update and need cache busting
	public static function form_version(){
		return "010101";
	}

	/**
	 * Runs when plugin is activated
	 */
	public static function activation_hook() {
		self::init();
		flush_rewrite_rules(); 
		
	}
	/**
	 * Init it
	 */
	public static function init() {
		
	}

	
	/**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new PluginHTMLtoPDF();
		}

		return self::$instance;
	}

}

if ( !defined( 'HTML_TO_PDF_PLUGIN_DIR' ) ) {
	define( 'HTML_TO_PDF_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( !defined( 'HTML_TO_PDF_SRC_DIR' ) ) {
	define( 'HTML_TO_PDF_SRC_DIR', HTML_TO_PDF_PLUGIN_DIR . '/src');
}

register_activation_hook( __FILE__, array( 'PluginHTMLtoPDF', 'activation_hook' ) );

add_action( 'plugins_loaded', array( 'PluginHTMLtoPDF', 'get_instance' ) );
add_action( 'init', array( 'PluginHTMLtoPDF', 'init' ) );
