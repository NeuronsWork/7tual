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

$route['default_controller'] = "noise";
$route['404_override'] = '';

// routers de web
$route['publico.html'] = "web/publico";
$route['general'] = "web/general";
$route['empresas'] = "web/empresas";
$route['equipo'] = "web/equipo";
$route['contactanos'] = "web/contactanos";
$route['reportar/(:any)'] = "web/reportar/$1";
$route['terminos-uso'] = "web/terminos";
$route['faqs'] = "web/faq";
$route['ideas-eventos'] = "web/idea";
$route['carteles'] = "web/carteles";

// ROUTE BUSCADORES
$route['search/(:any)/(:any)'] = "noise/search/$1/$2";
// ROUTE CATEGORIAS
$route['categoria/(:any)'] = "noise/category/$1";
$route['category/(:any)/(:any)'] = "noise/category_noise/$1/$2";
// ROUTE VERIFICACION DE CUENTA
$route['verification/(:any)/(:any)'] = "web/verification_activation/$1/$2";
// ROUTE ENLACES WEB
$route['ideas'] = "noise";
$route['idea/(:any)'] = "noise/view_noise/$1";

$route['mi-cuenta'] = "web/account";
$route['eliminar_cuenta/(:any)'] = "web/delete_account/$1";

$route['ideas/recientes'] = "noise/recents_view";
$route['ideas/favoritos'] = "noise/favorites_view";
$route['ideas/mas-votados']= "noise/plus_notion_view";

$route['evento/(:any)'] = "web/view_event/$1";
$route['logout'] = "web/logout";

/* End of file routes.php */
/* Location: ./application/config/routes.php */