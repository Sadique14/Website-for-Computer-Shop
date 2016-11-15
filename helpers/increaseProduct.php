<?php
	require_once '../library/database.php';
    require_once '../helpers/format.php';

    if(isset($_GET['id']) && isset($_GET['br_title']) && isset($_GET['search'])){
    	$db = new database();
    	$query="UPDATE under SET quantity = quantity+1 WHERE br_title=? AND product_id=?";
    	$arr = array($_GET['br_title'], $_GET['id']);
    	$result = $db->updateDelete($query,$arr);
    	header("Location: ../admin/productList.php?search=".$_GET['search']);
    	exit();
	}
?>