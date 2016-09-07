<?php
    require_once '../library/database.php';
    require_once '../helpers/format.php';
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
            if(empty($name)){
                $msg = "<span class='error'>Category field must not be empty</span>";
                return $msg;
            }
            else{
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
            
        }
    }
?>