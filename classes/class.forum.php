<?php
include_once 'class.database.php';

class Forum
{
    public $link;
    
    function __construct()
    {
        $dbconnection = new dbconnection();
        $this->link = $dbconnection->connect();
        return $this->link;
    }
    
    function showMessages()
    {
        $query = $this->link->query("SELECT forum.viesti FROM forum");
        $rowcount = $query->rowCount();
        if($rowcount > 0)
        {
            $fetchMessages = $query->fetchAll();
            return $fetchMessages;
        }
    }
}

?>