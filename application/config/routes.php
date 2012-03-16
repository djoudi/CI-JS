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


/**
 * Custom Routes
 *
 * The routes setup below are not necessary if we do not allow for any non-controller urls.
 * since we will allow static pages without needing "page/" to trigger the controller, we need
 * to tip off CI about the rest of our controllers here.
 *
 * Routes just allow us more granular control, though obviously they require an extra step of messing.
 *
 */

// route all hello to the hello controller
$route['hello/(:any)'] = 'hello/$1';
$route['hello'] = 'hello';

// route all news to the news controller
// method, not a slug. therefore has to exist here
$route['news/create'] = 'news/create';

$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';


$route['users/(:any)'] = 'users/$1';
$route['users'] = 'users';

$route['microposts/(:any)'] = 'microposts/$1';
$route['microposts'] = 'microposts';

$route['comments/(:any)'] = 'comments/$1';
$route['comments'] = 'comments';

$route['todos/(:any)'] = 'todos/$1';
$route['todos'] = 'todos';

$route['goals/(:any)'] = 'goals/$1';
$route['goals'] = 'goals';

// route the welcome controller
// basic welcome controller
$route['welcome'] = 'welcome';

// the pages controller... this is the key element
// wildcard
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'users';


//$route['default_controller'] = "welcome";
$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */