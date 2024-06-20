<?php
require_once 'transactions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style2.css" type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Transactions List</title>
</head>

<body>
<nav class="main-nav" id="main-nav">
<a href="dashboard.php">Dashboard</a>
<a href="./set_budget.php">Set budget</a>
<a href="./add_transactions.php">Add transactions</a>
<a href="./transactions_list.php">View Transactions List</a>
<a href="logout.php">Logout</a>
</nav>
    <div class="page-wrap">

        <header class="main-header">
            <a href="#main-nav" class="open-menu">
            ☰
            </a>
            <a href="#" class="close-menu">
            ☰
            </a>
            
            <h1>Transactions List</h1>

        </header>

    <div class="content">
        <table class="table">
            <tr class="tr">
                <th>Name</th>
                <th>Amount (euro)</th>
                <th>Categorie</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php 
                $allTrans = Transactions::getAllTransactions();
                foreach ($allTrans as $trans) {
                    echo '<tr>';
                    echo '<td>'.$trans['name'].'</td>';
                    echo '<td>'.$trans['amount'].'</td>';
                    echo '<td>'.$trans['categorie'].'</td>';
                    echo '<td>'.$trans['date'].'</td>';
                    
                    echo '<td>'; 
                    echo '<a href="update_transactions.php?id='.$trans['id'].'">[+]</a>';
                    echo'</td>';
                    
                    echo '<td>';
                    echo '<a href="delete_transactions.php?id='.$trans['id'].'">[-]</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
    </body>
</html>