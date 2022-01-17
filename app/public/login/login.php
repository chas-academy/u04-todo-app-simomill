<?php
/** @var $pdo \PDO */
require_once "../../db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <script src="app.js" defer></script>

</head>
<body class="login">
    <main>
    <h1>todooer</h1>

    <span class="login-links" id="signupLink">sign up</span>
    <span class="login-links" id="loginLink">sign in</span>

    <p id="user_msg" class="error"><?php if(isset($_GET['msg'])) {
                    echo $_GET['msg'];
                } ?></p>
        
    <form action="" method="post" class="login" id="signin">  
            <input type="text" id="user_signin" name="username" placeholder="username">
            <input type="password" name="password" id="pass_signin" placeholder="password">
            <input type="submit" value="Login" class="btn">
    </form>

    <form action="check_user.php" method="post" class="login" id="signup">  
            <input type="text" id="user_signup" name="username" placeholder="username" required>
            <input type="password" name="password" id="pass_signup" placeholder="password" required>
            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="repeat password" required>
            <p class="error" id="pass_msg"></p>
            <button type="submit" class="btn" id="signup_submit">Sign up</button>
    </form>
    </main>

</body>
</html>