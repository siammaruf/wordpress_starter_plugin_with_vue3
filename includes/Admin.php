<?php
namespace Cofixer;

use Cofixer\Admin\Menu;
use Cofixer\Admin\Assets;

/**
 * The admin class
 */
class Admin{
	/**
	 * Initialize the class
	 */
	public function __construct(){
		new Menu();
		new Assets();
	}
}