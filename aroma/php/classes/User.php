<?php

class User
{
    private $name;
    private $lastname;
    private $email;
    private $id;

    function __construct($id, $name, $lastname, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }
    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function getLastname()
    {
        return $this->lastname;
    }
    function getEmail()
    {
        return $this->email;
    }
    //статический метод добавления пользователя
    static function addUser($name, $lastname, $email, $pass)
    {
        global $mysqli;
        $email = mb_strtolower(trim($email));
        $pass = trim($pass);
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $result = $mysqli->query("SELECT * FROM `users` WHERE `email` ='$email'");
        if ($result->num_rows != 0) {
            return json_encode(["result" => "exist"]);
        } else {
            $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
            return json_encode(["result" => "success"]);
        }
    }
    ///статический метод авторизации пользователя
    static function authUser($email, $pass)
    {
        global $mysqli;
        $email = mb_strtolower(trim($email));
        $pass = trim($pass);

        $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $result = $result->fetch_assoc();
        $hash = $result["pass"];

        if (password_verify($pass, $hash)) {
            return json_encode(["result" => "ok"]);
        } else {
            return json_encode(["result" => "user_not_found"]);
        }
    }
}
