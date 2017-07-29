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
// home
$route['default_controller'] = 'home/index';
$route['home/faculty'] = 'home/faculty';
$route['home/branch'] = 'home/branch';

// course
$route['course/registration'] = 'course/registration';
$route['course/register'] = 'course/register';
$route['course/(:any)'] = 'course/info/$1';

//admin
$route['admin/index'] = 'admin/index';
$route['admin/asd'] = 'admin/asd';

//admin api
$route['admin/api/getDegree'] = 'admin/getDegree';
$route['admin/api/addDegree'] = 'admin/addDegree';
$route['admin/api/updateDegree'] = 'admin/updateDegree';
$route['admin/api/deleteDegree'] = 'admin/deleteDegree';

$route['admin/api/getFaculty'] = 'admin/getFaculty';
$route['admin/api/addFaculty'] = 'admin/addFaculty';
$route['admin/api/updateFaculty'] = 'admin/updateFaculty';
$route['admin/api/deleteFaculty'] = 'admin/deleteFaculty';

$route['admin/api/getBranch'] = 'admin/getBranch';

$route['assets/(:any)'] = 'assets/$1';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */