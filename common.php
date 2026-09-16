<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'kh'; // Default language: Khmer
}
$lang_code = $_SESSION['lang'];

switch ($lang_code) {
    case 'en':
        include_once 'languages/lang_en.php';
        break;
    case 'fr':
        include_once 'languages/lang_fr.php';
        break;
    case 'kh':
    default:
        include_once 'languages/lang_kh.php';
        break;
}

if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];
}
if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'home';
}
