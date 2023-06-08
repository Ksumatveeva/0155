<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

$mysqli = mysqli_connect("localhost", "uncvjrjz_0155", "123456K", "uncvjrjz_0155");
if ($mysqli == false) {
    print("error");
} else {
    // print("Соединение установлено успешно");
    $email = trim(mb_strtolower($_POST["email"]));
    $pass = trim($_POST["pass"]);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    // if ($result->num_rows != 0) {
    //     print("exist");
    // } else {
    //     $mysqli->query("INSERT INTO `usersavtor`(`email`, `pass`) VALUES ('$email', '$pass')");
    //     print("ok");
    // }
    $result = $result->fetch_assoc();
    $hash = $result["pass"];

    if (password_verify($pass, $hash)) {
        echo "ok";
        $_SESSION["name"] = $result["name"];
        $_SESSION["lastname"] = $result["lastname"];
        $_SESSION["email"] = $result["email"];
        $_SESSION["id"] = $result["id"];
    } else {
        echo "user_not_found";
    }
}
