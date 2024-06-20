<?php
require_once 'transactions.php';
require_once 'user.php';

if(!User::checkLoggedInUser()){
    header('location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style2.css" type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<body>
<nav class="main-nav" id="main-nav">
    <a href="dashboard.php">Dashboard</a>
    <a href="set_budget.php">Set budget</a>
    <a href="add_transactions.php">Add transactions</a>
    <a href="transactions_list.php">View transactions list</a>
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
      
      <h1>Dashboard</h1>
</header>
    
    <div class="content">
        <div class="balance">
            <h2>Your balance</h2>
            <?php
        if (isset($_SESSION["budget"])) {
            $balance = $_SESSION["budget"] - Transactions::totalExpenses();
            echo $balance;
        } else {
            echo "0"; 
        }

        ?>
        </div>
        
        <div class="total-budget">
            <h2>Total budget</h2>
            <?php
            if (isset($_SESSION["budget"])) {
                echo $_SESSION["budget"];
            } else {
                echo "0"; 
            }
            ?>
        </div>

        <div class="total-spent">
            <h2>Total spent</h2>
            <?php
                $totalSpent = Transactions::totalExpenses();
                if ($totalSpent > 0) {
                    echo $totalSpent;
                } else {
                    echo "0";
                }
            ?>
        </div>

    </div>
    
  </div>
</body>
</html>