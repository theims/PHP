<?php

class dbconnection
{
    protected $db_conn;
    protected $db_name = 'palvelu';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_host = 'localhost';
    
    function connect()
    {
        try
        {
            $this->db_conn = new PDO("mysql:host=$this->db_host;charset=utf8;dbname=$this->db_name", $this->db_user, $this->db_pass);
            return $this->db_conn;
        }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }
}

?>