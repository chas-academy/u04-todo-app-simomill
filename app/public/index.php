<?php
/** @var $pdo \PDO */
require_once "../resources/db.php";
require_once '../resources/partials/_head.php';
?>

<body class="login">
    <main>
        <h1>TODO<i class="fas fa-tasks"></i>R</h1>

        <div class="links-container">
            <span class="log-link" id="signupLink">sign up</span>
            <span class="log-link" id="loginLink">sign in</span>
        </div>

        <p id="user_msg" class="error"><?php if(isset($_GET['msg'])) {
                        echo $_GET['msg'];
                    } ?></p>
            
        <form action="check_user.php" method="post" class="login" id="signin">  
                <input type="text" id="user_signin" name="username" placeholder="username">

                <input type="password" name="loginPass" id="pass_signin" placeholder="password">
                
                <input type="submit" value="Login" class="btn">
        </form>

        <form action="check_user.php" method="post" class="login" id="signup">  
                <input type="text" id="user_signup" name="username" placeholder="username" required>

                <input type="password" name="signupPass" id="pass_signup" placeholder="password" required>

                <input type="password" name="pass_confirm" id="pass_confirm" placeholder="repeat password" required>

                <p class="error" id="pass_msg"></p>

                <button type="submit" class="btn" id="signup_submit">Sign up</button>
        </form>
    </main>

</body>
</html>