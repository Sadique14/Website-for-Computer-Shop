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
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title=$_POST['title'];
        $address=$_POST['address'];
        $phone1=$_POST['phone1'];
        $phone2=$_POST['phone2'];
        $check = $br->addBranch($title,$address,$phone1,$phone2);
    }
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="title">Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="title" id="title" placeholder="Enter Title...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="address">Branch Address:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="address" id="address" placeholder="Enter Address..."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="phone1">Phone Number 1:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="phone1" id="phone1" placeholder="Enter Phone Number...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="phone2">Phone Number 2:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="phone2" id="phone2" placeholder="Enter Phone Number...">
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
                            <input type="submit" value="Add Branch" onclick="return confirm('Are you sure to Add!');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 