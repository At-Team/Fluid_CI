<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Fluid ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map Fluid group requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a Group 
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/group(/..)/class/method
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/fluid/routing
|

*/

//give value as directroy path in respect to fluid.. without the leading /

$fluid['adult'] = 'adult';
$fluid['english'] =  'lang/english';
$fluid['engindia'] =  'lang/english/india';