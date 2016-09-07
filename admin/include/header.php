<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
    require '../library/session.php';
    session::checkSession();                    //session sesh hoise kina check er jonno
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style2.css">
        <title>X Computer</title>
    
    </head>
    
    <body>
    <?php
        if(isset($_GET['action']) && $_GET['action']="logout"){
            session::destroy();                                 //logout click korle session destroy
        }    
    ?>
<header>
    <div class="logo">
       <img src="../resources/img/logo.PNG" alt="logo" class="main-logo">
   </div>
  <div class="admin-welcome">
      <p><?php echo session::get('adminEmail'); ?></p>
      <a href="?action=logout">Logout</a>                 <!--GEt method e pathachsi-->
  </div>
  <div class="clearfix"></div>                             <!--for clearing float-->
    <ul>
      <li><a class="homeButton" href="#home">Admin Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Change Password</a>
      </li>
        <?php if(session::get('adminLevel')==0){ ?>
       <li class="dropdown">
        <a href="#" class="dropbtn">Add New Admin</a>
      </li>
        <?php } ?>
      <li class="dropdown">
        <a href="#" class="dropbtn">Visit Website</a>
      </li>
    </ul>   
</header>