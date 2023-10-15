<?php
//session_start();

function checkREFERER()
{
    $allowed_host = $_SERVER['SERVER_NAME'];
    $host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

    if (substr($host, 0 - strlen($allowed_host)) == $allowed_host) {
        //echo "some code";
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function xss_cleaner($input_str)
{
    $return_str = str_replace(array('<', ';', '|', '&', '>', "'", '"', ')', '('), array('&lt;', '&#58;', '&#124;', '&#38;', '&gt;', '&apos;', '&#x22;', '&#x29;', '&#x28;'), $input_str);
    $return_str = str_ireplace('%3Cscript', '', $return_str);
    return $return_str;
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checktime($taltolsum,$total_sec){

    return  ($total_sec*100)/$taltolsum;


}


function time_to_decimal($time) {
$timeArr = explode(':', $time);
if (count($timeArr) == 3) {
  $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);		
} else if (count($timeArr) == 2) {
  $decTime = ($timeArr[0]) + ($timeArr[1]/60);
} else if (count($timeArr) == 2) {
  $decTime = $time;	
}
return $decTime;
}




function setMD5()
{

    $passuniq = uniqid();
    $passmd5 = md5($passuniq);

    $sumlenght = strlen($passmd5); #num passmd5

    $letter_pre = chr(rand(97, 122)); #set char for prefix

    $letter_post = chr(rand(97, 122)); #set char for postfix

    $letter_mid = chr(rand(97, 122)); #set char for middle string

    $num_rand = rand(0, $sumlenght); #random for cut passmd5

    $cut_pre = substr($passmd5, 0, $num_rand); #cutmd5 start 0 stop $numrand
    $setmid = $cut_pre . $letter_mid; #set pre string + char middle

    $cut_post = substr($passmd5, $num_rand, $sumlenght + 1);

    $set_modify_md5 = $letter_pre . $setmid . $cut_post . $letter_post;
    return $set_modify_md5;
}



function sumratting($countdata,$sum)
{

    return ($countdata*100)/$sum;
}




if (!function_exists('base_url')) {
    function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf($tmplt, $http, $hostname, $end);
        } else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}