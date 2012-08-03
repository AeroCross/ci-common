<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Resource library
*
* Sets common paths inside Codeigniter.
*
* By calling the methods in this library, the filesystem inside a Codeigniter
* application  can be easily accessed, while maintaining portability.
* 
* @package		External Libraries
* @subpackage	Common
* @author		Mario Cuba <mario@mariocuba.net>
*/
class Resource {

	// declare all the variables to use
	private $assets;	// assets folder
	private $img;		// images folder
	private $js;		// javascript folder
	private $css;		// css folder
	private $inc;		// includes folder
	private $base;		// base URL
	
	/**
	* The class constructor.
	*
	* The constructor references the global Codeigniter object so it can be used inside
	* other methods.
	*
	* It also sets the proper varables for the getters.
	*
	* @access	public
	*/
	public function __construct() {
		$ci =& get_instance();
		$ci->load->helper('url');

		// set up folder names inside views
		$this->assets 	= 'assets'	. '/';
		$this->img 		= 'img'		. '/';
		$this->js 		= 'js'		. '/';
		$this->css 		= 'css'		. '/';
		$this->inc 		= 'inc'		. '/';
		
		// set up the URL root of the Codeigniter application
		$this->base = base_url();
	}
	
	/**
	* Returns the abslute URL to the Views folder.
	*
	* @return	string - the absolute URL path to the views folder
	* @access	public
	*/
	public function assets($file = '') {
		return $this->base . APPPATH . 'views/' . $this->assets . $file;
	}
	
	/**
	* Returns the abslute URL to the Images folder.
	*
	* @return	string - the absolute URL path to the images folder
	* @access	public
	*/
	public function img($file) {
		return $this->assets($this->img . $file);
	}

	/**
	* Returns the abslute URL to the JavaScript folder.
	*
	* @return	string - the absolute URL path to the JavaScript folder
	* @access	public
	*/
	public function js($file) {
		return $this->assets($this->js . $file);
	}
	
	/**
	* Returns the abslute URL to the CSS Stylesheets folder.
	*
	* @return	string - the absolute URL path to the CSS Stylesheets folder
	* @access	public
	*/
	public function css($file) {
		return $this->assets($this->css . $file);	
	}
	
	/**
	* Returns the abslute URL to the Includes folder.
	*
	* @return	string - the absolute URL path to the Includes folder
	* @access	public
	*/
	public function inc($file) {
		return $this->assets($this->inc . $file);
	}

}

/* End of file resource.php */
/* Location: ./application/libraries/common/resource.php */