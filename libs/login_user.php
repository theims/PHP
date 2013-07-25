<?php

if(isset($_POST['login']))
{
    session_start();
    include_once 'classes/class.user.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password))
    {
        $error = 'Kirjoita käyttäjätunnus ja salasana.';
    }
    else
    {
        $password = crypt(md5($password), md5($username));
        $loginUser = new User();
        $authUser = $loginUser->loginUser($username, $password);
        
        if($authUser == 1)
        {
            $make_session = $loginUser->userInfo($username);
            foreach($make_session as $sessions)
            {
                $_SESSION['palveluName'] = $sessions['username'];
                
                if(isset($_SESSION['palveluName']))
                {
                    header('location: index.php');
                }
            }
        }
        else
        {
            $isBanned = $loginUser->isBanned($username);
            if($isBanned)
            {
                echo 'Et voi kirjautua, koska olet bannattu :D';
            }
            else
            {
                $error = 'Kirjautuminen epäonnistui.';
            }
        }
        
    }
}

if(isset($_POST['register']))
{
    session_start();
    include_once 'classes/class.user.php';
    $user = new User();
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $etunimi = $_POST['etunimi'];
    $sukunimi = $_POST['sukunimi'];
    $repassword = $_POST['password_confirm'];
    $email = $_POST['email'];
    $date = date("d.m.Y");
    $time = date("H.i.s");
    
    if(empty($username) || empty($email) || empty($password) || empty($etunimi) || empty($sukunimi))
    {
        $error = 'Kaikkiin tekstikenttiin pitää syöttää tietoa.';
    }
    else if($password !== $repassword)
    {
        $error = 'Salasanat eivät vastaa toisiaan.';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = 'Sähköpostiosoite ei ole validi.';
    }
    else
    {
        $available = $user->userInfo($username);
        if($available == 0)
        {
            $password = crypt(md5($password), md5($username));
            $register_user = $user->registerUser($username, $password, $email, $time, $date, $etunimi, $sukunimi);
            
            if($register_user == 2)
            {
                $make_session = $user->userInfo($username);
                foreach($make_session as $sessions)
                {
                    $_SESSION['palveluName'] = $sessions['username'];
                    
                    if(isset($_SESSION['palveluName']))
                    {
                        header('location: index.php');
                    }
                }
            }
            else
            {
                echo 'sumting wong';
            }
        }
        else
        {
            echo 'Käyttäjätunnus on jo olemassa';
        }
    }
}

?>