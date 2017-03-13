<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/6/17
 * Time: 5:57 AM
 */
require 'tool.php';

session_start();
order_process();
$_SESSION['products'] = get_products_table();
?>

<?php if (isset($_SESSION['cart'])): ?>


    <p>Thank you for your order</p>

    <?php $_SESSION['order'] = (int)get_current_order_id(); ?>

    <p>Order #<?php echo $_SESSION['order'] ?></p>


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


<?php
function order_process()
{
    if (isset($_SESSION['cart'])) {
        $user_id = (int)$_SESSION['user_id'];
        add_order($user_id);

        $order_id = get_current_order_id();
        foreach ($_SESSION['cart'] as $product => $qty) {

            add_quote($order_id, $_SESSION['products'][$product], $qty);
            reduce_product($_SESSION['products'][$product], $qty);
        }
    }


}