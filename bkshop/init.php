<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/7/17
 * Time: 11:22 AM
 */
require 'db.php';

function up()
{
    echo "Up <br>";
    create_products_table();
    create_users_table();
    create_orders_table();
    create_quotes_table();
    create_data();
}

function down()
{
    echo "Down <br>";
    drop_quotes_table();
    drop_orders_table();
    drop_users_table();
    drop_products_table();
}

function create_products_table()
{
    $sql = "CREATE TABLE Products (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            description VARCHAR(30) NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            qty INT(6) UNSIGNED NOT NULL
        )";

    $result = query($sql);
    return $result;
}

function drop_products_table()
{
    $sql = "DROP TABLE Products";
    $result = query($sql);
    return $result;
}

function create_users_table()
{
    $sql = "CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            passwd VARCHAR(30) NOT NULL
        )";

    $result = query($sql);
    return $result;
}

function drop_users_table()
{
    $sql = "DROP TABLE Users";
    $result = query($sql);
    return $result;
}

function create_orders_table()
{
    $sql = "CREATE TABLE Orders (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            FOREIGN KEY(user_id) REFERENCES Users(id) ON DELETE CASCADE
        )";

    $result = query($sql);
    return $result;
}

function drop_orders_table()
{
    $sql = "DROP TABLE Orders";
    $result = query($sql);
    return $result;
}

function create_quotes_table()
{
    $sql = "CREATE TABLE Quotes (
            product_id INT(6) UNSIGNED NOT NULL,
            order_id INT(6) UNSIGNED NOT NULL,
            qty INT(6) UNSIGNED NOT NULL,
            PRIMARY KEY (product_id, order_id),
            FOREIGN KEY(order_id) REFERENCES Orders(id) ON DELETE CASCADE,
            FOREIGN KEY(product_id) REFERENCES Products(id) ON DELETE CASCADE
        )";

    $result = query($sql);
    return $result;
}

function drop_quotes_table()
{
    $sql = "DROP TABLE Quotes";
    $result = query($sql);
    return $result;
}

function create_data()
{
    create_data_users();
    create_data_products();
}

function create_data_users()
{
    $sql = "INSERT INTO Users (username, passwd)
      VALUES 
      ('test', '123'),('sam', '123'),('admin', '123')";
    $result = query($sql);
    return $result;
}

function create_data_products()
{
    $sql = "INSERT INTO Products (name, description, price, qty)
      VALUES 
      ('Iphone 6s', 'Apple iphone', 1000, 999),
      ('HTC', 'HTC phone', 350, 333),
      ('LG Tivi', 'LG Tivi oled', 10000, 1999),
      ('Samsung galaxy s7', 'Samsung galaxy s7', 950, 850)";
    $result = query($sql);
    return $result;
}

up();