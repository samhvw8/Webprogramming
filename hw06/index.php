<?php

/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/6/17
 * Time: 5:40 AM
 */

require 'tool.php';

session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = get_products_table();
}

echo "Welcome ";
if (!isset($_SESSION['login'])) {
    echo "<b>Guest</b>";
} else {
    echo "<b>" . $_SESSION['username'] . "</b>";
}

echo " to BKShop<br>";
if (!isset($_SESSION['login'])) {
    echo "<a href='login.php'>Login</a><br>";
} else {
    echo "<a href='login.php'>Logout</a>";
    echo "  <a href='cart.php'>Shopping cart</a>";
}

?>

<?php if (isset($_SESSION['login'])): ?>

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
            <th>Description</th>
            <th></th>
        </tr>

        <?php foreach ($_SESSION['products'] as $product => $detail): ?>

            <tr>
                <td><?php echo $product; ?></td>
                <td><?php echo $detail['description']; ?></td>
                <td><a href=<?php echo "added.php?product=" . urlencode($product) . "" ?>>Add to cart</a></td>
            </tr>

        <?php endforeach; ?>

    </table>


<?php endif; ?>
