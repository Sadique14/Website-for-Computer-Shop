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
    $br = new branch();
    $branchTitle = $br->getAllBranchTitle();
    if (isset($_POST['updateBranch'])) {
        $check = $br->updateBranch($_POST['title'],$_POST['address'],$_POST['phone1'],$_POST['phone2'],session::get('temp'));
    }
    if (isset($_POST['deleteBranch'])) {
        $check = $br->deleteBranch($_POST['title']);
    }
    //if(isset($_POST['showInfo'])){
       // $branches = $br->getAllBranchByTitle($_POST['category-list']);
  //  }
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="category-list">Choose Branch:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="category-list" id="category-list">
                                <option value="0">--Select Branch--</option>
                                <?php
                                    if($branchTitle){
                                        foreach($branchTitle as $branch){
                                ?>
                                <option><?php echo $branch['title'];?></option>
                                <?php }} ?>
                            </select>
                            <input type="submit" name="showInfo" value="Show Info">
                        </div>
                    </div>
                    <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
                    <div class="row">
                        <?php
                            if (isset($_POST['showInfo'])) {
                                session::set("temp",$_POST['category-list']);
                               $branches = $br->getAllBranchByTitle($_POST['category-list']);
                               if($branches){
                        ?>
                        <div class="col span-1-of-3 label">
                            <label for="title">Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="title" id="title" value="<?php echo $branches[0]['title']; ?>" placeholder="Enter Title..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="address">Branch Address:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="address" id="address" rows="5" placeholder="Enter Address..." required><?php echo $branches[0]['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="phone1">Phone Number 1:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="phone1" id="phone1" value="<?php echo $branches[0]['phone1']; ?>" placeholder="Enter Phone Number..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="phone2">Phone Number 2:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="phone2" id="phone2" value="<?php echo $branches[0]['phone2']; ?>" placeholder="Enter Phone Number..." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="updateBranch" value="Update Branch" onclick="return confirm('Are you sure to update branch');" >
                            <input type="submit" name="deleteBranch" value="Delete Branch" onclick="return confirm('Are you sure to Delete branch. Branch admin, his slider will also be deleted.');" >
                        </div>
                    </div>
                    <?php }} ?>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 