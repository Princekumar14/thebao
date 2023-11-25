<?php

    session_start();
    $hostname = "http://localhost/ecom";
    $conn = mysqli_connect("localhost", "root", "", "thebao") or die("connection Failed : " . mysqli_connect_error());

    define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/thebao/');
    define('SITE_PATH', 'http://localhost/thebao/');

    define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'/media/product/');
    define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'/media/product/');
?>