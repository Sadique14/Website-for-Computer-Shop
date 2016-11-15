<?php require '../classes/admin.php'; ?>   
<?php require '../classes/branch.php'; ?>  
<?php include 'include/header.php';?>
<?php
if(session::get('adminLevel')==1){          //for preventing lower admins to get this page
    header("Location:index.php");
    exit();
}
?>
         <div class="row main-body">
<?php include 'include/sidebar.php';?>
<?php
    $admin = new adminLogin();
    $br = new branch();
    $brTitles = $br->getAllNullBranchTitle();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password=md5($password);
        $branch = $_POST['branch-list'];
        $check = $admin->addAdmin($email,$password,$branch);
    }
?>
            <section class="col span-3-of-5 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="email">Email Address:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="categoryName">Password:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="branch-list">Assign Admin to a Branch:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="branch-list" id="branch-list">
                                <option value="0">--Choose Branch--</option>
                                <?php
                                    if($brTitles){
                                        foreach($brTitles as $title){
                                ?>
                                <option><?php echo $title['title'];?></option>
                                <?php }} ?>
                            </select>
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
                            <input type="submit" value="Add Admin" onclick="return confirm('Are you sure to add admin');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 