<?php
require_once __DIR__ . '/lib/config.php';
require_once __DIR__ . '/lib/connect.php';
require_once __DIR__ . '/lib/functions.php';
require_once __DIR__ . '/lib/service.php';

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit;
} else {
    header('Location: page_home/');
}