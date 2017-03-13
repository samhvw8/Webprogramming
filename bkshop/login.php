<?php

session_start();

require 'tool.php';

if (!isset($users)) {
    $users = get_users_table();
}


//var_dump($users);
?>




<?php if (!isset($_SESSION['login'])): ?>


    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required> <br>
        <label for="password">password:</label>
        <input type="password" name="password" required> <br>
        <input type="submit" name="submit">
    </form>

    <?php
//    var_dump($_SESSION);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        foreach ($users as $username => $detail) {
            if (strcmp($_POST['username'], $username) == 0) {

                if (strcmp($detail['passwd'], $_POST['password']) == 0) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $detail['id'];

                    echo "Login <b>" . $username . "</b> sucessfull<br>";
                    echo "Redirect to homepage";

                    header("Refresh:1; url=index.php");
                }
            }
        }
    }


    ?>
<?php else: ?>

    <?php
    session_unset();
    echo "Logout sucessfull<br>";
    echo "Redirect to homepage";

    header("Refresh:1; url=index.php");
    ?>

<?php endif; ?>

