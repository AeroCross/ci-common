<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * class Utility - common utility methods to be uses site-wide.
 *
 * This class contains utility methods that Codeigniter does not come bundled with. 
 * Stuff like date formatting, string parsing, regexes and rearranging of arrays or objects will come here.
 *
 * @author Mario Cuba <mario@mariocuba.net>
 *
 */
 
class Utility {
	
	/*
	 * public method sqlToDate($date) - correctly formats a SQL date.
	 *
	 * This method takes a $time with the form of a ISO SQL date (such as 2011-09-07 16:48:59) and turns it into a human-readable standard date.
	 *
	 * @param string[$date] - the date to format. Must be in the format YYYY-MM-DD HH:MM:SS
	 * @return string - the formatted date
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
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
	
	/*
	 * public method dateToSQL($date) - turns a standard dd/mm/yyyy date to SQL DATE valid string.
	 *
	 * This method simply grabs a $date string in the dd/mm/yyyy format, and reverses it, so it can be inserted into a DATE field in MySQL.
	 *
	 * @param string[$date] - the standard dd/mm/yyyy date
	 * @return string - the formatted date
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */
	 
	public function dateToSQL($date) {
		// divide the date into 3 parts (because there are 3 parts in the date)
		$date = explode('/', $date);
		
		// arrange them, and return the arranged string
		return $date[2] . '/' . $date[1] . '/' . $date[0];
	}

	/*
	 * public method imageExists($url) - gets and image from an url and checks if it exists.
	 *
	 * @param string[$url] - a valid URL containing an image
	 * @return bool - TRUE if the image exists, FALSE otherwise
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
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
	* The format should be dd/mm/aaaa.
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
}