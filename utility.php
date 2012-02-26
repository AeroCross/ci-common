<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Utility class
*
* This class contains utility methods that Codeigniter does not come bundled with.
* Stuff like date formatting, string parsing, regexes and rearranging of arrays or objects will come here.
*
* @package		External Libraries
* @subpackage	Common
* @author		Mario Cuba <mario@mariocuba.net>
*/
 
class Utility {
	
	/**
	* Correctly formats an SQL date.
	*
	* This method takes a $time with the form of a ISO SQL date (such as 2011-09-07 16:48:59) and
	* turns it into a human-readable standard date.
	*
	* @param	string[$date] - the date to format. Must be in the format YYYY-MM-DD HH:MM:SS
	* @return	string - the formatted date
	* @access	public
	*/
	public function sqlToDate($date) {
		// set the months and days - localizable
		$month = array(NULL, 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$day = array(NULL, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
		
		// formats the date to be rearranged
		$date = date('N/j/n/Y', strtotime($date));
		$date = explode('/', $date);
		
		// returns the date - this is the final format		
		return $month[$date[2]] . ' ' . $date[1] . ', ' . $date[3];
	}
	
	/**
	* Turns a standard dd/mm/yyyy date to SQL DATE valid string.
	*
	* @param	string[$date] - the standard dd/mm/yyyy date
	* @return	string - the formatted date
	* @access	public
	*/
	public function dateToSQL($date, $delimiter = '/') {
		// divide the date into 3 parts (because there are 3 parts in the date)
		$date = explode($delimiter, $date);
		
		if (count($date) != 3) {
			return FALSE;
		}
		
		// arrange them, and return the arranged string
		return $date[2] . $delimiter . $date[1] . $delimiter . $date[0];
	}

	/**
	* Gets and image from an url and checks if it exists.
	*
	* @param	string[$url] - a valid URL containing an image
	* @return	bool - TRUE if the image exists, FALSE otherwise
	* @access	public
	*/
	public function imageExists($url) {
		if (@GetImageSize($url)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	* Validates a phone number through a regular expression.
	*
	* The regular expression matches a number in the +xxx (xxx) xxx-xxxx format.
	*
	* @param	string[$phone] - a phone number
	* @return	bool - TRUE if $phone matches the regular expression, FALSE otherwise
	* @access	public
	*/
	public function validatePhone($phone) {
		if (preg_match_all('|^\+[0-9]{1,3}\ \([0-9]{2,3}\)\ [0-9]{3}\-[0-9]{4}$|', $phone, $matches) == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	* Checks if a given date is valid.
	*
	* @param	string[$date] - a date
	* @return	bool - TRUE if it's a valid date, FALSE otherwise
	* @access	public
	*/ 
	public function validateDate($date) {
		$date_initial = $date;
		$date = explode('/', $date);
		
		if (count($date) != 3) {
			return FALSE;
		}
		
		if (strlen($date[2]) != 4 OR strlen($date[1]) != 2 OR strlen($date[0]) != 2) {
			return FALSE;
		}
		
		// format should be dd/mm/aaaa
		if (@checkdate($date[1], $date[0], $date[2])) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	* Generates a random string.
	*
	* By default, the generated random string consists only of numbers and letters.
	*
	* @param	int		- the lenght of the resulting string
	* @param	string	- symbols to add to the random string
	* @param	bool	- whether to use or not the default (letters and numbers) string
	* @return	string	- a randomized string
	* @access	public
	*/
	public function generateString($lenght = 10, $symbols = '-_/@!?#$', $defaults = TRUE) {
		$string = '';

		// default, total, and number of characters
		if ($defaults === TRUE) {
			$chars_d = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';	
			$chars_t = $chars_d . $symbols;
		} else {
			$chars_t = $symbols;
		}

		$chars_n = strlen($chars_t);
		 
		for ($x = 0; $x < $lenght; $x++) {
			$rn = mt_rand(0, $chars_n);
			$string = $string . substr($chars_t, $rn-1, 1);
		}

		return $string;
	}
}