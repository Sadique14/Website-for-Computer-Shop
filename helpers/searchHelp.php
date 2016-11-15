<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
        if($_POST['type'] == 0){
        	$category_id=$_POST['category_id'];
        	$category_name=$_POST['category_name'];
        	$sort = $_POST['sort']; 
        	header("Location: ../products.php?category_id=".$category_id."&category_name=".$category_name."&sort=".$sort);
        	exit();
        }
        else if($_POST['type'] == 1){
        	$subcategory_id=$_POST['subcategory_id'];
        	$subcategory_name=$_POST['subcategory_name'];
        	$sort = $_POST['sort']; 
        	header("Location: ../products.php?subcategory_id=".$subcategory_id."&subcategory_name=".$subcategory_name."&sort=".$sort);
        	exit();
        }
    }
?>