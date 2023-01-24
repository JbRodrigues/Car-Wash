<?php
    include_once("../config/connect.php");
    session_start();

    if (isset($_POST['send'])) {
        //echo "Formulario Enviado!";
        $post = $_POST;
        unset($post['send']);
        extract($post);
        if (!in_array("", $post)) {

            if ($usuSenha != $usuConfirmaSenha) {
                echo "Senhas Não conferem!";
            } else {

                $usuSenha = md5($User_pass);
                $usuNome = ucfirst($User_name);
                $sql = "INSERT INTO user ";
                $sql .= "(User_name, User_login, User_pass, User_email, User_phone) VALUES";
                $sql .= "('{$User_name}','{$User_pass}','{$User_login}')";

                $con = connecta();
                $con->query($sql);

                if ($con->affected_rows > 0) {
                    header("location:index.php");
                } else {
                    echo "Error!";
                }
            }
        } else {
            $msg = "All Fields need to be filled";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User - Barber Shop</title>
</head>

<body>
    <main>
        <form action="create_user.php" method="post">
            <label for="create_login">User Login</label>
            <input type="text" id="create_login" name="User_login" value="<?= (isset($User_login)) ? $User_login : ""; ?>">

            <label for="create_name">User name</label>
            <input type="text" id="create_name" name="User_name" value="<?= (isset($User_name)) ? $User_name : ""; ?>">

            <label for="create_email">Email</label>
            <input type="email" id="create_email" name="User_email">

            <label for="create_phone">Phone number</label>
            <input type="tel" id="create_phone" name="User_phone">

            <label for="create_name">User Password</label>
            <input type="text" id="create_pass" name="User_pass" value="<?= (isset($User_pass)) ? $User_pass : ""; ?>">

            <label for="create_name">Confirm Password</label>
            <input type="text" id="create_passConfirm" name="User_passConfirm" value="<?= (isset($User_passConfirm)) ? $User_passConfirm : ""; ?>">

            <input type="button" value="send" id="create_send">
            <input type="reset" value="clear" id="create_clear">
        </form>
    </main>
</body>

</html>
