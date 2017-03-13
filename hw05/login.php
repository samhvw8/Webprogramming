<?php

session_start();

$users = [
    'test' => '123',
    'sam' => '123',
    'admin' => '123'
]

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
        foreach ($users as $username => $password) {
            if (strcmp($_POST['username'], $username) == 0) {
                if (strcmp($users[$username], $_POST['password']) == 0) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;


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

