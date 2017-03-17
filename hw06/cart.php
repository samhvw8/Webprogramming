<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/6/17
 * Time: 5:57 AM
 */


session_start();


?>


<h3>Shopping Cart</h3>


<?php if (isset($_GET['update'])): ?>


    <form action="cart.php" method="post">
        <label for="product">product:></label>
        <input type="text" name="product" value=<?php echo '"' . $_GET['update'] . '"' ?> readonly> <br>
        <label for="qty">Qty:</label>
        <input type="number" name="qty" required> <br>
        <a href="cart.php">Cancel</a>
        <input type="submit" name="submit">

    </form>

<?php endif ?>


<?php if (isset($_SESSION['cart']) && !isset($_GET['update'])): ?>

    <style>

        table, td, th {
            padding: 5px;
        }
        th {
            background-color: black;
            color: white;
        }

        tr:nth-child(odd) {
            background-color: #e7e7e7
        }

        tr:nth-child(even) {
            background-color: #cbcbcb
        }

    </style>

    <h3>Available Products</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th></th>
        </tr>

        <?php foreach ($_SESSION['cart'] as $product => $qty): ?>

            <tr>
                <td><?php echo $product; ?></td>
                <td><?php echo $_SESSION['products'][$product]['price'] ?></td>
                <td><?php echo $qty; ?></td>
                <td>
                    <a href=<?php echo "cart.php?update=" . urlencode($product) . "" ?>>update</a>
                    <a href=<?php echo "cart.php?remove=" . urlencode($product) . "" ?>>&#10060;</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>


    <a href="index.php">Back to homepage</a>
    <a href="checkout.php">Proceed to Checkout</a>


<?php elseif (!isset($_GET['update'])): ?>

    <p>Your cart is empty! Redirect to homepage !</p>
    <?php
    header("Refresh:1; url=index.php");
    ?>

<?php endif; ?>

<?php

if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Refresh:0; url=cart.php");
}

if (isset($_POST['product'])) {
    $_SESSION['cart'][$_POST['product']] = $_POST['qty'];
    header("Refresh:0; url=cart.php");
}


?>
