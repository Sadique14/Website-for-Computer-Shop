<?php
    require '../library/session.php';
    session::checklogin();                    //login obosthay ache kina check er jonno
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
        public function login($email, $password){
            $adminEmail = $this->fm->validation($email);
            $adminPassword = $this->fm->validation($password);
            
            if(empty($adminEmail) || empty($adminPassword)){
                $msg = "Email or passord must not be empty";
                return $msg;
            }
            else{
                $query = "select * from admin where email=? and password=?";
                $arr = array($adminEmail,$adminPassword);
                $result = $this->db->select($query, $arr);
                if($result != false){
                    $query = "select title from branches where admin_id=?";
                    $arr = array(intval($result[0]['id']));
                    $result2 = $this->db->select($query, $arr);

                    session::set("loginShop",true);
                    session::set("adminId",$result[0]['id']);
                    session::set("adminEmail",$result[0]['email']);
                    session::set("adminLevel",$result[0]['level']);
                    if(result2 != null)
                        session::set("adminBranch",$result2[0]['title']);
                    else
                        session::set("adminBranch","0");
                    header("Location: ../admin/index.php");
                }
                else{
                    $msg = "Email or password not match.";
                    return $msg;
                }
            }
        }
}
?>