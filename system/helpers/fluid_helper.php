<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Fluid
 *
 *
 *
 * @package		Fluid
 * @author		Fluid creator
 * @copyright	Copyright (c) 20013 , @Team.
 * @license
 * @link
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Fluid System Helper
 *
 * @package		Fluid
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Copyright
 * @link
 */

// ------------------------------------------------------------------------

/**
 * Creates a link to load the appropiate css
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('fluid_load_js'))
{
	function fluid_load_js($filename = '',$self)
	{
		if ($filename == '') return '';

		$base_base = explode('/', BASEPATH ) ;
		//pop twice to get to base path
		array_pop($base_base);
		array_pop($base_base);

		$user_group_path = explode('/',$self->fluid->get_user_group());
		array_pop($user_group_path);

		$base = array_merge($base_base,$user_group_path);

		$file = false ;

		//search untill parent path untill the file is found..
		//concept of inheritence..
		//if an js or css library is not found in this group
		//search in parent to get hold of it..
		//if not found just print an error to usre saying
		//not found

		while(array_count_values($base) >=  array_count_values($base_base) ){

			if (!file_exists( implode('/', $base) . '/' . $filename . '.js')){
					array_pop($base);
					array_pop($user_group_path);
			}else{
				$file = true ;
				break;
			}

		}//while

		//show_error(implode(' ** ', $_SERVER));

		if ($file){
			return '<script type="text/javascript" src="http://'. SITE_URL . implode('/', $user_group_path) . '/' . $filename . '.js"> </script>' ;
		}else{
			return '<!-- ' . $filename . '.js was not found in the group \'' . $self->fluid->get_user_group() . '\' nor in the inheritence tree. Please check its existence-->';
		}

	}
}

// ------------------------------------------------------------------------

/**
 * Base URL
 *
 * Create a local URL based on your basepath.
 * Segments can be passed in as a string or an array, same as site_url
 * or a URL to a file can be passed in, e.g. to an image file.
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('base_url'))
{
	function base_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->base_url($uri);
	}
}

?>