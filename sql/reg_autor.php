<?php

header('Content-Type: text/html; charset=UTF-8');

$mysqli = mysqli_connect("localhost", "uncvjrjz_autor", "12345autor", "uncvjrjz_autor");
if ($mysqli == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    // print("Соединение установлено успешно");
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $result = $mysqli->query("SELECT * FROM `usersavtor` WHERE `email` = '$email' AND `pass` = '$pass'");
    if ($result->num_rows != 0) {
        print("exist");
    } else {
        $mysqli->query("INSERT INTO `usersavtor`(`email`, `pass`) VALUES ('$email', '$pass')");
        print("ok");
    }
}
