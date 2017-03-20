<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/20/17
 * Time: 9:25 PM
 */

    require "Page.php";


    $page = new Page("Test Page", "2016", "samhv");

    $page->addContent("Test page generator");

    echo $page->get();