<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/6/17
 * Time: 5:57 AM
 */


session_start();

?>

<?php if (isset($_SESSION['cart'])): ?>

    <p>Thank you for your order</p>

    <?php if (isset($_SESSION['order'])): ?>
        <p>Order #<?php echo $_SESSION['order'] ?></p>

        <?php
        $_SESSION['order'] = $_SESSION['order'] + 1;
        ?>
    <?php else: ?>
        <p>Order #1</p>
        <?php
        $_SESSION['order'] = 1;
        ?>
    <?php endif; ?>


    <?php foreach ($_SESSION['cart'] as $product => $qty): ?>

        <ul>
            <li>
                <?php
                echo $qty . " " . $product
                ?>
            </li>

        </ul>

    <?php endforeach ?>


    <?php

    unset($_SESSION['cart']);
    ?>


    <a href="index.php">Back to homepage</a>


<?php else: ?>

    <p>Your cart is empty! Nothing to checkout! Redirect to homepage!</p>
    <?php
    header("Refresh:1; url=index.php");
    ?>

<?php endif; ?>
