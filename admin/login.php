<?php require '../classes/adminLogin.php' ?>
<?php
    $adlog = new adminLogin();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $logincheck = $adlog->login($email, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="../vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style2.css">
        <!-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,300italic' rel='stylesheet' type='text/css'> -->
        <title>X Computer</title>
    
    </head>
    
    <body>
        <center>
            <div class="login">
                <h1>Admin Login</h1>
                
                <p class="msg">
                    <?php
                        if(isset($logincheck)){
                            echo $logincheck;
                        }
                    ?>
                </p>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="email" name="email" placeholder="EMAIL ADDRESS" required>
                    <input type="password" name="password" placeholder="PASSWORD" required>
                    <input type="submit" value="Log in">
                </form>
            </div>
        </center>
    </body>
    
</html>