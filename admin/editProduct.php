<?php include 'include/header.php';?>
<?php require '../classes/product.php'; ?>       
<?php require '../classes/subCategory.php'; ?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $p = new product();
    $sc=new subCategory();
    if(isset($_GET['id'])){
        $old_id = $_GET['id'];
        session::set('temp_product_id',$_GET['id']);
    }
    $product = $p->getProductById(session::get('temp_product_id'));
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updateButton'])){
        $check = $p->updateProduct($_POST, $_FILES, session::get('temp_product_id'));
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['backButton'])){
        header('Location: productList.php');
        exit();
    }
?>
    <section class="col span-3-of-5 content-body">
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
                            <input type="text" name="product_id" id="product_id" value="<?php echo $product[0]['product_id']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="title">Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="title" id="title" value="<?php echo $product[0]['title']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="subcategory">Choose Sub-category:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="subcategory" id="subcategory">
                                
                                <?php
                                    $AllSubCat = $sc->readSubCategory();
                                    if($AllSubCat){
                                        foreach($AllSubCat as $subcat){
                                ?>
                                <option <?php if($subcat['subcategory_id'] == $product[0]['subcategory_id']){ ?>
                                selected="selected" <?php  } ?>
                                 value="<?php echo $subcat['subcategory_id'];?>"><?php echo $subcat['subcategory_name'];?>
                                 </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="short_des">Short Description<br><span style="font-size:80%;color:red;">(one sentence):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="short_des" id="short_des" value="<?php echo $product[0]['short_des']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="brand">Brand:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="brand" id="brand" value="<?php echo $product[0]['brand']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="price">Price:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="price" id="price" value="<?php echo $product[0]['price']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="long_des">Specifications<br><span style="font-size:80%;color:red;">(seperated by comma):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea rows="5" type="text" name="long_des" id="long_des"><?php echo $product[0]['long_des']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="warranty">Warranty:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="warranty" id="warranty" value="<?php echo $product[0]['warranty']; ?>">
                                <option <?php if("No" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>No</option>
                                <option <?php if("6 Months" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>6 Months</option>
                                <option <?php if("1 Year" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>1 Year</option>
                                <option <?php if("2 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>2 Years</option>
                                <option <?php if("3 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>3 Years</option>
                                <option <?php if("4 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>4 Years</option>
                                <option <?php if("5 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>5 Years</option>
                                <option <?php if("6 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>6 Years</option>
                                <option <?php if("7 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>7 Years</option>
                                <option <?php if("8 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>8 Years</option>
                                <option <?php if("9 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>9 Years</option>
                                <option <?php if("10 Years" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>10 Years</option>
                                <option <?php if("Lifetime" == $product[0]['warranty']){ ?>
                                selected="selected" <?php  } ?>>Lifetime</option>
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Upload Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $product[0]['image']; ?>" height="60px" width="80px">
                            <br>
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="type">Product Type <br><span style="font-size:80%;color:red;">(Featured Product will show in Home Page):</span></label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="type" id="type">
                                <option <?php if("Non-Featured" == $product[0]['type']){ ?>
                                selected="selected" <?php  } ?>>Non-Featured</option>
                                <option <?php if("Featured" == $product[0]['type']){ ?>
                                selected="selected" <?php  } ?>>Featured</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="backButton" value="Back">
                            <input type="submit" name="updateButton" value="Update" onclick="return confirm('Are you sure to Update!');">
                        </div>
                    </div>
                </form>
                    
            </div>
       </section>
</div>
<?php include 'include/footer.php';?> 