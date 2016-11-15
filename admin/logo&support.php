<?php require '../classes/others.php'; ?>          
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $access = new others();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $access->addLogo($_FILES,$_POST['selection']);
    }
    $sl = $access->getLogo();
?>
            <section class="col span-3-of-4 content-body">
                <?php
                    if($sl){
                     ?>
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>LOGO:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[0]['logo']; ?>" height="80px" width="190px">
                        </div>
                </div>
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>SUPPORT:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[0]['support']; ?>" height="80px" width="190px">
                        </div>
                </div>
                    <?php } ?>
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="selection">Choose Image type:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="selection" id="selection">
                                <option>LOGO</option>
                                <option>SUPPORT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Upload Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="file" name="image">
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
                            <input type="submit" value="Save">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 