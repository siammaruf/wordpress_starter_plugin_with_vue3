<?php

namespace Cofixer;

class Assets{
	/**
	 * Initialize the class
	 */
	public function __construct($scripts, $styles){
		$this->register_scripts($scripts);
		$this->register_style($styles);
	}

	/**
	 * Register Scripts
	 * @param $scripts
	 * @return void
	 */
	public function register_scripts($scripts): void{
		foreach ($scripts as $handler => $script){
			$deps = $script['deps'] ?? false;
			$in_footer = $script['in_footer'] ?? false;
			$version = $script['version'] ?? false;

			wp_enqueue_script( $handler, $script['src'], $deps, $version, $in_footer );
			if ($script['localize']){
				wp_localize_script($handler,str_replace("-", "", $handler).'Obj',$script['localize']);
			}
		}
	}

	/**
	 * Register Styles
	 * @param $styles
	 * @return void
	 */
	public function register_style($styles): void{
		foreach ($styles as $handler => $style){
			$deps = $script['deps'] ?? false;

			wp_enqueue_style( $handler, $style['src'], $deps, CF_PLUGIN_VERSION );
		}
	}
}