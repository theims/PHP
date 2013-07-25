<?php
include_once 'libs/login_user.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kirjautuminen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript">
        function showRegister(){
            document.getElementById("login_form").style.display = 'none';
            document.getElementById("register_form").style.display = 'block';
        }
        
        function showLogin(){
            document.getElementById("register_form").style.display = 'none';
            document.getElementById("login_form").style.display = 'block';
        }
    </script>
</head>
<body>
    <div id="login_form">
        <h2>Kirjaudu sisään</h2>
        <table>
            <tr>
                <td>
                    <a href="forum/forum.php">Forum</a>
                </td>
            </tr>
        </table>
        <?php
                if(isset($error))
                {
                    echo $error;
                }
                ?>
        <form action="" method="post">
            <label for="user">Käyttäjätunnus</label>
            <input type="text" name="username" />
            
            <label for="password">Salasana</label>
            <input type="password" name="password" />
            
            <input type="submit" name="login" value="Kirjaudu" />
        </form>
        <a href="#" onClick="showRegister()">En ole rekisteröitynyt</a>
    </div><!-- login_form loppuu -->
    
    <div id="register_form">
        <h2>Rekisteröidy</h2>
        <form action="" method="post">
            <label for="etunimi">Etunimi</label>
            <input type="text" name="etunimi" />
            <label for="sukunimi">Sukunimi</label>
            <input type="text" name="sukunimi" />
            <label for="username">Käyttäjätunnus</label>
            <input type="text" name="username" />
            <label for="salasana">Salasana</label>
            <input type="password" name="password" />
            <label for="salasana_uudestaan">Salasana uudestaan</label>
            <input type="password" name="password_confirm" />
            <label for="email">Sähköposti</label>
            <input type="text" name="email" />
            <input type="submit" value="Rekisteröidy" name="register" />
        </form>
        <a href="#" onClick="showLogin()">Olen jo rekisteröitynyt</a>
    </div><!-- register_form loppuu -->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>