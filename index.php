<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3> Login</h3>
    <form action="includes/login.inc.php" method="post"><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="pwd" placeholder="password"><br><br>
        <button>Login</button><br><br>

    </form>
    <h3> Signup</h3>
    <form action="includes/signup.inc.php" method="post">
     <?php signup_inputs(); ?>
        <button>Signup</button><br><br>
    </form>

    <?php
    check_signup_errors();
    ?>
</body>

</html>