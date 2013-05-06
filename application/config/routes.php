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

$route['default_controller'] = "stone/home";
$route['404_override'] = '';


$route['manage'] = "/admin/sysadmin";
$route['projects.html'] = "/projects";
$route['news.html'] = "stone/news";
$route['news_([0-9]+).html'] = "stone/news/$1";
$route['newsdetail_([0-9]+).html'] = "stone/newsdetail/$1";


$route['projects_([0-9]).html'] = "/projects/$1";
$route['projectdetail_([0-9]+).html'] = "/projectdetail/$1";
$route['jobs.html'] = "/jobs";
$route['jobdetail_([0-9]+).html'] = "/jobdetail/$1";	
$route['jobs.html'] = "/jobs";
$route['jobs_([0-9]).html'] = "/jobs/$1";
$route['info.html'] = "/info";
$route['index.html'] = "stone/home";
/* End of file routes.php */
/* Location: ./application/config/routes.php */