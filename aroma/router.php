<?php

$url = explode('/', $_SERVER['REQUEST_URI']);

if ($url[2] == "auth") {
    $content = file_get_contents("pages/login.php");
} else if ($url[2] == "register") {
    $content = file_get_contents("pages/register.html");
} else if ($url[2] == "blog") {
    $content = file_get_contents("pages/blog.html");
} else if ($url[2] == "users") {
    require_once("pages/users/index.html");
} else {
    $content = file_get_contents("pages/ind.php");
}

if (!empty($content)) require_once("template.php");
