<?php

include_once("../config/connect.php");

session_start();

$user = $_SESSION['User_name'];
var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Car Wash</title>
</head>

<body>

    <main>
        <h1>Be Welcome - <?php echo $user ?></h1>
    </main>

</body>

</html>
