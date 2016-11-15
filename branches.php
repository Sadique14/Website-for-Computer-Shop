<?php include 'include/header.php'; ?>
<?php
$br = new branch();
$b = $br->getAllBranch();
?>
  <hr class="straight">
  <section class="details">
            <div class="row">
                <div class="col span-3-of-3">
                    <div class="box">
                        <ul>
                        <?php if($b){foreach ($b as $bn) { ?>
                            <li><b><?php echo $bn['title']; ?></b><br>
                            <b><?php echo $bn['address']; ?></b><br>
                            <b><?php echo $bn['phone1']; ?></b><br>
                            <b><?php echo $bn['phone2']; ?></b></li>
                             <?php }} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <hr width="100%">
<?php include 'include/footer.php'; ?>