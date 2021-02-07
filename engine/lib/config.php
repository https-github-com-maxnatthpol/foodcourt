<?php

require_once 'lang.php';

$system_config = '1';

define('HEAD_LOGO_MINI', '');
define('HEAD_LOGO', '');
//define('LOGO', '../../images/logo.png');
define('TEXT_LOGO', 'Admin');
define('TITLE_TH', '');
define('TITLE_EN', '');

define('GOOGLE_MAP_KEY', '');

define('e_mail', 'tns.mikesuwan@gmail.com');
define('pass_e_mail', 'Mikeaom06082539');
define('from_e_mail', 'Unofence');
define('Host_e_mail', 'smtp.gmail.com');
define('link_e_mail', '');
define('name_web_e_mail', '');
define('facebook_e_mail', '');
// require_once 'connect.php'
define('CONTENT', 'Content');
define('DESIGN', 'Design');


// time mathching
define('TIME_USER', 7);
define('TIME_SV_PHP', 0);

//Set time zone-----------------------------
date_default_timezone_set("Asia/Bangkok");
$date_create = new datetime();
$date = date_format($date_create, 'Y-m-d H:i:s');


// reCAPTCHA
define('reCAPTCHA_CLIENT', '6Lf9v9YZAAAAANvFcrqFKeiJoDJLbTmyaq34Bheu');
define('reCAPTCHA_SERVER', '6Lf9v9YZAAAAAFVZ5xuo_F5l7b8EpnoxVSYVho4r');

// Copyright
define('Name_footer', 'Unodesks');
define('Copyright_Year', '2020');
define('Mikesuwan_present', true);

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
define('BASE_URL', $url);

$host = $protocol . $_SERVER['HTTP_HOST'] ;
define('BASE_HOST', $host);

define('ROOT', str_replace("\\", '/', dirname(__FILE__)));
define('PATH', ROOT == $_SERVER['DOCUMENT_ROOT'] ?'' :substr(ROOT, strlen($_SERVER['DOCUMENT_ROOT'])));
