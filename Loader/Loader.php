<?php if (!defined('PAGSEGURO_LIBRARY')) { die('No direct script access allowed'); }
/*
************************************************************************
Copyright [2011] [PagSeguro Internet Ltda.]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
************************************************************************
*/

/*
* Library autoloader - spl_autoload_register
*/
class PagSeguro_Loader_Loader {

	public static $loader;
	
	private static $dirs = Array(
		'Config',
		'Resources',
		'Log',
		'Domain',
		'Exception',
		'Parser',
		'Service',
		'Utils',
		'Helper'
	);
	
	private function __construct() {
		if (function_exists('__autoload')) {
			spl_autoload_register('__autoload');
		}
		spl_autoload_register(Array($this, 'addClass'));
	}

	public static function init() {
		if (!function_exists('spl_autoload_register')) {
			throw new Exception("PagSeguro_Library: Standard PHP Library (SPL) is required.");
			return false;
		}
		if (self::$loader == null) {
			self::$loader = new PagSeguro_Loader_Loader();
		}
		return self::$loader;
	}
	
	private function addClass($class) {
		foreach(self::$dirs as $key => $dir) {
			$file = PagSeguro_Library::getPath().DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$class.'.php';
			if (file_exists($file) && is_file($file)) {
				require_once $file;
			}
		}
	}
	
}
?>