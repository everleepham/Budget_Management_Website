<?php
$errorMessage = '';
if(isset($_GET['Err'])){
    switch ($_GET['Err']) {
        case 'email':
            $errorMessage = 'Email address already exist';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style2.css" type='text/css'>
    
    
</head>
<body>
    <div class='login-box'>
        <div id="login-header" class="login-header">
            <header>Register</header>
        </div>
        <form name='form' method='POST' action='register_action.php'>

            <div class="input-box">
                <input type='text' name='first_name' class='input-field' placeholder='First Name' required>
                </i><br>
            </div>

            <div class="input-box">
                <input type='text' name='last_name' class='input-field' placeholder='Last Name' required>
                </i><br>
            </div>

            <div class="input-box">
                <input type='text' name='email' class='input-field' placeholder='Email' required><br>
            </div>

            <div class="input-box">
                <input type='password' name='password' class='input-field' placeholder='Password' required><br>
            </div>

            <div class='login-failed'><?php echo $errorMessage;?></div>


            <div class="input-submit">
                <button type='submit-btn' name='submit' id='submit' value='Login' class='button'>Sign up</button>
            </div>

            </div>
        </form>
    </div>
</body>
</html>