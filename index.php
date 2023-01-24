<?php
include_once("./config/connect.php");


if (isset($_POST['signin'])) {
    $con = connect();
    $User_login = filter_input(INPUT_POST, 'User_login');
    $User_pass = filter_input(INPUT_POST, 'User_pass');
    $User_pass = md5($User_pass);

    $sql = "SELECT * FROM users WHERE User_login='$User_login' AND User_pass='$User_pass'";
    $result = $con->query($sql);

    if ($result->num_rows) {
        $usuario = $result->fetch_assoc();

        session_start();
        $_SESSION['User_name'] = $user['User_name'];
        $_SESSION['User_id'] = $user['User_id'];

        header('location:app/index.php');
    } else {
        $msg = "Login or Password are wrong!";
    }
}

if (isset($_POST['signin'])) {
    header('location:app/create_user.php?create_user');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash</title>
</head>

<body>
    <main>
        <div class="index_icon">
            <img src="" alt="carwash icon">
        </div>

        <form action="index.php" method="post">
            <label for="index_login">Login</label>
            <input type="text" name="index_login">

            <label for="index_password">Password</label>
            <input type="password" name="index_password" id="index_password">

            <input type="submit" value="Login" class="index_button" id="index_send" name="Login">
            <input type="reset" value="Clear" class="index_button" id="index_reset">
            <input type="submit" value="signin" class="index_button" id="index_signin" name="signin">
        </form>


    </main>

    <footer>
        <h5>Created by: JbRodrigues</h5>
    </footer>
</body>

</html>
