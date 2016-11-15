<?php require '../classes/others.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $adLink = new others();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addcopyright($_POST);
    }
    $readLink = $adLink->readLink();
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="copyright">Copyright Information:<br><span style="font-size:80%;color:red;">(Hold down the ALT key and type 0169 on the numeric keypad for 'Copyright © symbol'):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="copyright" id="copyright" placeholder="Enter Copyright Information" <?php if($readLink[0]['copyrightInfo']){ ?> value="<?php echo $readLink[0]['copyrightInfo'];?>" <?php } ?>>
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