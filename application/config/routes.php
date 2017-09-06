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
|	https://codeigniter.com/user_guide/general/routing.html
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
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'welcome';

$route['login']['get'] = 'auth/authController';
$route['login']['post'] = 'auth/authController/login';
$route['logout']['get'] = 'auth/authController/logout';

//doctor
$route['doctor_registration']['get'] = 'doctor/registrationController';
$route['doctor_registration']['post'] = 'doctor/registrationController/create';

$route['doctor_profile']['get'] = 'doctor/profileController';
$route['doctor_profile']['post'] = 'doctor/profileController/update';

$route['schedule'] = 'doctor/scheduleController';
$route['schedule/create'] = 'doctor/scheduleController/create';
$route['schedule/(:num)/delete'] = 'doctor/scheduleController/delete/$1';

$route['appointments'] = 'doctor/appointmentsController';
$route['appointments/(:num)/discard'] = 'doctor/appointmentsController/discard/$1';
$route['appointments/(:num)/confirm']['post'] = 'doctor/appointmentsController/confirm/$1';

$route['appointments/(:num)/patient']['get'] = 'doctor/appointmentsController/patient/$1';
$route['appointments/(:num)/patient']['post'] = 'doctor/appointmentsController/rate/$1';


$route['appointment/(:num)'] = 'doctor/appointmentController/index/$1';



//patient
$route['patient_registration']['get'] = 'patient/registrationController';
$route['patient_registration']['post'] = 'patient/registrationController/create';

$route['patient_profile']['get'] = 'patient/profileController';
$route['patient_profile']['post'] = 'patient/profileController/update';


//doctors php
$route['doctors']['get'] = 'patient/doctorsController';



$route['booking/(:num)']['get'] = 'patient/bookingController/index/$1';
$route['booking/(:num)']["post"] = 'patient/bookingController/book/$1';
// $route['book']['post'] = 'patient/bookingController/book';

$route['bookings'] = 'patient/bookingsController/index/$1';
$route['bookings/(:num)/delete'] = 'patient/bookingsController/delete/$1';
$route['bookings/(:num)/doctor']['get'] = 'patient/bookingsController/doctor/$1';
$route['bookings/(:num)/doctor']['post'] = 'patient/bookingsController/rate/$1';




$route['documents'] = 'patient/documentsController';
$route['document/(:num)'] = 'patient/documentController/index/$1';


//admin
$route['users']['get'] = 'admin/usersController';
$route['user/(:num)/deactivate']['get'] = 'admin/usersController/deactivate/$1';
$route['user/(:num)/activate']['get'] = 'admin/usersController/activate/$1';
$route['user/(:num)/reset']['get'] = 'admin/usersController/reset/$1';
$route['user/(:num)/delete']['get'] = 'admin/usersController/delete/$1';


//city
// $route['cities']['post'] = 'city/citiesController/cities';






