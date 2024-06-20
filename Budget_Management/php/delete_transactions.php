<?php
require_once 'transactions.php';
$objTrans = Transactions::getTransactionstById($_GET['id']);
$objTrans->deleteTransactions();
header('location: transactions_list.php');