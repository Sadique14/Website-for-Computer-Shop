<?php require '../classes/admin.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $admin = new adminLogin();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $oldPassword=$_POST['oldPassword'];
        $oldPassword = md5($oldPassword);
        $newPassword=$_POST['newPassword'];
        $newPassword = md5($newPassword);
        $email=session::get('adminEmail');
        $check = $admin->changePassword($email,$oldPassword,$newPassword);
    }
?>
            <section class="col span-3-of-5 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="oldPassword">Old Password:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" name="oldPassword" id="oldPassword" placeholder="Enter Old Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="newPassword">New Password:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="newPassword" id="newPassword" placeholder="Enter new Password">
                        </div>
                    </div>
                    <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Update">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 