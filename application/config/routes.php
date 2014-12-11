<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";

/*$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
*/

$route['default_controller'] = 'pages/index';
$route['step1'] = "pages/create_layout_step_1";
$route['step2'] = "pages/create_layout_step_2";
$route['step3'] = "pages/create_layout_step_3";
$route['step4'] = "pages/create_layout_step_4";
$route['step5'] = "pages/create_layout_step_5";
$route['step6'] = "pages/create_layout_step_6";

//$route['(:any)'] = 'pages/create_layout/';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */