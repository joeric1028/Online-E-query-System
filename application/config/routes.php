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
$route['default_controller'] = 'login';

$route['main'] = 'main';
$route['login'] = 'login';
$route['logout'] = 'api/logout';

// Manage Users
$route['users'] = 'manageusers';
$route['users/create'] = 'manageusers/createuser';
$route['users/delete'] = 'manageusers/deleteuser';
$route['parents/search'] = 'manageusers/searchparent'; 

// Manage Students
$route['students'] = 'managestudents';
$route['students/view'] = 'managestudents/getstudents';
$route['students/view/(:num)'] = 'managestudents/getstudentsbylevel/$1';
$route['students/parent/view/(:num)'] = 'managestudents/getstudentsbyparent/$1';
$route['students/create'] = 'managestudents/createstudent';
//$route['students/delete'] = 'managestudents/deletestudent';
$route['subjects/view'] = 'managestudents/getsubjects';
$route['subjects/view/(:num)'] = "managestudents/getsubjectsbylevel/$1";
$route['subjects/create'] = 'managestudents/createsubject';
// $route['subjects/delete'] = 'managestudents/deletesubject';

// Accounts
$route['accounts'] = 'accounts';
$route['accounts/view'] = 'accounts/getaccounts';
$route['accounts/delete'] = 'accounts/deleteaccounts';
$route['assessments/view'] = 'accounts/getassessments';
$route['assessments/view/(:num)'] = 'accounts/getassessmentsbystudentid/$1';
$route['assessments/add'] = 'accounts/addassessmentsbystudentid';
$route['assessments/update'] = 'accounts/updateassessment';
$route['assessments/delete/(:num)'] = 'accounts/deleteassessment/$1';
$route['payments/view/(:num)'] = 'accounts/getpaymentsbystudentid/$1';
$route['payments/create'] = 'accounts/createpaymentschedule';


// Grades
$route['grades'] = 'grades';
$route['grades/view'] = 'grades/getgrades';
$route['grades/view/(:num)'] = 'grades/getgradesByStudent/$1';
$route['grades/update'] = 'grades/updateGrades';


// School Calendar
$route['calendar'] = 'schoolcalendar';
$route['calendar/create'] = 'schoolcalendar/createevent';
$route['calendar/upcoming'] = 'schoolcalendar/upcomingevent';
$route['calendar/school'] = 'schoolcalendar/schoolevent';
$route['calendar/export'] = 'schoolcalendar/exportevent';

// Under Construction
$route['welcome'] = 'welcome';

$route['api/(:any)'] = 'api/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
