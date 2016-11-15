<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class branch{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addBranch($title,$address,$phone1,$phone2){
            $title = $this->fm->validation($title);
            $phone1 = $this->fm->validation($phone1);
            $phone2 = $this->fm->validation($phone2);
            $query="select title from branches where title=?";
            $arr = array($title);
            $re = $this->db->select($query,$arr);
            if($re){
                $msg = "<span class='error'>Branch already exists</span>"; 
               return $msg; 
            }

            if(empty($title) || empty($address) || empty($phone1) || empty($phone2)){     
               $msg = "<span class='error'>field must not be empty</span>"; 
               return $msg;        
            }
            else{
                $query="INSERT INTO branches (title,address,phone1,phone2) VALUES (?,?,?,?)";
                $arr = array($title,$address,$phone1,$phone2);
                $result = $this->db->insertData($query,$arr);

                $query="SELECT distinct product_id from under";
                $r = $this->db->readAllData($query);
                if($r){
                foreach ($r as $rr) {
                    $query="INSERT INTO under (br_title,product_id,quantity) VALUES (?,?,?)";
                    $arr = array($title,$rr['product_id'],0);
                    $result2 = $this->db->insertData($query,$arr);
                }}
                if($result){
                    $msg = "<span class='success'>Branch added successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>"; 
                    return $msg;
                }
            }
        }
        public function getAllBranchByTitle($title){
            $query="SELECT * FROM branches WHERE title=?";
            $arr= array($title);
            $result = $this->db->select($query,$arr); 
            return $result;
        }
        public function getAllBranchTitle(){
            $query="SELECT title FROM branches";
            $result = $this->db->readAllData($query); 
            return $result;
        }
        public function getAllBranchTitleByAdmin($admin_id){
            $query="SELECT title FROM branches WHERE admin_id=?";
            $arr=array($admin_id);
            $result = $this->db->select($query,$arr); 
            return $result;
        }
        public function getAllNullBranchTitle(){
            $query="SELECT title FROM branches WHERE admin_id is NULL";
            $result = $this->db->readAllData($query); 
            return $result;
        }
        public function updateBranch($title,$address,$phone1,$phone2,$oldTitle){
            if($title != $oldTitle){
                $query="select title from branches where title=?";
                $arr = array($oldTitle);
                $re = $this->db->select($query,$arr);
                if($re){
                    $msg = "<span class='error'>Branch title already exists</span>"; 
                   return $msg; 
                }
            }            

            $query="UPDATE branches SET title=?,address=?,phone1=?,phone2=? WHERE title=?";
            $arr=array($title,$address,$phone1,$phone2,$oldTitle);
            $result = $this->db->updateDelete($query,$arr); 
            if($result){
                $msg = "<span class='success'>Update Successfull</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Update Failed</span>"; 
                return $msg;
            }
        }
        public function checkAvailibility($product_id){
            $query="SELECT br_title FROM under WHERE product_id=? AND quantity>0";
            $arr=array($product_id);
            $result = $this->db->select($query,$arr);
            return $result;
        }
        public function getAllBranch(){
            $query="SELECT * FROM branches";
            $result = $this->db->readAllData($query);
            return $result;
       }
       public function deleteBranch($title){
            $query="SELECT admin_id FROM branches WHERE title=?";
            $arr=array($title);
            $result = $this->db->select($query,$arr); 

            $query="DELETE FROM under WHERE br_title=?";
            $arr=array($title);
            $result2 = $this->db->updateDelete($query,$arr); 

            $query="DELETE FROM branches WHERE title=?";
            $arr=array($title);
            $result3 = $this->db->updateDelete($query,$arr);
            if(isset($result[0]['admin_id']) && $result[0]['admin_id']!=NULL){
                $admin_id = $result[0]['admin_id'];

                $query="SELECT image FROM advertisement WHERE admin_id=?";
                $arr = array($admin_id);
                $result = $this->db->select($query,$arr);
                if($result)
                {
                    foreach ($result as $value) {
                        $file = '../admin/'.$value['image'];
                        unlink($file);
                    }
                    

                    $query="DELETE FROM advertisement WHERE admin_id=?";
                    $arr=array($admin_id);
                    $result4 = $this->db->updateDelete($query,$arr); 
                 }

                $query="DELETE FROM admin WHERE id=?";
                $arr=array($admin_id);
                $result4 = $this->db->updateDelete($query,$arr); 
                $msg = "<span class='success'>Delete Successfull.</span>"; 
                //echo $admin_id;
                return $msg;
            }
        }
       
    }
?>