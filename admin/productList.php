<?php require '../classes/product.php'; ?>       
<?php include 'include/header.php';?>
         <div class="row main-body">
   <?php include 'include/sidebar.php';?>
<?php
    $p = new product();
    $product = $p->getAllProducts();
    $admin_id = session::get('adminId');
    $adminBranch = session::get("adminBranch");
    
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        if($search!="-100")
            $product = $p->searchProductByIdTitle($search);
    }
    else{
        $search = "-100";
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        trim($_POST['searchBox']);
        $product = $p->searchProductByIdTitle($_POST['searchBox']);
        $search = $_POST['searchBox'];
    }
?>
    <section class="col span-3-of-4 scroll">
        <a class="btn" href="../helpers/refresh.php">Show All Products</a>
        <form style="float: right;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
            Search Products: <input type="text" name="searchBox" placeholder="Search Product..." /><br /> 
            <input type="submit" 
       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
       tabindex="-1" />
        </form> 
        <table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Decrease</th>
            <th>Increase</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    if($product){
        foreach ($product as $pr) {
            if($adminBranch != "0"){
                $quantity = $p->getProductQuantityByBranch($adminBranch,$pr['product_id']);
                if($quantity != "0")
                    $quantity = $quantity[0]['quantity'];
            }
            else{
                $quantity = $p->getTotalProductQuantity($pr['product_id']);
            }
    ?>
        <tr>
            <td><a href="editProduct.php?id=<?php echo $pr['product_id']; ?>"</a><?php echo $pr['product_id']; ?></td>
            <td><?php echo $pr['title']; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php if($adminBranch != "0"){ ?><a href="../helpers/decreaseProduct.php?id=<?php echo $pr['product_id']; ?>&br_title=<?php echo $adminBranch; ?>&search=<?php echo $search; ?>">-1</a><?php } else{ ?><div class="tooltip">-1<span class="tooltiptext">Only for branch admin</span></div><?php } ?></td>
            <td><?php if($adminBranch != "0"){ ?><a href="../helpers/increaseProduct.php?id=<?php echo $pr['product_id']; ?>&br_title=<?php echo $adminBranch; ?>&search=<?php echo $search; ?>">+1</a><?php } else{ ?><div class="tooltip">+1<span class="tooltiptext">Only for branch admin</span></div><?php } ?></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>          
    </section>
</div>
<?php include 'include/footer.php';?> 