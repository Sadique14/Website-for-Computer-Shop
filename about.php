<?php include 'include/header.php'; ?>
<?php
$br = new others();
$b = $br->getOptions();
?>
  <hr class="straight">
  <section class="about">
                        <?php if($b){ ?>
                            <b><?php echo $b[0]['aboutUs']; ?></b>
                             <?php } ?>

        </section>
        <hr width="100%">
<?php include 'include/footer.php'; ?>