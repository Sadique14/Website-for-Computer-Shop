<?php require '../classes/category.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
   <?php
if(isset($_GET['id'])){
    session::set("id",$_GET['id']);               //current name tar data gula session e rakhlam. karon submit hole ei GET ta ar pabe na.
    session::set("name",$_GET['name']);
    session::set("type",$_GET['type']);
}
?>
<?php
    $adcat = new category();
    if (isset($_POST['backButton'])) {
        header("Location:category-list.php");
    }
    else if (isset($_POST['updateButton'])) {
        $new = $_POST['edit'];
        $check = $adcat->updateName(session::get('id'),$new,session::get('type'));
    } 
    else if (isset($_POST['deleteButton'])) {
        $check = $adcat->deleteName(session::get('id'),session::get('type'));
    }
?>
            <section class="col span-3-of-5 content-body">
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                         
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="edit" id="edit" value="<?php echo session::get('name'); ?>">
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
                            <input type="submit" name="backButton" value="Back">
                            <input type="submit" name="updateButton" value="Update" onclick="return confirm('Are you sure to Update!');">
                            <input type="submit" name="deleteButton" value="Delete" onclick="return confirm('Are you sure to Delete!');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 