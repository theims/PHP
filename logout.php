<?php

session_start();

if(isset($_SESSION['palveluName']))
{
    session_destroy();
    header("location: login.php");
}

?>