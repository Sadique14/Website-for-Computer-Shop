<?php require '../classes/others.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $adLink = new others();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addLink($_POST);
    }
    $readLink = $adLink->readLink();
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="press">Newspaper Link:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="url" name="press" id="press" placeholder="Enter News Link" <?php if($readLink[0]['press']){ ?> value="<?php echo $readLink[0]['press'];?>" <?php } ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="app">App Link:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="url" name="app" id="app" placeholder="Enter App Link" <?php if($readLink[0]['app']){ ?> value="<?php echo $readLink[0]['app'];?>" <?php } ?>>
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