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

	// declare all the variables to use
	private $app; // application folder
	private $img; // images folder
	private $js; // javascript folder
	private $css; // css folder
	private $inc; // includes folder
	private $base; // base URL
	
	/*
	 * function __construct() - the class construct.
	 *
	 * The constructor references the global Codeigniter object so it can be used inside
	 * other methods.
	 *
	 * It also sets the proper varables for the getters.
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	function __construct() {
		$ci =& get_instance();
		$ci->load->helper('url');

		// set up folder names inside views
		$this->app 	= 'application' . '/';
		$this->img 	= 'img' . '/';
		$this->js 	= 'js' . '/';
		$this->css 	= 'css' . '/';
		$this->inc 	= 'includes' . '/';
		
		// set up the URL root of the Codeigniter application
		$this->base = base_url();
	}
	
	/*
	 * public method view($file) - returns the abslute URL to the Views folder.
	 *
	 * @return string - the absolute URL path to the views folder
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */
	public function view($file = '') {
		return $this->base . $this->app . 'views/' . $file;
	}
	
	/*
	 * public method img($file) - returns the abslute URL to the Images folder.
	 *
	 * @return string - the absolute URL path to the images folder
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	public function img($file) {
		return $this->view($this->img . $file);
	}

	/*
	 * public method js($file) - returns the abslute URL to the JavaScript folder.
	 *
	 * @return string - the absolute URL path to the JavaScript folder
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	public function js($file) {
		return $this->view($this->js . $file);
	}
	
	/*
	 * public method css($file) - returns the abslute URL to the CSS Stylesheets folder.
	 *
	 * @return string - the absolute URL path to the CSS Stylesheets folder
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	public function css($file) {
		return $this->view($this->css . $file);	
	}
	
	/*
	 * public method inc($file) - returns the abslute URL to the Includes folder.
	 *
	 * @return string - the absolute URL path to the Includes folder
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	public function inc($file) {
		return $this->view($this->inc . $file);
	}
}