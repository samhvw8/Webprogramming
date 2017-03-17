<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/13/17
 * Time: 1:09 PM
 */

require 'db.php';

// ------------- Product

function get_products_table()
{
    $sql = "SELECT * FROM Products";
    $result = query($sql);

    $ret = [];
    while ($row = $result->fetch_assoc()) {
        $key = $row['name'];
        $ret[$key] = $row;
    }
    return $ret;
}

function reduce_product($product, $qty)
{
    $id = (int)$product['id'];
    $_qty = (int)$product['qty'] - $qty;
    $sql = "UPDATE Products SET qty=" . $_qty . " WHERE id=" . $id;

    return query($sql);
}

// ------------- Users

function get_users_table()
{
    $sql = "SELECT * FROM Users";
    $result = query($sql);

    $ret = [];
    while ($row = $result->fetch_assoc()) {
        $key = $row['username'];
        $ret[$key] = $row;
    }
    return $ret;
}

// ---------- Orders

function add_order($user_id) {
    $sql = "INSERT INTO Orders (user_id)
      VALUES 
      (" . $user_id . ")";
    $result = query($sql);
    return $result;
}

function get_current_order_id()
{
    $sql = "SELECT * FROM Orders";
    $result = query($sql);
    return $result->num_rows;
}

// ---------- Quotes

function add_quote($order_id, $product, $qty)
{
    $product_id = (int)$product['id'];
    $sql = "INSERT INTO Quotes (product_id, order_id, qty)
      VALUES 
      (" . $product_id . ", " . $order_id . ", " . $qty . ")";
    $result = query($sql);
    return $result;

}


