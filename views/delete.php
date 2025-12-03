<?php
require_once __DIR__ . '/../controllers/BookController.php';
$controller = new BookController();

$id = $_GET['id'];

$controller->destroy($id);

header("Location: index.php");
exit;
?>
