<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  //header("Cache-Control: max-age=2592000");
?>
<?php
    require '../library/session.php';
    session::checkSession();                    //session sesh hoise kina check er jonno
   spl_autoload_register(function($class_name){
    include "../classes/".$class_name.".php";
    }); 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/scrollTable.css">

        <link rel="stylesheet" type="text/css" href="resources/css/style2.css">
        <title>Admin Panel</title>
    
    </head>
    
    <body>
    <?php
        if(isset($_GET['action']) && $_GET['action']="logout"){
            session::destroy();                                 //logout click korle session destroy
        }
        $option = new others();
        $result = $option->getOptions();    
    ?>
<header>
    <div class="logo">
       <img src="<?php if($result[0]['logo']){echo $result[0]['logo'];} ?>" alt="logo" class="main-logo">
   </div>
  <div class="admin-welcome">
      <p><?php echo session::get('adminEmail'); ?><?php if(session::get('adminBranch') != "0"){ ?><br><?php echo session::get('adminBranch'); }?></p>
      <a href="?action=logout">Logout</a>                 <!--GEt method e pathachsi-->
  </div>
  <div class="clearfix"></div>                             <!--for clearing float-->
    <ul>
      <li><a class="homeButton" href="index.php">Admin Home</a></li>
      <li class="dropdown">
        <a href="changePassword.php" class="dropbtn">Change Password</a>
      </li>
        <?php if(session::get('adminLevel')==0){ ?>
       <li class="dropdown">
        <a href="addAdmin.php" class="dropbtn">Add New Admin</a>
      </li>
      <li class="dropdown">
        <a href="deleteAdmin.php" class="dropbtn">Delete Admin</a>
      </li>
        <?php } ?>
      <li class="dropdown">
        <a href="../index.php" class="dropbtn" target="_blank">Visit Website</a>
      </li>
    </ul>   
</header>