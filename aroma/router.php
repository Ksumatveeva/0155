<?php
session_start();
$url = explode('/', $_SERVER['REQUEST_URI']);
require_once("php/db.php");
require_once("php/classes/User.php");

if ($url[2] == "auth") {
    $content = file_get_contents("pages/login.php");
} else if ($url[2] == "register") {
    $content = file_get_contents("pages/register.html");
} else if ($url[2] == "blog") {
    $content = file_get_contents("pages/blog.html");
} else if ($url[2] == "users") {
    require_once("pages/users/index.html");
} else if ($url[2] == "addUser") {
    echo User::addUser($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["pass"]);
} else if ($url[2] == "authUser") {
    echo User::authUser($_POST["email"], $_POST["pass"]);
} else {
    $content = file_get_contents("pages/ind.php");
}

if (!empty($content)) require_once("template.php");
