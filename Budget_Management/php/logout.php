<?php
require_once 'user.php';
User::logout();

header('location: login.php');