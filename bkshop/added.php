<?php
session_start();
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/6/17
 * Time: 5:57 AM
 */

if (isset($_GET['product'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            $_GET['product'] => 1
        ];
    } else if (!isset($_SESSION['cart'][$_GET['product']])) {
        $_SESSION['cart'][$_GET['product']] = 1;
    } else {
        $_SESSION['cart'][$_GET['product']] = $_SESSION['cart'][$_GET['product']] + 1;
    }

}


?>


<p>Prodcut added.<a href="cart.php">Show cart.</a></p>
<a href="index.php">Continue shopping</a>
