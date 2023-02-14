<?php
/**
 * Plugin Name: WordPress starter plugin with vue3
 * Description: A starter plugin for develop wordPress plugin with Vue3
 * Plugin URI: https://cofixer.com/wo-single-image-popup
 * Author: Siam Maruf
 * Author URI: https://siammaruf.com
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cofixer
 */

if ( ! defined('ABSPATH') ){
	exit;
}

require __DIR__.'/vendor/autoload.php';

use Cofixer\Admin;

/*
 * Main Plugin Class
 */
final class Cofixer_Plugin{
	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class constructor
	 */
	private function __construct(){
		$this->define_constants();
		register_activation_hook(__FILE__,[$this,'activate']);
		add_action('plugins_loaded',[$this, 'init_plugin']);
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @retun  Cofixer_Plugin
	 */
	public static function init(): Cofixer_Plugin|bool
	{
		static $instance = false;
		if ( !$instance ){
			$instance = new self();
		}
		return $instance;
	}

	/**
	 * Define the required plugin constance
	 *
	 * @retun void
	 */
	public function define_constants(): void{
		define('CF_PLUGIN_VERSION', self::version);
		define('CF_PLUGIN_FILE', __FILE__);
		define('CF_PLUGIN_PATH', __DIR__);
		define('CF_PLUGIN_URL', plugins_url('',CF_PLUGIN_FILE));
		define('CF_PLUGIN_ASSETS', CF_PLUGIN_URL.'/assets');
	}

	/**
	 * Initialize the plugin
	 *
	 * @retun void
	 */
	public function init_plugin(): void{
		if (is_admin()){
			new Admin();
		}
	}

	/**
	 * On plugin activation
	 *
	 * @retun void
	 */
	public function activate(): void{

	}
}

/**
 * Initialize the main plugin
 *
 * @retun Cofixer_Plugin
 */

function cofixer_plugin(): Cofixer_Plugin|bool{
	return Cofixer_Plugin::init();
}

//Kick-off the plugin
cofixer_plugin();