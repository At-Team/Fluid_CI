<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// *
//  * CodeIgniter
//  *
//  * An open source application development framework for PHP 5.1.6 or newer
//  *
//  * @package		CodeIgniter
//  * @author		ExpressionEngine Dev Team
//  * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
//  * @license		http://codeigniter.com/user_guide/license.html
//  * @link		http://codeigniter.com
//  * @since		Version 1.0
//  * @filesource
 

// // ------------------------------------------------------------------------

// /**
//  * Router Class
//  *
//  * Parses URIs and determines routing
//  *
//  * @package		CodeIgniter
//  * @subpackage	Libraries
//  * @author		ExpressionEngine Dev Team
//  * @category	Libraries
//  * @link		http://codeigniter.com/user_guide/general/routing.html
//  */
class CI_Fluid {


	public $fluid_Enabled ;

	public $usergroup ;

	public $keyword ;

	/**
	 * Constructor
	 *
	 * 
	 */
	function __construct()
	{
		 $this->fluid_Enabled = false;

		 $this->usergroup ="";

		 $this->keyword ="fluid";
	}

	// return the fluid keyword
	function get_fluid_keyword(){
		return $this->keyword;
	}

	// enable me..
	function enable_fluid(){
		 $this->fluid_Enabled = true;
		 return true;
	}

	// return true or false 
	function is_fluid_enabled(){
		return $this->fluid_Enabled;
	}


	//set the user group
	function set_user_group($group){
		$this->usergroup = $group;
		return true;
	}

	//sets the default user group
	function set_default_user_group(){
		$this->usergroup = "";
		return true;
	}


	//get the user group
	function get_user_group(){
		return $this->usergroup;
	}

}
// END Router Class

/* End of file Router.php */
/* Location: ./system/core/Router.php */