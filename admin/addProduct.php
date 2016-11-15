<?php require '../classes/branch.php'; ?>
<?php require '../classes/product.php'; ?>      
<?php require '../classes/subCategory.php'; ?>     
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $br = new Branch();
    $p = new product();
    $sc=new subCategory();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $p->addProduct($_POST, $_FILES);
    }
?>
            <section class="col span-3-of-4 content-body">
                <div class="row">
                 <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>   
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="product_id">Product ID:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="product_id" id="product_id" value="<?php echo substr(md5(time()), 0, 10); ?>" placeholder="Enter product id...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="title">Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="title" id="title" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="branch">Choose Branch:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="branch" id="branch">
                                <option value="0">--Select Branch--</option>
                                <?php
                                    if(session::get('adminLevel')==1)
                                        $AllBranch = $br->getAllBranchTitleByAdmin(session::get('adminId'));
                                    else
                                        $AllBranch = $br->getAllBranchTitle();
                                    if($AllBranch){
                                        foreach($AllBranch as $branch){
                                ?>
                                <option><?php echo $branch['title'];?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="subcategory">Choose Sub-category:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="subcategory" id="subcategory">
                                <option value="0">--Select Sub-category--</option>
                                <?php
                                    $AllSubCat = $sc->readSubCategory();
                                    if($AllSubCat){
                                        foreach($AllSubCat as $subcat){
                                ?>
                                <option value="<?php echo $subcat['subcategory_id'];?>"><?php echo $subcat['subcategory_name'];?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="short_des">Short Description<br><span style="font-size:80%;color:red;">(one sentence):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="short_des" id="short_des" placeholder="Short Description...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="brand">Brand:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="brand" id="brand" placeholder="Brand Name...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="price">Price:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="price" id="price" placeholder="Enter Price...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="long_des">Specifications<br><span style="font-size:80%;color:red;">(seperated by comma):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea rows="5" type="text" name="long_des" id="long_des" placeholder="Long Description..."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="warranty">Warranty:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="warranty" id="warranty">
                                <option>No</option>
                                <option>6 Months</option>
                                <option>1 Year</option>
                                <option>2 Years</option>
                                <option>3 Years</option>
                                <option>4 Years</option>
                                <option>5 Years</option>
                                <option>6 Years</option>
                                <option>7 Years</option>
                                <option>8 Years</option>
                                <option>9 Years</option>
                                <option>10 Years</option>
                                <option>Lifetime</option>
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Upload Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img id="uploadPreview" style="width: 100%; height: 300px;" />
                            <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required><br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="type">Product Type <br><span style="font-size:80%;color:red;">(Featured Product will show in Home Page):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="type" id="type">
                                <option>Non-Featured</option>
                                <option>Featured</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Add Product">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
    </div>
<?php include 'include/footer.php';?> 