<?php
    require_once '../library/database.php';
    require_once '../helpers/format.php';
?>
<?php
    class subCategory{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addSubCat($name, $category_id){
            $name = $this->fm->validation($name);
            $category_id = $this->fm->validation($category_id);
            if(empty($name) || empty($category_id)){
                
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }
            else{
                $category_id = (int) $category_id;
                if($category_id>0){
                    $query = "SELECT subcategory_name FROM sub_category";
                    $res = $this->db->readAllData($query);
                    $temp = 0;
                    foreach ($res as $rr) {
                        if($rr['subcategory_name'] == $name)
                            $temp = 1;
                    }
                    if($temp == 0){
                        $query = "INSERT INTO sub_category (subcategory_name,category_id) VALUES(?,?)";
                        $arr = array($name, $category_id);
                        $result = $this->db->insertData($query, $arr);
                        if($result){ 
                            header('Location: addSubCategory.php');
                            //$msg = "<span class='success'>Category inserted successfully</span>";
                            //return $msg;
                        }
                        else{
                            $msg = "<span class='error'>Failed</span>";
                            return $msg;
                        }
                    }
                    else{
                        $msg = "<span class='error'>Subcategory already exists</span>";
                        return $msg;
                    }
                }
                else{
                    $msg = "<span class='error'>Please, select category.</span>";
                    return $msg;
                }
                
                }
            }
            public function readSubCategory(){
            $query = "select * from sub_category";
            $result = $this->db->readAllData($query);
            return $result;
           }
        }
?>