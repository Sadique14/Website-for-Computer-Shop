<?php include 'include/header.php'; ?>
<?php
  $p = new product();
  $product = $p->getProductsByType('Featured');
  $ad = new others();
  $adv = $ad->getAllSliders();
?>        
        <center><section class="slideshow">
            <div class="slideshow-container">
            <?php if($adv){foreach($adv as $value) {if($value['image']){ ?>
                <div class="mySlides fade">
                  <div class="numbertext"><?php echo $value['id'] ?></div>
                  <img src="admin/<?php echo $value['image']; ?>" class="slideImage">
                </div>
                <?php }}} ?>
            </div>
            <br>
           <div style="text-align:center">
              <span class="dot"></span>
              <span class="dot"></span>
              <span class="dot"></span>
              <span class="dot"></span>
              <span class="dot"></span>
            </div>  
            </section></center>
        <div class="clearfix"></div>                             <!--for clearing float-->
        
        <hr class="straight">
        
        <section class="featured-products">
            <h2>Featured Products</h2>
            
			<div class="product-boxes">    
              <?php if($product){foreach($product as $p){ ?>      
                <div class="box">
                    <img src="admin/<?php echo $p['image']; ?>">
                    <a href="product-detail.php?product_id=<?php echo $p['product_id']; ?>">
                        <h4><?php echo $p['title']; ?></h4>
                    </a>
                    <p>TK. <?php echo $p['price']; ?></p>
                </div>
                <?php }} ?>
                
                </div>
            
            
        </section>
        <hr width="100%">
<?php include 'include/footer.php'; ?>