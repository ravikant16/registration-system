<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth/login';
$route['registration'] = 'Auth/create_user';

$route['user/dashboard'] = 'User_ctrl/dashboard';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
