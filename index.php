<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <h4>SIGN UP</h4>
    <p>Don't have an account yet? Sign up here!</p>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
        <input type="text" name="email" placeholder="E-mail"><br>
        <br>
        <button type="submit" name="submit">SIGN UP</button>
    </form>

    <h4>LOGIN</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="password" name="pwd" placeholder="Password"><br> 
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>

</body>

</html>