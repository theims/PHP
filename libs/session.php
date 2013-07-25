<?php

session_start();

if(isset($_SESSION['palveluName']))
{
    $session_name = $_SESSION['palveluName'];
}
else
{
    header('location: login.php');
}

?>