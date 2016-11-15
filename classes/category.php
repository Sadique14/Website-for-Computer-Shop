<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class category{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addCat($name){
            $name = $this->fm->validation($name);
               $msg = "<span class='error'>Category field must not be empty</span>";
              if(empty($name)){
               return $msg;
            }
            else{
                $query = "SELECT category_name FROM category";
                $res = $this->db->readAllData($query);
                $temp = 0;
                foreach ($res as $rr) {
                    if($rr['category_name'] == $name)
                        $temp = 1;
                }
                if($temp == 0){
                    $query = "INSERT INTO category (category_name) VALUES(?)";
                    $arr = array($name);
                    $result = $this->db->insertData($query, $arr);
                    if($result){   
                        header('Location: addCategory.php');
                        //$msg = "<span class='success'>Category inserted successfully</span>";
                        //return $msg;
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                        return $msg;
                    }
                }
                else {
                    $msg = "<span class='error'>Category already exists</span>";
                    return $msg;
                }
            }
            
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
                $query = "SELECT * FROM sub_category WHERE category_id=?";
                $arr=array($id);
                $result2 = $this->db->select($query, $arr);
                if(!$result2)
                {
                    $query = "DELETE FROM category WHERE category_id=?";
                    $arr=array($id);
                    $result = $this->db->updateDelete($query, $arr);
                    if($result){
                        $msg = "<span class='success'>Category deleted successfully</span>";
                        return $msg;
                    }
                }
                else
                {
                    $msg = "<span class='error'>Failed. The category has subcategory. Delete subcategory first.</span>";
                    return $msg;
                }
            }
            else if($type=='subcategory'){
                $query = "SELECT title FROM products WHERE subcategory_id=?";
                $arr=array($id);
                $result = $this->db->select($query, $arr);
                if(!$result){
                    $query = "DELETE FROM sub_category WHERE subcategory_id=?";
                    $arr=array($id);
                    $result2 = $this->db->updateDelete($query, $arr);
                    $msg = "<span class='success'>Subcategory deleted successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed. The subcategory has products.</span>";
                    return $msg;
                }
            $msg = "<span class='error'>Delete Failed</span>";
            return $msg;
                }
        }
    }
?>