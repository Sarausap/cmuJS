<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['login'] = 'Authentication/view/$1';
$route['login/authenticate'] = 'Authentication/login';

// Admin
// users
$route['admin/users'] = 'Users/view';
$route['admin/users/(:num)'] = 'Users/edit/$1';
$route['admin/users/update'] = 'Users/update';
$route['admin/users/add'] = 'Users/insert';
$route['admin/users/search'] = 'Users/search';
$route['admin/users/delete'] = 'Users/delete';
$route['admin/dashboard'] = 'Dashboard/admin';
$route['admin/profile'] = 'Profile/admin';

// authors
$route['admin/authors'] = 'Users/view_author';


// Volume
$route['admin/volumes'] = 'Volume/view';
$route['admin/volumes/(:num)'] = 'Volume/edit/$1';
$route['admin/volumes/add'] = 'Volume/insert';
$route['admin/volumes/update'] = 'Volume/update';
$route['admin/volumes/delete'] = 'Volume/delete';

// Role
$route['admin/role'] = 'Role/view';
$route['admin/role/add'] = 'Role/insert';
$route['admin/role/(:num)'] = 'Role/edit/$1';
$route['admin/role/update'] = 'Role/update';
$route['admin/role/delete'] = 'Role/delete';

// Author
$route['admin/author/add'] = 'Author/insert';
$route['admin/author/(:num)'] = 'Author/edit/$1';
$route['admin/author/update'] = 'Author/update';
$route['admin/author/delete'] = 'Author/delete';


// articles
$route['admin/articles'] = 'Articles/view';
$route['admin/articles/view'] = 'Articles/admin_view_article_details';
$route['admin/articles/delete'] = 'Articles/delete';
$route['admin/article/add'] = 'Articles/adminform';
$route['admin/article/update'] = 'Articles/admin_update';
$route['admin/article/update/process'] = 'Articles/admin_update_article';
$route['admin/article/search'] = 'Articles/search';


// Evaluator
$route['evaluator/dashboard'] = 'Dashboard/evaluator';

// Profile
$route['evaluator/profile'] = 'Profile/evaluator';
// Articles







// Contributor
$route['user/dashboard'] = 'Dashboard/contributor';


// Profile
$route['user/profile'] = 'Profile/contributor';
$route['user/profile/update'] = 'Profile/update';

// article
$route['user/article'] = 'Articles/contributor_view_articles';
$route['user/articles/view'] = 'Articles/user_view_article_details';
$route['user/article/view'] = 'Articles/contributor_viewDetails_articles';
$route['user/article/add'] = 'Articles/form';
$route['user/article/update'] = 'Articles/update';
$route['user/article/update/process'] = 'Articles/update_article';
$route['user/article/add/insert'] = 'Articles/insert_article';



$route['article/view'] = 'Articles/view_article_details';
$route['archive'] = 'pages/archive';
$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';

