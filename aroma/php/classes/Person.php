<?php

class Person
{
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;

    function __construct($name, $lastname, $age, $mother = null, $father = null)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->mother = $mother;
        $this->father = $father;
        $this->hp = 100;
    }
    function sayHi($name)
    {
        return "Hi $name, I'm " . $this->name;
    }
    function setHp($hp)
    {
        if ($this->hp + $hp >= 100) $this->hp = 100;
        else $this->hp = $this->hp + $hp;
    }
    function getHp()
    {
        return $this->hp;
    }
    function getName()
    {
        return $this->name;
    }
    function getMother()
    {
        return $this->mother;
    }
    function getFather()
    {
        return $this->father;
    }
    function getLastname()
    {
        return $this->lastname;
    }
    function getInfo()
    {
        return "<h3>Пара слов обо мне: </h3><br>" .
            "Мое имя: " . $this->getName() .
            "<br> Моя фамилия: " . $this->getLastname() .
            "<br> Моего папу зовут: " . $this->getFather()->getName() .
            "<br> Мою маму зовут: " . $this->getMother()->getName() .
            "<br> Мою бабушку по линии мамы зовут: " . $this->getMother()->getMother()->getName() . "&nbsp;" . $this->getMother()->getMother()->getLastname() .
            "<br> Моего дедушку по линии мамы зовут: " . $this->getMother()->getFather()->getName() . "&nbsp;" . $this->getMother()->getFather()->getLastname() .
            "<br> Мою бабшку по линии папы зовут: " . $this->getFather()->getMother()->getName() . "&nbsp;" . $this->getFather()->getMother()->getLastname() .
            "<br> Моего дедушку по линии папы зовут: " . $this->getFather()->getFather()->getName() . "&nbsp;" . $this->getFather()->getFather()->getLastname();
    }
}
$petr = new Person("Petr", "Petrov", 74);
$inna = new Person("Inna", "Petrova", 71);
$alex = new Person("Alex", "Ivanov", 72);
$anna = new Person("Anna", "Ivanova", 70);
$igor = new Person("Igor", "Petrov", 40, $inna, $petr);
$olga = new Person("Olga", "Petrova", 38, $anna, $alex);
$valera = new Person("Valera", "Petrov", 10, $olga, $igor);

echo $valera->getInfo();

// echo $valera->getMother()->getFather()->getName();

// //здоровье человека не м.б. больше 100
// $medKit = 50;
// $alex->setHp(-30); ///Упал
// echo $alex->getHp() . "<br>"; //текущее здоровье
// $alex->setHp($medKit); ///нашел аптечку
// echo $alex->getHp();
