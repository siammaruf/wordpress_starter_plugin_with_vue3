<?php

namespace Cofixer\Admin;

class Menu{

	/**
	 * Initialize the class
	 */
	function __construct(){
		add_action('admin_menu',[$this,'admin_menu']);
	}

	/**
	 * Register menu Page
	 * @return void
	 */
	public function admin_menu(): void{
		global $submenu;

		$capability = "manage_options";
		$slug       = "cf-vue-kickstart";

		$hook = add_menu_page(
			__("Woo Image Popup","cofixer"),
			__("Woo Image Popup","cofixer"),
			$capability,
			$slug,
			[ $this, "menu_page_template" ],
			'dashicons-buddicons-replies'
		);

		if (current_user_can($capability)){
			$submenu[ $slug ][] = [ __("Popups","cofixer"), $capability, "admin.php?page=". $slug ."#/" ];
			$submenu[ $slug ][] = [ __("Settings","cofixer"), $capability, "admin.php?page=". $slug ."#/settings" ];
			$submenu[ $slug ][] = [ __("About","cofixer"), $capability, "admin.php?page=". $slug ."#/about" ];
		}
	}

	/**
	 * Render Main Page
	 * @return void
	 */
	public function menu_page_template(): void{
		echo "<div class='wrap'><div id='cf-admin-app'></div></div>";
	}
}