<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * class Resource - sets common paths inside Codeigniter.
 *
 * This library handles the common paths used inside views within
 * a Codeigniter installation.
 *
 * By calling the methods in this library, the filesystem inside a Codeigniter
 * application  can be easily accessed, while maintaining portability.
 * 
 * @author Mario Cuba <mario@mariocuba.net>
 *
 */

class Resource {
	
	function __construct() {
		$ci =& get_instance();
		$ci->load->helper('url');

		// set up folder names inside views
		$this->app 	= 'application' . '/';
		$this->img 	= 'img' . '/';
		$this->js 	= 'js' . '/';
		$this->css 	= 'css' . '/';
		$this->inc 	= 'includes' . '/';
		
		$this->base = base_url();
	}
	
	function view($file = '') {
		return $this->base . $this->app . 'views/' . $file;
	}
		
	function img($file) {
		return $this->view($this->img . $file);
	}
	
	function js($file) {
		return $this->view($this->js . $file);
	}
	
	function css($file) {
		return $this->view($this->css . $file);	
	}
	
	function inc($file) {
		return $this->view($this->inc . $file);
	}
}