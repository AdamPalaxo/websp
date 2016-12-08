<?php

include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $error = "";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $psw = $_POST['pass'];
    $confirmpsw = $_POST['confirmpass'];

    if($psw == $confirmpsw)
    {        
        $sql = "SELECT email FROM person WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
        if(mysqli_num_rows($result) == 1)
        {
            echo "Emailová adrese je již registrována";
        }
        else
        {
            $pass = hash("sha256", $psw, false);
            $query = mysqli_query($conn, "INSERT INTO person (username, pass, email, rank_id) VALUES ('$username', '$pass', '$email', 2)");
            if($query)
            {
                header("Location: index.php");
            }
        }   

    }
    else
    {
        //echo "Hesla se neschodují!";
    }

}

?>