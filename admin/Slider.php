<?php require '../classes/others.php'; ?>          
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $access = new others();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $access->addSlider($_FILES,$_POST['slide-number'],session::get("adminId"));
    }
    $slider = $access->getAllSliders();
?>
            <section class="col span-3-of-4 content-body">
                <?php $flag=0; foreach ($slider as $sl) {
                    if($sl['image']){
                     ?>
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label><?php echo "&nbsp;Slot ".$sl['id'].":"; ?></label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl['image']; ?>" height="80px" width="190px">
                            <a href="../helpers/deleteSlider.php?id=<?php echo $sl['id']; ?>">Delete</a>
                        </div>
                    </div>
                    <?php $flag++; }} ?>
                    <?php if($flag==0){ ?>
                    <p class="error">Currently there are no silder images.</p>
                    <?php } ?>
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="slide-number">Choose Slide Number:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="slide-number" id="slide-number">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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