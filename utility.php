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
	 * method sqlToDate($date) - correctly formats a SQL date.
	 *
	 * This method takes a $time with the form of a ISO SQL date (such as 2011-09-07 16:48:59) and turns it into a human-readable standard date.
	 *
	 * @param string[$date] - the date to format. Must be in the format YYYY-MM-DD HH:MM:SS.
	 * @return string - the formatted date.
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	function sqlToDate($date) {
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
	 * method dateToSQL($date) - turns a standard dd/mm/yyyy date to SQL DATE valid string.
	 *
	 * This method simply grabs a $date string in the dd/mm/yyyy format, and reverses it, so it can be inserted into a DATE field in MySQL.
	 *
	 * @param string[$date] - the standard dd/mm/yyyy date.
	 * @return string - the formatted date
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */
	 
	function dateToSQL($date) {
		// divide the date into 3 parts (because there are 3 parts in the date)
		$date = explode('/', $date);
		
		// arrange them, and return the arranged string
		return $date[2] . '/' . $date[1] . '/' . $date[0];
	}

	/*
	 * method imageExists($url) - gets and image from an url and checks if it exists.
	 *
	 * @param string[$url] - a valid URL containing an image.
	 * @return bool - TRUE if the image exists, FALSE otherwise.
	 *
	 * @author Mario Cuba <mario@mariocuba.net>
	 *
	 */

	function imageExists($url) {
		if (@GetImageSize($url)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}