<?php
require_once 'user.php';

if(!User::checkLoggedInUser()){
    header('location: login.php');
    exit;
}

if (isset($_POST['budget'])) {
        $_SESSION['budget'] = $_POST['budget'];
        header('location: dashboard.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style2.css" type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Set budget</title>
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
    <h1>Set budget</h1>
  </header>
  
  <div class="content">

    <form action="set_budget.php" method="post"><br>

        <label>Enter your budget</label> 
        <input type="number" name="budget" min=0 step="0.1" required class="set_budget_input"> euro <br> <br>
        <input type="submit" value="Set" class="button">
    </form> <br>

</div>

    
</body>
</html>

