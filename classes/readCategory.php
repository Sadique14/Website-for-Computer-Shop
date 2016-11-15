<?php
     $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
?>
<?php
    class readCategory{
        private $db;
        public function __construct(){
            $this->db = new database();
        }
        public function readCat(){
            $query = "select * from category order by category_name";
            $result = $this->db->readAllData($query);
            return $result;
        }
        public function getCatId($name){
            $query = "select * from category where category_name=?";
            $arr=array($name);
            $result = $this->db->select($query,$arr);
            return $result;
        }
        public function readSubCatByCategory($category_id){
            $query = "select * from sub_category where category_id=?";
            $arr = array($category_id);
            $result = $this->db->select($query,$arr);
            return $result;
        }
    }
?>

