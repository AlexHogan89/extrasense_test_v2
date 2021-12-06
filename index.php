<?
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    session_start();
    if(!isset($_SESSION['flag'])) { 
        $_SESSION['flag'] = 0; 
    }
    require_once 'application/boot.php';
?>