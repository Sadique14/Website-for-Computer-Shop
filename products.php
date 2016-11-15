<?php include 'include/header.php'; ?>
<?php
$p = new product();
$limit = 8;
if(!isset($_GET['page'])){
    $currentPage = 1;
}
else{
    $currentPage = (int)$_GET['page'];
}

$offset = ($currentPage - 1) * ($limit);
if(isset($_GET['category_id']) && isset($_GET['category_name']) && isset($_GET['sort'])){
    $sort = $_GET['sort'];
    $count = $p->productCountByCategory($_GET['category_id']);
    $count = $count[0]['count(product_id)'];
    $product = $p->getProductsByCategory($_GET['category_id'],$limit,$offset,$sort);
    $name = $_GET['category_name'];
    $type = 0;
}
else if(isset($_GET['subcategory_id']) && isset($_GET['subcategory_name']) && isset($_GET['sort'])){
    $sort = $_GET['sort'];
    $count = $p->productCountBySubcategory($_GET['subcategory_id']);
    $count = $count[0]['count(product_id)'];
    $product = $p->getProductsBySubcategory($_GET['subcategory_id'],$limit,$offset,$sort);
    $name = $_GET['subcategory_name'];
    $type = 1;
}
else{
    
}
?>
      <?php $totalPages = ceil(($count/$limit)); ?>  
        <hr class="straight">
        
        <section class="products-list">
            <h3><?php echo $name; ?></h3>
            <div class="option">
                <label for="sort-by">Sort By: </label>
                <form method="post" action="helpers/sorting.php" class="sorting">
                <select name="sort" id="sort-by" onchange="this.form.submit()">
                     <option value="default" <?php if($sort=='default'){ ?>selected<?php } ?>>Default</option>
                     <option value="name" <?php if($sort=='name'){ ?>selected<?php } ?>>Name</option>
                     <option value="low-to-high" <?php if($sort=='low-to-high'){ ?>selected<?php } ?>>Price &#40;low&#60;high&#41;</option>
                     <option value="high-to-low" <?php if($sort=='high-to-low'){ ?>selected<?php } ?>>Price &#40;high&#62;low&#41;</option>
                </select>
                <input type="hidden" name="type" value="<?php echo $type; ?>"/>
                <?php if($type==0){ ?>
                <input type="hidden" name="category_id" value="<?php echo $_GET['category_id']; ?>"/>
                <input type="hidden" name="category_name" value="<?php echo $_GET['category_name']; ?>"/>
                <?php }else if($type==1){ ?>
                <input type="hidden" name="subcategory_id" value="<?php echo $_GET['subcategory_id']; ?>"/>
                <input type="hidden" name="subcategory_name" value="<?php echo $_GET['subcategory_name']; ?>"/>
                <?php } ?>
            </form>
            </div>
            <?php if($product){ ?>
            <div class="product-boxes">
            <?php foreach ($product as $pro){ ?>       
                <div class="box">
                    <img src="admin/<?php echo $pro['image']; ?>">
                    <a href="product-detail.php?product_id=<?php echo $pro['product_id']; ?>">
                        <h4><?php echo $pro['title']; ?></h4>
                    </a>
                    <p>TK. <?php echo $pro['price']; ?></p>
                </div>
            <?php }}else{ ?><p style="color:red;font-size: 40px;text-align: center;margin: 30px auto; padding-bottom: 100px;">NO Product</p><?php } ?>
            </div>
        </section>
        <hr width="100%">
        <?php if($product){ ?>
        <section class="change-page">
            <ul class="pagination">
            <?php if($type==0){ ?>
              <li><a href="products.php?page=1&category_id=<?php echo $_GET['category_id']; ?>&category_name=<?php echo $_GET['category_name']; ?>&sort=<?php echo $sort; ?>">First</a></li>
            <?php } else if($type==1){ ?>
                <li><a href="products.php?page=1&subcategory_id=<?php echo $_GET['subcategory_id']; ?>&subcategory_name=<?php echo $_GET['subcategory_name']; ?>&sort=<?php echo $sort; ?>">First</a></li>
            <?php } ?>
              <?php foreach(range(1, $totalPages) as $page){
                  if($page == $currentPage){ if($type==0){?>
                    <li><a class="active" href="products.php?page=<?php echo $page; ?>&category_id=<?php echo $_GET['category_id']; ?>&category_name=<?php echo $_GET['category_name']; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } else if($type==1){ ?>
                        <li><a class="active" href="products.php?page=<?php echo $page; ?>&subcategory_id=<?php echo $_GET['subcategory_id']; ?>&subcategory_name=<?php echo $_GET['subcategory_name']; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } ?>
                <?php }
                else if($page == 1 || $page == $totalPages || ($page >= $currentPage - 1 && $page <= $currentPage + 1)){ if($type==0){ ?>
                    <li><a href="products.php?page=<?php echo $page; ?>&category_id=<?php echo $_GET['category_id']; ?>&category_name=<?php echo $_GET['category_name']; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } else if($type==1){ ?>
                        <li><a href="products.php?page=<?php echo $page; ?>&subcategory_id=<?php echo $_GET['subcategory_id']; ?>&subcategory_name=<?php echo $_GET['subcategory_name']; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } ?>
               <?php }} ?>
                  
            <?php if($type==0){ ?>
              <li><a href="products.php?page=<?php echo $totalPages; ?>&category_id=<?php echo $_GET['category_id']; ?>&category_name=<?php echo $_GET['category_name']; ?>&sort=<?php echo $sort; ?>">Last</a></li>
            <?php } else if($type==1){ ?>
                <li><a href="products.php?page=<?php echo $totalPages; ?>&subcategory_id=<?php echo $_GET['subcategory_id']; ?>&subcategory_name=<?php echo $_GET['subcategory_name']; ?>&sort=<?php echo $sort; ?>">Last</a></li>
            <?php } ?>
               
            </ul>
        </section>
        <?php } ?>
<?php include 'include/footer.php'; ?>