<?php
$errorMessage = '';
if(isset($_GET['Err'])){
    switch ($_GET['Err']) {
        case 1:
            $errorMessage = 'Login failed, try again';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style2.css" type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>

    <div class='login-box'>
        <div id="login-header" class="login-header">
            <header>Login</header>
        </div>
        <form name='form' method='POST' action='login_action.php'>

            <div class="input-box">
                <input type='text' name='email' class='input-field' placeholder='Enter Email' required><br>
            </div>

            <div class="input-box">
                <input type='password' name='password' class='input-field' placeholder='Enter Password' required><br>
            </div>
            <div class='login-failed'><?php echo $errorMessage;?></div> <br>
            <div class="forgot">
                <section>
                    <input type='checkbox' name='remember' id='check'>
                    <label for='check'>Remember Me</label>
                </section>

                <br>
                <br>

            <div class="login_button">
                <button type='submit-btn' name='submit' id='submit' value='Login' class='log_button'>Login</button>
            </div>

            <br>

            <div class="sign-up-link">
                <p?>Don't have an account? <a href='register.php'>Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>