<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class product{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addProduct($data, $file){
            $product_id = $this->fm->validation($data['product_id']);
            $title = $this->fm->validation($data['title']);
            $subcategory_id = $this->fm->validation($data['subcategory']);
            $short_des = $this->fm->validation($data['short_des']);
            $long_des = $this->fm->validation($data['long_des']);
            $warranty = $this->fm->validation($data['warranty']);
            $type = $this->fm->validation($data['type']);
            $brand = $this->fm->validation($data['brand']);
            $price = $this->fm->validation($data['price']);
            $branchTitle = $this->fm->validation($data['branch']);

            //image validation
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            
            
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "resources/uploads/".$unique_image;
               
            if(empty($product_id)||empty($title)||empty($subcategory_id)||empty($short_des)||empty($long_des)||empty($warranty)||empty($type)||empty($brand)||empty($price)||empty($file_name)||$subcategory_id=="0"){
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            elseif ($file_size >1048567) {
             echo "<span class='error'>Image Size should be less then 1MB!
             </span>";
            } elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else{
                $query = "SELECT title FROM products";
                $getTitle = $this->db->readAllData($query);
                $flag = 0;
                if($getTitle){
                foreach ($getTitle as $gt) {
                    if($gt['title'] == $title)
                        $flag = 1;
                }
            }
                if($flag == 0){
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO products (product_id,title,image,price,brand,short_des,long_des,warranty,type,subcategory_id) VALUES(?,?,?,?,?,?,?,?,?,?)";
                $arr=array($product_id,$title,$uploaded_image,$price,$brand,$short_des,$long_des,$warranty,$type,$subcategory_id);

                $result = $this->db->insertData($query, $arr);

                $query = "INSERT INTO under (br_title,product_id) VALUES(?,?)";
                $arr=array($branchTitle,$product_id);
                $result2 = $this->db->insertData($query, $arr);
                $query = "UPDATE under SET quantity=quantity+1 WHERE br_title=? AND product_id=?";
                $arr=array($branchTitle,$product_id);
                $result3 = "0";
                $result3 = $this->db->updateDelete($query, $arr);

                $bran = new branch();
                $allBranchTitle = $bran->getAllBranchTitle();
                if($allBranchTitle){
                    foreach ($allBranchTitle as $b) {
                        if($b['title'] != $branchTitle){
                            $query = "INSERT INTO under (br_title,product_id) VALUES(?,?)";
                            $arr=array($b['title'],$product_id);
                            $result4 = $this->db->insertData($query, $arr);
                        }
                    }
                }
                if($result && $result2 && $result3){   
                     //header('Location: addCategory.php');
                    $msg = "<span class='success'>Product inserted successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
             }
             else{
                $msg = "<span class='error'>Product already Exists</span>";
                return $msg;
             }
            }
        }
        public function updateProduct($data, $file, $OldProduct_id)
        {
            $title = $this->fm->validation($data['title']);
            $subcategory_id = $this->fm->validation($data['subcategory']);
            $short_des = $this->fm->validation($data['short_des']);
            $long_des = $this->fm->validation($data['long_des']);
            $warranty = $this->fm->validation($data['warranty']);
            $type = $this->fm->validation($data['type']);
            $brand = $this->fm->validation($data['brand']);
            $price = $this->fm->validation($data['price']);

            $query = "SELECT image FROM products WHERE product_id=?";
            $arr = array($OldProduct_id);
            $result = $this->db->select($query, $arr);
            $imageName = $result[0]['image'];
            //image validation
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            if($imageName == null)
            {
                $imageName = "resources/uploads/".$unique_image;
            }

             if(empty($title)||empty($subcategory_id)||empty($short_des)||empty($long_des)||empty($warranty)||empty($type)||empty($brand)||empty($price)||$subcategory_id=="0"){
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else{
                    if(empty($file_name)){
                        $query = "UPDATE products SET title=?,price=?,brand=?,short_des=?,long_des=?,warranty=?,type=?,subcategory_id=? WHERE product_id=?";
                        $arr=array($title,$price,$brand,$short_des,$long_des,$warranty,$type,$subcategory_id,$OldProduct_id);
                        $result = $this->db->updateDelete($query, $arr);
                    }
                    else
                    {
                        if ($file_size >1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                        } 
                        else if (in_array($file_ext, $permited) === false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";                    //Join array elements with a string
                        }
                        else{
                            move_uploaded_file($file_temp, $imageName);     //The move_uploaded_file() function moves an uploaded file to a new location.
                            $query = "UPDATE products SET title=?,image=?,price=?,brand=?,short_des=?,long_des=?,warranty=?,type=?,subcategory_id=? WHERE product_id=?";
                            $arr=array($title,$imageName,$price,$brand,$short_des,$long_des,$warranty,$type,$subcategory_id,$OldProduct_id);
                            $result = $this->db->updateDelete($query, $arr);
                        }
                    }
                   // echo "jj".$OldProduct_id."jj";
                        
                    if($result){   
                         //header('Location: addCategory.php');
                        $msg = "<span class='success'>Product Updated successfully</span>";
                        return $msg;
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                        return $msg;
                    }
                }
        }
        public function getAllProducts(){
            $query = "select * from products";
            $result = $this->db->readAllData($query);
            return $result;
        }
        public function getProductById($product_id){
            $query = "SELECT * from products WHERE product_id=?";
            $arr = array($product_id);
            $result = $this->db->select($query,$arr);
            return $result;           
        }
        public function searchProductByIdTitle($key){
            $query = "SELECT * FROM products WHERE product_id LIKE ? OR title LIKE ?";
            $arr = array("%$key%","%$key%");
            $result = $this->db->select($query,$arr);
            return $result;           
        }
        public function getProductQuantityByBranch($br_title,$product_id){
            $query = "select quantity from under where br_title=? and product_id=?";
            $arr = array($br_title,$product_id);
            $result = $this->db->select($query,$arr);
            if($result != null)
                return $result;
            else
                return "0";             
        }
        public function getTotalProductQuantity($product_id){
            $query = "select quantity from under where product_id=?";
            $arr = array($product_id);
            $result = $this->db->select($query,$arr);
            $totalQuantity = 0;
            foreach ($result as $r) {
                $totalQuantity = $totalQuantity+$r['quantity'];
            }
            return $totalQuantity;
        }
        public function updateName($id,$name,$type){
            $name = $this->fm->validation($name);
            $msg = "<span class='error'>Category field must not be empty</span>";
            if(empty($name)){
               return $msg;
            }
            else{
                $msg = "<span class='success'>Category inserted successfully</span>";
                if($type=='category'){
                    $query = "UPDATE category SET category_name=? WHERE category_id=?";
                    $arr = array($name,$id);
                    $result = $this->db->updateDelete($query, $arr);
                    if($result){   
                    //header('Location: edit.php');
                    
                    return $msg;
                }
                }
                else if($type=='subcategory'){
                    $query = "UPDATE sub_category SET subcategory_name=? WHERE subcategory_id=?";
                    $arr = array($name,$id);
                    $result = $this->db->updateDelete($query, $arr);
                    if($result){   
                    //header('Location: edit.php');
                    
                    return $msg;
                }
                }
                
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
        public function deleteName($id,$type){
            if($type=='category'){
                $query = "DELETE FROM sub_category WHERE category_id=?";
                $arr=array($id);
                $result2 = $this->db->updateDelete($query, $arr);
                $query = "DELETE FROM category WHERE category_id=?";
                $arr=array($id);
                $result = $this->db->updateDelete($query, $arr);
                if($result=true && $result2==true){
                    $msg = "<span class='success'>Delete category and it's subcategory successfull</span>";
                    return $msg;
                }
            }
            else if($type=='subcategory'){
                $query = "DELETE FROM sub_category WHERE subcategory_id=?";
                $arr=array($id);
                $result = $this->db->updateDelete($query, $arr);
                if($result){
                    $msg = "<span class='success'>Delete subcategory successfull</span>";
                    return $msg;
                }
            }
            $msg = "<span class='error'>Delete Failed</span>";
            return $msg;
        }
        public function getProductsByType($type){
            $query = "SELECT * FROM products WHERE type=?";
            $arr=array($type);
            $result = $this->db->select($query, $arr);
            return $result;
        }
        public function getProductsByCategory($category_id,$limit,$offset,$sort){
            if($sort=='low-to-high')
                $query = "SELECT * FROM products,sub_category where sub_category.category_id=:category_id AND sub_category.subcategory_id=products.subcategory_id order by price LIMIT :limit OFFSET :offset";
            else if($sort=='high-to-low')
                $query = "SELECT * FROM products,sub_category where sub_category.category_id=:category_id AND sub_category.subcategory_id=products.subcategory_id order by price desc LIMIT :limit OFFSET :offset";
            else if($sort=='name')
                $query = "SELECT * FROM products,sub_category where sub_category.category_id=:category_id AND sub_category.subcategory_id=products.subcategory_id order by title LIMIT :limit OFFSET :offset";
            else if($sort=='default')
                $query = "SELECT * FROM products,sub_category where sub_category.category_id=:category_id AND sub_category.subcategory_id=products.subcategory_id LIMIT :limit OFFSET :offset";
            global $pdo;
            $temp=$pdo->prepare($query);
            $temp->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $temp->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $temp->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $temp->execute() or die(print_r($temp->errorInfo()));
            if($temp->rowCount()>0){
                return $temp->fetchAll(PDO::FETCH_ASSOC );
            }
            else{
                return false;
            }
        }
        public function getProductsBySubcategory($subcategory_id,$limit,$offset,$sort){
            if($sort=='low-to-high')
                $query = "SELECT * FROM products where subcategory_id=:subcategory_id order by price LIMIT :limit OFFSET :offset";
            else if($sort=='high-to-low')
                $query = "SELECT * FROM products where subcategory_id=:subcategory_id order by price desc LIMIT :limit OFFSET :offset";
            if($sort=='name')
                $query = "SELECT * FROM products where subcategory_id=:subcategory_id order by title LIMIT :limit OFFSET :offset";
            if($sort=='default')
                $query = "SELECT * FROM products where subcategory_id=:subcategory_id LIMIT :limit OFFSET :offset";
            global $pdo;
            $temp=$pdo->prepare($query);
            $temp->bindValue(':subcategory_id', $subcategory_id, PDO::PARAM_INT);
            $temp->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $temp->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $temp->execute() or die(print_r($temp->errorInfo()));
            if($temp->rowCount()>0){
                return $temp->fetchAll(PDO::FETCH_ASSOC );
            }
            else{
                return false;
            }
        }
        public function productCountByCategory($category_id){
            $query = "SELECT count(product_id) FROM products,sub_category where sub_category.category_id=? AND sub_category.subcategory_id=products.subcategory_id";
            $arr = array($category_id);
            $result = $this->db->select($query, $arr);
            return $result;
        }
        public function productCountBySubcategory($subcategory_id){
            $query = "SELECT count(product_id) FROM products where subcategory_id = ?";
            $arr = array($subcategory_id);
            $result = $this->db->select($query, $arr);
            return $result;
        }
        public function productCount($key){
            $query = "SELECT count(product_id) FROM products where title LIKE ? OR brand LiKE ?";
            $arr = array("%".$key."%","%".$key."%");
            $result = $this->db->select($query, $arr);
            return $result;
        }
        public function getProductsBySearch($key,$limit,$offset,$sort){
            if($sort=='low-to-high')
                $query = "SELECT * FROM products where title LIKE :key OR brand LiKE :key order by price LIMIT :limit OFFSET :offset";
            else if($sort=='high-to-low')
                $query = "SELECT * FROM products where title LIKE :key OR brand LiKE :key order by price desc LIMIT :limit OFFSET :offset";
            if($sort=='name')
                $query = "SELECT * FROM products where title LIKE :key OR brand LiKE :key order by title LIMIT :limit OFFSET :offset";
            if($sort=='default')
                $query = "SELECT * FROM products where title LIKE :key OR brand LiKE :key LIMIT :limit OFFSET :offset";
            global $pdo;
            $temp=$pdo->prepare($query);
            $temp->bindValue(':key', "%".$key."%", PDO::PARAM_STR);
            $temp->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $temp->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $temp->execute() or die(print_r($temp->errorInfo()));
            if($temp->rowCount()>0){
                return $temp->fetchAll(PDO::FETCH_ASSOC );
            }
            else{
                return false;
            }
        }
    }
?>