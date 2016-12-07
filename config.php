<?php

$conn = new mysqli("localhost", "root", "",  "conference");

if($conn->connect_error)
{
    die("Nepodařilo se připojit k MySQL serveru: " . $conn->connect_error);
}

?>