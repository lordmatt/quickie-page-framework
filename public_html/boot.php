<?php
/*
 * Boot is the only file you need to call outside of your page content. 
 */

// note trailing slash is used
define('_INC_PATH_','/path/to/your/inc/');
define('_WEB_ROOT_','http://example.com/');

require_once(_INC_PATH_.'MANAGER.php');

// this is how you load modules.
# M()->module('css'); // custom CSS tricks.
