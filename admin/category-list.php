<?php include 'include/header.php';?>
<div class="row main-body">
<?php include 'include/sidebar.php';?>
<?php require '../classes/readCategory.php'; ?>
<?php
$rc = new rCategory();
$allCategory = $rc->readCat();
?>
    <section class="col span-3-of-5 content-body">
        <div class="row tab">
            <h1>Category and Sub-category<br><span style="color:black;font-size:90%;font-weight:300;">(click on the name to edit/delete)</span></h1>
            <table style="width:100%">
            <?php 
            foreach ($allCategory as $category) {
              $index=0;
              $subCategory = $rc->readSubCatByCategory($category['category_id']);
              if($subCategory){
                 $numOfSubCategory = count($subCategory)+1;  //for counting number of rows. array faka thakle count 1 return kore. tai ei condition
               }
                else
                {
                   $numOfSubCategory=1;
                }              
                ?>
                  <tr>
                      <th rowspan="<?php echo $numOfSubCategory; ?>"><a href="edit.php?id=<?php $category['category_id'] ?>&name=<?php $category['category_id'] ?>&type=category"><?php echo $category['category_name']; ?> </a></th>
                  </tr>
                  <?php
                  for ($x = 1; $x < $numOfSubCategory; $x++){ ?>
                  <tr>
                      <td><a href="edit.php?id=<?php $category['category_id'] ?>&name=<?php $category['category_id'] ?>&type=sub-category"><?php echo $subCategory[$index++]['subcategory_name']; ?></a></td>
                  </tr>
                  <?php }} ?>
            </table>
        </div>
    </section>
</div>
<?php include 'include/footer.php';?> 