<?php require '../classes/category.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $adcat = new category();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name=$_POST['categoryName'];
        $check = $adcat->addCat($name);
    }
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="categoryName">Category Name:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="categoryName" id="categoryName" placeholder="Enter Category Name">
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