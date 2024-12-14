<?php
session_start();
if(@$_SESSION['isLogin']) {
    include 'pages/layouts/admin/app.php';
} else {
    if(@$_GET['hal'] == 'login' || @$_GET['hal'] == 'register') {
        include 'pages/user/login.php';
    } else {
        include 'pages/layouts/user/app.php';
    }
   
}
?>