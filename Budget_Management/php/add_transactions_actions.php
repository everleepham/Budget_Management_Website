<?php
require_once 'transactions.php';

$date = new DateTime($_POST['date']);
$product = new Transactions($_POST['name'], $_POST['amount'], $_POST['categorie'], $date);
$product->addTransactions();
header('location: dashboard.php');

?>
