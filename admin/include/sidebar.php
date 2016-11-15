
<section class="col span-1-of-5 sidebar">
    <table>
      <tr>
        <th>Website Options</th>
      </tr>
      <?php if(session::get('adminLevel')==0){ ?>
      <tr>
        <td><a href="title.php">Title</a></td>
      </tr>
      <?php } ?>
      <tr>
        <td><a href="addCategory.php">Add Category</a></td>
      </tr>
        <tr>
        <td><a href="addSubCategory.php">Add Sub-Category</a></td>
      </tr>
        <tr>
        <td><a href="category-list.php">Category List</a></td>
      </tr>
        <tr>
        <td><a href="addProduct.php">Add Product</a></td>
      </tr>
        <tr>
        <td><a href="productList.php">Product List</a></td>
      </tr>
        <tr>
        <td><a href="Slider.php">Slider</a></td>
      </tr>
        <?php if(session::get('adminLevel')==0){ ?>
        <tr>
    <td><a href="addBranch.php">Add Branch</a></td>
      </tr>
        <tr>
        <td><a href="editBranch.php">Edit Branch</a></td>
      </tr>
      <tr>
        <td><a href="links.php">Links</a></td>
      </tr>
      <tr>
        <td><a href="copyright.php">Copyright</a></td>
      </tr>
      <tr>
        <td><a href="aboutUs.php">About Us</a></td>
      </tr>
        <tr>
        <td><a href="email.php">Email</a></td>
      </tr>
        <tr>
        <td><a href="telephone.php">Telephone</a></td>
      </tr>
      <tr>
        <td><a href="logo&support.php">Logo & Support</a></td>
      </tr>
        <?php } ?>
    </table>
</section>