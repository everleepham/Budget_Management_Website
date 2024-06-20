<?php
require_once 'transactions.php';
$objTrans = Transactions::getTransactionstById($_GET['id']);

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
      
      <h1>Edit transactions</h1>
</header>

<div class="content">
    <form method="post" action="update_transactions_action.php">
            <label">Name</label>
            <input type="text" name="name" class='add_trans' value="<?php echo $objTrans->getName(); ?>">
            <br>
            <label">Amount</label>
            <input type="number" name="amount" min=0 step="0.01" class='add_trans'  value="<?php echo $objTrans->getAmount(); ?>">euro
            <br>
            <label>Categorie</label>
            <select name="categorie">
                <option value="rent">Rent</option> 
                <option value="groceries">Groceries</option> 
                <option value="shopping">Shopping</option> 
                <option value="transport">Transport</option>
            </select>
            <br>
            <label>Date</label>
            <input type="date" name="date" class='add_trans' value="<?php echo $objTrans->getDate(); ?>">
            <br>
            <input type="hidden" name="id" class='add_trans' value="<?php echo $objTrans->getId(); ?>"/> <br>
            <input type="submit" value="Validate" class='button'>
    </form>
    </div>
</div>
</body>

</html>