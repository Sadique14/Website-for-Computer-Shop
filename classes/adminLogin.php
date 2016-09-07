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
                    session::set("login",true);
                    session::set("adminId",$result[0]['id']);
                    session::set("adminEmail",$result[0]['email']);
                    session::set("adminLevel",$result[0]['level']);
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