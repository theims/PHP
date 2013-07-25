<?php

include_once 'class.database.php';

class User
{
    public $link;
    
    function __construct()
    {
        $dbconnection = new dbconnection();
        $this->link = $dbconnection->connect();
        return $this->link;
    }
    
    function loginUser($username, $password)
    {
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND user_status = 1");
        $rowcount = $query->rowCount();
        return $rowcount;
    }
    
    function registerUser($username, $password, $email, $time, $date, $etunimi, $sukunimi)
    {
        $query = $this->link->prepare("INSERT INTO users (username, password, email, time, date) VALUES (?,?,?,?,?)");
        $values = array($username, $password, $email, $time, $date);
        $query->execute($values);
        $lastInsertId = $this->link->lastInsertId();
        $query2 = $this->link->prepare("INSERT INTO user_info (users_id, etunimi, sukunimi) VALUES (?,?,?)");
        $values2 = array($lastInsertId, $etunimi, $sukunimi);
        $query2->execute($values2);
        $rows = $query->rowCount() + $query2->rowCount();
        
        return $rows;
    }
    
    function isBanned($username)
    {
        $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND user_status = 0");
        $rowcount = $query->rowCount();
        return $rowcount;
    }
    
    function userInfo($username)
    {
        //$query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
        $query = $this->link->query("SELECT users.username, users.email, users.user_status, user_info.etunimi, user_info.sukunimi FROM users, user_info WHERE username = '$username' AND users.id = user_info.users_id");
        $rowcount = $query->rowCount();
        
        if($rowcount == 1)
        {
            $result = $query->fetchAll();
            return $result;
        }
        else
        {
            return $rowcount;
        }
    }
}

?>