<?php
    require_once '../library/database.php';
    require_once '../helpers/format.php';
?>

<?php
    class adminLogin{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addAdmin($email,$password,$branch){
            $adminEmail = $this->fm->validation($email);
            $adminPassword = $this->fm->validation($password);
            
            if(empty($adminEmail) || empty($adminPassword) || $branch == "0"){
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }
            else{
                $query = "select * from admin where email=?";
                $arr = array($adminEmail);
                $result = $this->db->select($query, $arr);
                if($result != false){
                    $msg = "<span class='error'>Admin already exists</span>";
                }
                else{
                    $query = "INSERT INTO admin (email,password,level) VALUES(?,?,?)";
                    $arr = array($adminEmail,$adminPassword,1);
                    $result = $this->db->insertData($query, $arr);
                    $query = "SELECT id FROM admin WHERE email=?";
                    $arr = array($adminEmail);
                    $admin_id = $this->db->select($query, $arr);
                    $query = "UPDATE branches SET admin_id=? WHERE title=?";
                    $arr = array(intval($admin_id[0]['id']),$branch);
                    $result2 = $this->db->updateDelete($query, $arr);
                    if($result && $result2){
                        $msg = "<span class='success'>New Admin inserted</span>";
                        //send email to new admin with password
                        /*try{
                            $headers =  'MIME-Version: 1.0' . "\r\n"; 
                            $headers .= 'From: Admin <ranok14@yahoo.com>' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                            $text = "AAS Computer.<br>Your email: ".$adminEmail."<br>Your Password: ".md5($adminPassword);
                            mail($adminEmail, "New Admin", $text, $headers);
                            $msg = "<span class='success'>New Admin inserted and email sent</span>";
                        }
                        catch(Exception $el){
                            $msg = "<span class='success'>New Admin inserted</span>";
                        }*/  
                    }
                }
                return $msg;
            }
        }
        public function changePassword($email,$oldpassword,$password)
        {
            $adminEmail = $this->fm->validation($email);
            $adminPassword = $this->fm->validation($password);
            $adminoldPassword = $this->fm->validation($oldpassword);
            
            if(empty($adminEmail) || empty($adminPassword) || empty($adminoldPassword)){
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }
            else{
                $query = "select * from admin where email=? and password=?";
                $arr = array($adminEmail,$adminoldPassword);
                $result = $this->db->select($query, $arr);
                if($result == true){
                    $query = "UPDATE admin SET password=? WHERE email=?";
                    $arr = array($adminPassword,$adminEmail);
                    $result = $this->db->updateDelete($query, $arr);
                    if($result == true){
                        $msg = "<span class='success'>Password Change Successfull</span>";
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                    }
                return $msg;
            }
            $msg = "<span class='error'>Old Password not match.</span>";
            return $msg;
        }
    }

    public function getAdmins(){
            $query="SELECT * FROM admin WHERE level=?";
            $arr=array(1);
            $result = $this->db->select($query,$arr);
            return $result;
        }

        public function deleteAdmin($id){
             if($id== "0"){
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }

            $query="SELECT image FROM advertisement WHERE admin_id=?";
            $arr = array($id);
            $result = $this->db->select($query,$arr);
            if($result)
            {
                foreach ($result as $value) {
                    $file = '../admin/'.$value['image'];
                    unlink($file);
                }
                

                $query="DELETE FROM advertisement WHERE admin_id=?";
                $arr=array($id);
                $result4 = $this->db->updateDelete($query,$arr); 
             }

             $query="UPDATE branches SET admin_id=NULL WHERE admin_id=?";
            $arr=array($id);
            $result4 = $this->db->updateDelete($query,$arr); 

            $query="DELETE FROM admin WHERE id=?";
            $arr=array($id);
            $result4 = $this->db->updateDelete($query,$arr); 
            $msg = "<span class='success'>Delete Successfull.</span>"; 
            //echo $admin_id;
            return $msg;
            
        }
}
?>