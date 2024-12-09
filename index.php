<?php
session_start();
if(@$_SESSION['isLogin']) {
    include 'pages/layouts/admin/app.php';
} else {
    include 'pages/layouts/user/app.php';
}
?>