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

	public $cookie_name;

//	public $RTR;

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

		 $this->cookie_name ="fluid_group";


		 if (isset($_COOKIE[$this->cookie_name])   ){

		 	if ($_COOKIE[$this->cookie_name] == "") return true;

		 	$this->enable_fluid();
		 	$this->set_user_group($_COOKIE[$this->cookie_name]);
		 }

	}

	// return the fluid keyword
	function get_fluid_keyword(){
		return $this->keyword;
	}

	//reset and disable the fluid.. 
	//removes any custome user group applied

	function disable_fluid(){
		setcookie($this->cookie_name, '', (time() - 3600 ) , '/' );  /*delete cookie*/
		$this->fluid_Enabled = false;

		return true;
	}
	// enable me..
	function enable_fluid(){

		if ($this->fluid_Enabled){
	 	    if (isset($_COOKIE[$this->cookie_name]) &&  $_COOKIE[$this->cookie_name] == $this->get_user_group() ){
			 	return true;
			}
		}

		$this->fluid_Enabled = true;

		//set default user group as fallback
		//$this->set_default_user_group();

		return true;
	}

	// return true or false 
	function is_fluid_enabled(){
		return $this->fluid_Enabled;
	}


	//set the user group
	function set_user_group($group){

		if ($group == 'reset') {
			$this->disable_fluid();
			return true;
		}

		$this->usergroup = 'fluid/' . $group . '/';

		setcookie($this->cookie_name, $group, (time() + (20 * 365 * 24 * 60 * 60) ) ,'/');  /*expire after 20yrs if your still alive cookie :P :P*/
		
		//set the controller directory
		
		//$this->set_controller_directory($this->usergroup);

		return true;
	}

	function set_ci_customization(){
		

		if ($this->is_fluid_enabled() == false) return false;
		$this->set_controller_directory($this->usergroup);
	}

	//sets the default user group
	function set_default_user_group(){
		$this->usergroup = "";

		setcookie($this->cookie_name, '', (time() + (20 * 365 * 24 * 60 * 60)  ), '/' );  /*expire after 20yrs if your still alive cookie :P :P*/
		//set the controller directory
	//		$this->set_controller_directory('');

		return true;
	}


	function set_controller_directory($dir){

		$this->RTR =& load_class('Router', 'core');		
		
		//set the subdirectory if the usergroup is mentioned
		$this->RTR->set_directory($dir);

	}
	//get the user group
	function get_user_group(){
		return $this->usergroup;
	}

}
// END Router Class

/* End of file Router.php */
/* Location: ./system/core/Router.php */