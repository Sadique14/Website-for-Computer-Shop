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
if($_SERVER['REQUEST_METHOD']=='POST'){
    $key = $_POST['search'];
    $sort = "default";
    $count = $p->productCount($key);
    $count = $count[0]['count(product_id)'];
    $product = $p->getProductsBySearch($key,$limit,$offset,$sort);
    //$name = $_GET['category_name'];
    $type = 2;
}
if(isset($_GET['key']) && isset($_GET['sort'])){
    $sort = $_GET['sort'];
    $key = $_GET['key'];
    $count = $p->productCount($key);
    $count = $count[0]['count(product_id)'];
    $product = $p->getProductsBySearch($key,$limit,$offset,$sort);
    //$name = $_GET['category_name'];
    $type = 2;
}
?>
      <?php $totalPages = ceil(($count/$limit)); ?>  
        <hr class="straight">
        
        <section class="products-list">
            <h3>SEARCH RESULT FOR '<?php echo $key; ?>'</h3>
            <div class="option">
                <label for="sort-by">Sort By: </label>
                <form method="post" action="helpers/sorting.php" class="sorting">
                <select name="sort" id="sort-by" onchange="this.form.submit()">
                     <option value="default" <?php if($sort=='default'){ ?>selected<?php } ?>>Default</option>
                     <option value="name" <?php if($sort=='name'){ ?>selected<?php } ?>>Name</option>
                     <option value="low-to-high" <?php if($sort=='low-to-high'){ ?>selected<?php } ?>>Price &#40;low&#60;high&#41;</option>
                     <option value="high-to-low" <?php if($sort=='high-to-low'){ ?>selected<?php } ?>>Price &#40;high&#62;low&#41;</option>
                </select>
                <?php if($type==2){ ?>
                <input type="hidden" name="key" value="<?php echo $key; ?>"/>
                <input type="hidden" name="type" value="<?php echo $type; ?>"/>
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
            <?php }}else{ ?><p style="color:red;font-size: 40px;text-align: center;margin: 30px auto;">NO Product</p><?php } ?>
            </div>
        </section>
        <hr width="100%">
        <?php if($product){ ?>
        <section class="change-page">
            <ul class="pagination">
            <?php if($type==2){ ?>
              <li><a href="searchResult.php?page=1&key=<?php echo $key; ?>&sort=<?php echo $sort; ?>">First</a></li>
            <?php } ?>
              <?php foreach(range(1, $totalPages) as $page){
                  if($page == $currentPage){ if($type==2){?>
                    <li><a class="active" href="searchResult.php?page=<?php echo $page; ?>&key=<?php echo $key; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } ?>
                <?php }
                else if($page == 1 || $page == $totalPages || ($page >= $currentPage - 1 && $page <= $currentPage + 1)){ if($type==2){ ?>
                    <li><a href="searchResult.php?page=<?php echo $page; ?>&key=<?php echo $key; ?>&sort=<?php echo $sort; ?>"><?php echo $page; ?></a></li>
                    <?php } ?>
               <?php }} ?>
                  
            <?php if($type==2){ ?>
              <li><a href="searchResult.php?page=<?php echo $totalPages; ?>&key=<?php echo $key; ?>&sort=<?php echo $sort; ?>">Last</a></li>
            <?php } ?>
               
            </ul>
        </section>
        <?php } ?>
<?php include 'include/footer.php'; ?>