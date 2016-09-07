
<section class="col span-1-of-5 sidebar">
    <table>
      <tr>
        <th>Website Options</th>
      </tr>
      <tr>
        <td><a href="#">Title</a></td>
      </tr>
      <tr>
        <td><a href="addCategory.php">Add Catagory</a></td>
      </tr>
        <tr>
        <td><a href="addSubCategory.php">Add Sub-Catagory</a></td>
      </tr>
        <tr>
        <td><a href="category-list.php">Catagory List</a></td>
      </tr>
        <tr>
        <td><a href="#">Add Product</a></td>
      </tr>
        <tr>
        <td><a href="#">Product List</a></td>
      </tr>
        <tr>
        <td><a href="#">Add Slider</a></td>
      </tr>
        <tr>
        <td><a href="#">Slider List</a></td>
      </tr>
        <?php if(session::get('adminLevel')==0){ ?>
        <tr>
    <td><a href="#">Add Branch</a></td>
      </tr>
        <tr>
        <td><a href="#">Branch List</a></td>
      </tr>
      <tr>
        <td><a href="#">Links</a></td>
      </tr>
      <tr>
        <td><a href="#">Copyright</a></td>
      </tr>
      <tr>
        <td><a href="#">About Us</a></td>
      </tr>
        <tr>
        <td><a href="#">Email</a></td>
      </tr>
        <tr>
        <td><a href="#">Telephone</a></td>
      </tr>
        <?php } ?>
    </table>
</section>