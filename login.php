<?php

include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $error = "";
    $username = $_POST['username'];
    $psw = $_POST['pass'];


    $pass = hash("sha256", $psw, false);


    $sel_user = "SELECT * FROM person WHERE username='$username' AND pass='$pass'";
    $run_user = $conn->query($sel_user);
    $check_user = mysqli_num_rows($run_user);

    if($check_user == 1)
    {
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header("Location: menu.php");
    }
    else
    {
        $error = "Neplatné jméno nebo heslo";
    }
}

?>