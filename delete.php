<?php
$db = new SQLite3('paikkments.db');
$id = $_GET['id'];
require 'header.php'; 
?>
<?php

$db->exec("DELETE FROM my_table WHERE id='$id'");
header('Location: list.php');
?>