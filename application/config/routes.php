<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	domain/auth/login	-> users/login
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'users';
$route['register'] = 'users/registration';
$route['loginpopup'] = 'users/postlogin';

$route['logout'] = 'dashboard/logout';
$route['dashboard'] = 'dashboard';
$route['profile'] = 'dashboard/myProfile';
$route['change-password'] = 'dashboard/changePassword';
$route['booking/hotel/(:num)'] = 'dashboard/viewbooking/$1';
$route['booking/transport/(:num)'] = 'dashboard/viewtravel/$1';

$route['destination'] = 'home/destination/$1';
$route['destination/(:any)'] = 'home/destination/$1';

$route['hotel/(:num)'] = 'hotel';
$route['hotel/lists/(:num)'] = "hotel/lists/$1";
$route['hotel/details/(:num)'] = "hotel/details/$1";
$route['hotel/detailspayment/(:num)'] = "hotel/detailspayment/$1";
$route['hotel/confirm']['post'] = "hotel/confirm";
$route['hotel/store']['post'] = "hotel/store";
$route['hotel/buy/(:num)'] = "hotel/buy/$1";
$route['hotel/view/(:num)'] = "hotel/view/$1";
$route['hotel/ewallet/(:num)/(:num)'] = "hotel/ewallet/$1/$2";
$route['hotel/pdf/(:num)'] = "hotel/pdf/$1";

$route['flight'] = 'flight';
$route['flight/(:num)'] = 'flight/bytype/$1';
$route['flight/lists/(:num)'] = "flight/lists/$1";
$route['flight/details/(:num)'] = "flight/details/$1";
$route['flight/detailspayment/(:num)'] = "flight/detailspayment/$1";
$route['flight/confirm']['post'] = "flight/confirm";
$route['flight/store']['post'] = "flight/store";
$route['flight/buy/(:num)'] = "flight/buy/$1";
$route['flight/view/(:num)'] = "flight/view/$1";

$route['bus'] = 'bus';
$route['bus/(:num)'] = 'bus/bytype/$1';
$route['bus/lists/(:num)'] = "bus/lists/$1";
$route['bus/details/(:num)'] = "bus/details/$1";
$route['bus/detailspayment/(:num)'] = "bus/detailspayment/$1";
$route['bus/confirm']['post'] = "bus/confirm";
$route['bus/store']['post'] = "bus/store";
$route['bus/buy/(:num)'] = "bus/buy/$1";
$route['bus/view/(:num)'] = "bus/view/$1";

$route['paypal/ipn']['post'] = "paypal/ipn";
