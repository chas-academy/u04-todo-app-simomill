<?php
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

        <p id="error_msg" class="error"><?php if(isset($_GET['msg'])) {
                        echo $_GET['msg'];
                    } ?></p>
        <p id="success_msg" class="success"><?php if(isset($_GET['green'])) {
                        echo $_GET['green'];
                    } ?></p>
            
<!-- LOGIN FORM -->
        <form action="check_user.php" method="post" class="login" id="signin">  
                <input type="text" id="user_signin" name="username" placeholder="username" 
                value="<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $_POST['username'];
                }?>">

                <input type="password" name="loginPass" id="pass_signin" placeholder="password">
                
                <input type="submit" value="Login" class="btn">
        </form>

<!-- SIGNUP FORM -->
        <form action="check_user.php" method="post" class="login" id="signup">  
                <input type="text" id="user_signup" name="username" placeholder="username" required>

                <input type="password" name="signupPass" id="pass_signup" placeholder="password" required>

                <input type="password" name="pass_confirm" id="pass_confirm" placeholder="repeat password" required>

                <p class="error" id="pass_msg"></p>

                <input type="submit" class="btn" id="signup_submit" value="Sign up">
        </form>
    </main>

</body>
</html>