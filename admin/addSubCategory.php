<?php require '../classes/subCategory.php'; ?>     
<?php require '../classes/readCategory.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $add = new subCategory();
    $read = new readCategory();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $category_name=$_POST['category-list'];
        $category_id=$read->getCatId($category_name);
        $names=$_POST['subCategoryName'];
        $check = $add->addSubCat($names,$category_id[0]['category_id']);
    }
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="category-list">Choose Category:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="category-list" id="category-list">
                                <option value="0">--Select Category--</option>
                                <?php
                                    $AllCat = $read->readCat();
                                    if($AllCat){
                                        foreach($AllCat as $cat){
                                ?>
                                <option><?php echo $cat['category_name'];?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="subcategoryName">New Sub-category:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="subCategoryName" id="subCategoryName" placeholder="Enter Sub-category Name" required>
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
                            <input type="submit" value="Save" onclick="return confirm('Are you sure to Add!');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 