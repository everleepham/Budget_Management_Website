<?php
require_once 'transactions.php';

$date = new DateTime($_POST['date']);
$objTrans = new Transactions($_POST['name'], $_POST['amount'], $_POST['categorie'], $date, $_POST['id']);
$objTrans->updateTransactions();
header('location: transactions_list.php');