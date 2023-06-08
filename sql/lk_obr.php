<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

$mysqli = mysqli_connect("localhost", "uncvjrjz_0155", "123456K", "uncvjrjz_0155");
if ($mysqli == false) {
    print("error");
} else {
    $inputValue = $_POST["value"];
    $item = $_POST["item"];
    $id = $_SESSION["id"];
    $mysqli->query("UPDATE `users` SET `$item`='$inputValue' WHERE  `id` ='$id'");

    $_SESSION[$item] = $inputValue;
}
