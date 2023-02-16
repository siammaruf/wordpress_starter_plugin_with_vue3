<?php

namespace Cofixer\Admin;

class Assets{
	public function __construct(){
		add_action("admin_enqueue_scripts",[$this,'register_all_scripts']);
	}

	/**
	 * Register Scripts and Styles
	 * @return void
	 */
	public function register_all_scripts(): void{
		$scripts = $this->register_scripts();
		$styles = $this->register_styles();

		new \Cofixer\Assets($scripts,$styles);
	}

	public function register_scripts(): array{
		return [
			'cf-manifest' => [
				'src'       => CF_PLUGIN_URL . '/assets/js/manifest.js',
				'deps'      => [],
				'version'   => \filemtime( CF_PLUGIN_PATH . '/assets/js/manifest.js' ),
				'in_footer' => true
			],
			'cf-vendor' => [
				'src'       => CF_PLUGIN_URL . '/assets/js/vendor.js',
				'deps'      => [ 'cf-manifest' ],
				'version'   => \filemtime( CF_PLUGIN_PATH . '/assets/js/vendor.js' ),
				'in_footer' => true
			],
			'cf-admin' => [
				'src'       => CF_PLUGIN_URL . '/assets/js/admin.js',
				'deps'      => [ 'cf-vendor' ],
				'version'   => \filemtime( CF_PLUGIN_PATH . '/assets/js/admin.js' ),
				'in_footer' => true,
				'localize'  => [
					'adminUrl'  => admin_url( '/' ),
					'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
					'apiUrl'    => home_url( '/wp-json' ),
					'apiNonce'     => wp_create_nonce('wp_rest'),
				]
			],
		];
	}

	public function register_styles(): array{
		return [
			'cf-style' => [
				'src' => CF_PLUGIN_URL . '/assets/css/style.css'
			],
			'cf-admin' => [
				'src' => CF_PLUGIN_URL . '/assets/css/admin.css'
			],
		];
	}
}