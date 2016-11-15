<?php include 'include/header.php'; ?>
<?php
$br = new others();
$b = $br->getLogo();
?>
  <hr class="straight">
  <center>
 <?php if($b){ ?>
            <img class="supportImg" src="admin/<?php echo $b[0]['support'] ?>" alt="">
            <?php }else{ ?>
            <h3>No support found.</h3>
            <?php } ?>
        </center>
        <hr width="100%">
<?php include 'include/footer.php'; ?>