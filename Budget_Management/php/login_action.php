<?php
require_once 'user.php';
$user_id=User::login($_POST['email'], $_POST['password']);

if(!empty($user_id)){
    session_start();
    $_SESSION['user_id']=$user_id;
    header('location: dashboard.php');
    exit;
}else{
    header('location: ./login.php?Err=1');
}