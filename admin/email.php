<?php require '../classes/others.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $adLink = new others();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addEmail($_POST);
    }
    $readLink = $adLink->readLink();
?>
            <section class="col span-3-of-5 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Enter Email" <?php if($readLink[0]['email']){ ?> value="<?php echo $readLink[0]['email'];?>" <?php } ?>>
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
                            <input type="submit" value="Save/Update">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 