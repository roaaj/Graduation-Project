<?php session_start();
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
        header("location:http://localhost/final%20p/my-cart.php");
    } else {
        $_SESSION['cart'][$_GET['id']] = array("quantity" => 1, "rate" => $_GET['rate'], "nm" => $_GET['nm'], "cat" => $_GET['cat'], "id" => $_GET['id']);
        header("location:http://localhost/final%20p/my-cart.php");
    }
} else if (isset($_GET['id'])) {
    //del a item
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("location:http://localhost/final%20p/my-cart.php");
}
