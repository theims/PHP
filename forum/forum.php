<?php
include_once 'forum_header.php';
include_once '../classes/class.forum.php';
/*
include_once '../classes/class.user.php';
echo 'Tervetuloa ' . $_SESSION['palveluName']. '. Lue ja kirjoittele vaikka jotain viestejä :/';
*/
?>

<table>
    <tr>
        <td>
            Alue
        </td>
        <td>
            Viimeisin
        </td>
        <td>
            Ketjuja
        </td>
        <td>
            Viestejä
        </td>
    </tr>
    <tr>
        <td>
            Yleinen keskustelu
        </td>
        <td>
            <?php
            $showMessages = new Forum();
            //$messages = $haeViestit->showMessages();
            foreach($showMessages->showMessages() as $key => $messages)
            {
                echo $messages['viesti'];
            }
            ?>
        </td>
    </tr>
</table>

<?php
include_once 'forum_footer.php';
?>