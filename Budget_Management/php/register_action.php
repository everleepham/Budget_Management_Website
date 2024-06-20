<?php
require_once './user.php';

if(User::isEmailExist($_POST['email'])){
    header('location: register.php?Err=email');
    exit;
}

$customer=new User($_POST['first_name'],$_POST['last_name'],$_POST['email'], $_POST['password']);
$customer->addUser();

header('location: ./login.php');