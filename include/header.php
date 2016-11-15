<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  //header("Cache-Control: max-age=2592000");
    //require 'library/session.php';
    //session::init();        
    //require 'library/database.php';
    //require 'helpers/format.php';  
    spl_autoload_register(function($class_name){
		include "classes/".$class_name.".php";
    });          
?>
<?php
	$option = new others();
	$result = $option->getOptions();
	$cat = new readCategory();
	$category = $cat->readCat();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/modalImage.css">
        <!-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,300italic' rel='stylesheet' type='text/css'> -->
        <title><?php if($result[0]['title']){echo $result[0]['title'];} ?></title>
    
    </head>
    
    <body>
        <header>
            <div class="logo">
               <img src="admin/<?php if($result[0]['logo']){echo $result[0]['logo'];} ?>" alt="logo" class="main-logo">
           </div>
           <div class="branch-link">
               <div class="icon">
               <i class="ion-bag"></i>
               <a class="link" href="branches.php">OUR BRANCHES</a>
          </div>
          </div>
              <div class="support">
                    <div class="icon">
                     <i class="ion-information"></i>
                      <a class="link" href="support.php">CUSTOMER SUPPORT</a>
                 </div>
             </div>
                <div class="searchbox">
                <form style="float: right;" action="searchResult.php" method="post"> 
                    <input type="text" class="search" name="search" placeholder="Search Product..." /><br /> 
                    <input type="submit" 
               style="position: absolute; left: -9999px; width: 1px; height: 1px;"
               tabindex="-1" />
                </form> 
                </div>
            
            
            <div class="clearfix"></div>                             
            
            <ul>
              <li><a class="homeButton" href="index.php">Home</a></li>
              <?php if($category){foreach ($category as $catName) { $subCat = $cat->readSubCatByCategory($catName['category_id']); ?>
               <li class="dropdown">
                <a href="products.php?category_id=<?php echo $catName['category_id']; ?>&category_name=<?php echo $catName['category_name']; ?>&sort=default" class="dropbtn"><?php echo $catName['category_name']; ?></a>
                <?php if($subCat){ ?>
                <div class="dropdown-content">
                <?php foreach ($subCat as $key) { ?>
                  <a href="products.php?subcategory_id=<?php echo $key['subcategory_id']; ?>&subcategory_name=<?php echo $key['subcategory_name']; ?>&sort=default"><?php echo $key['subcategory_name']; ?></a>
                  <?php }} ?>
                </div>
               </li>
               <?php }} ?>
               
            </ul>   
        </header>