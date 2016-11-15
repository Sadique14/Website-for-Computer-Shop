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
    $br = new adminLogin();
    $admins = $br->getAdmins();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=$_POST['adminList']; 
        $check = $br->deleteAdmin($id);
    }
?>
            <section class="col span-3-of-5 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="adminList">Email address:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="adminList" id="adminList">
                                <option value="0">--Choose Admin--</option>
                                <?php
                                    if($admins){
                                        foreach($admins as $data){
                                ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['email'];?></option>
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
                            <input type="submit" value="Delete Admin" onclick="return confirm('Are you sure to delete admin');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 