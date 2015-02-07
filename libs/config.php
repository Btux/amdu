<?php
define('DS', '/');
define('_WEBROOT_', realpath(dirname($_SERVER['SCRIPT_NAME'])));
define('_ROOT_', dirname($_SERVER['SCRIPT_FILENAME']).'/');


session_start();


require 'database.php';
require 'html.php';
require 'render.php';
require 'SimpleImage.php';

