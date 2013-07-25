<?php
include_once 'static/header.php';
include_once 'classes/class.user.php';
echo 'Tervetuloa ' . $_SESSION['palveluName']. '.';
?>

<div id="menu">
    <table>
        <tr>
            <td><a href="#">Lisää sisältöä</a></td>
            <td><a href="#">Galleria</a></td>
            <td><a href="#">Blogi</a></td>
            <td><a href="forum/forum.php">Forum</a></td>
            <td><a href="logout.php">Kirjaudu ulos</a></td>
        </tr>
    </table>
</div><!-- menu loppuu -->
<div id="tiedot">
    <table>
        <thead>
            <tr>
                <td><strong>Oma nimi</strong></td>
                <td><strong>Käyttäjätunnus</strong></td>
                <td><strong>Sähköposti</strong></td>
                <td><strong>Status</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $userInfo = new User();
            
            foreach($userInfo->userInfo($_SESSION['palveluName']) as $key => $value)
            {
                echo '<td>' . $value['etunimi'] . ' ' .  $value['sukunimi'] . '</td>';
                echo '<td>' . $value['username'] . '</td>';
                echo '<td>' . $value['email'] . '</td>';
                
                if($value['user_status'] == 1)
                {
                    echo '<td>OK</td>';
                }
                else if($value['status'] == 0)
                {
                    echo '<td>Jätkä on bannattu</td>';
                }
            }
            ?>
        </tbody>
    </table>
</div><!-- tiedot loppuu  -->
</body>
</html>