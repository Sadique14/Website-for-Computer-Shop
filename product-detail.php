<?php include 'include/header.php'; ?>
<?php
$pr = new product();
$br = new branch();
if(isset($_GET['product_id'])){
    
    $p = $pr->getProductById($_GET['product_id']);
    $b = $br->checkAvailibility($_GET['product_id']);
}
?>
        
        <hr class="straight">
        
        <section class="product-detail">
            <h6><?php echo $p[0]['title']; ?></h6>
            <div class="img-box">
                <img id="myImg" src="admin/<?php echo $p[0]['image']; ?>" alt="<?php echo $p[0]['title']; ?>" width="290" height="250">
                <!-- The Modal -->
                <div id="myModal" class="modal">
                  <span class="close">×</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
                </div>
            </div>
            <div class="details">
            <?php if($b){ ?>
                <div class="box2"><p class="name">Available AT: </p><br><p class="value"><?php foreach ($b as $name) {  echo $name['br_title']; ?>.
                     
               <?php } ?> </p></div> <?php } else{ ?>
                <div class="box2"><p class="name">Not available at any branch.</p></div>
                <?php } ?>
                <div class="box2"><p class="name">Price: </p><p class="value">TK <?php echo $p[0]['price']; ?></p></div>
                <div class="box2"><p class="name">Brand: </p><p class="value"><?php echo $p[0]['brand']; ?></p></div>
                <div class="box2"><p class="name">Short Description:</p><br><br><p class="value"><?php echo $p[0]['short_des']; ?></p></div>
                <div class="box2"><p class="name">Long Description:</p><br><br><p class="value"><?php echo $p[0]['long_des']; ?></p></div>
                <div class="box2"><p class="name">Warranty: </p><p class="value"><?php echo $p[0]['warranty']; ?></p></div>
            </div>
        </section>
        <hr width="100%">
<?php include 'include/footer.php'; ?>