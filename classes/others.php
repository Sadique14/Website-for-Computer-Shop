<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class others{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function getAllSliders(){
            $query="SELECT * FROM advertisement";
            $result = $this->db->readAllData($query); 
            return $result;
        }
        public function addSlider($file, $slideNumber, $admin_id)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "resources/sliders/".$unique_image;
            if(empty($file_name))
            {
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else
            {
                $query = "SELECT image FROM advertisement WHERE id=?";
                $arr = array($slideNumber);
                $result2 = $this->db->select($query, $arr);
                if($result2[0]['image']){
                    $uploaded_image = $result2[0]['image'];
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE advertisement SET image=?,admin_id=? WHERE id=?";
                    $arr = array($uploaded_image, $admin_id, $slideNumber);
                    $result = $this->db->updateDelete($query, $arr);
                }
                else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO advertisement (id,image,admin_id) VALUES(?,?,?)";
                    $arr = array($slideNumber, $uploaded_image, $admin_id);
                    $result = $this->db->insertData($query, $arr);
                }
                
                if($result){   
                    $msg = "<span class='success'>Slider updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }

        public function addLink($data)
        {
            $press = $this->fm->validation($data['press']);
            $app = $this->fm->validation($data['app']);
            $query = "UPDATE links SET press=?,app=? WHERE id=?";
            $arr=array($press,$app,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>Links inserted successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function readLink()
        {
            $query = "SELECT * FROM links";
            $result = $this->db->readAllData($query);
            return $result;
        }
        public function addcopyright($data)
        {
            $copyright = $this->fm->validation($data['copyright']);
            $query = "UPDATE links SET copyrightInfo=? WHERE id=?";
            $arr=array($copyright,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>Copyright Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addAboutUs($data)
        {
            $aboutUs = $this->fm->validation($data['aboutUs']);
            $query = "UPDATE links SET aboutUS=? WHERE id=?";
            $arr=array($aboutUs,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>About Us Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addEmail($data)
        {
            $email = $this->fm->validation($data['email']);
            $query = "UPDATE links SET email=? WHERE id=?";
            $arr=array($email,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>Email Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addTelephone($data)
        {
            $telephone = $this->fm->validation($data['telephone']);
            $query = "UPDATE links SET telephone=? WHERE id=?";
            $arr=array($telephone,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>Telephone Number Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addTitle($data)
        {
            $title = $this->fm->validation($data['title']);
            $query = "UPDATE links SET title=? WHERE id=?";
            $arr=array($title,1);
            $result = $this->db->updateDelete($query,$arr);
            if($result)
            {
                $msg = "<span class='success'>Title Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function getOptions(){
            $query = "SELECT * FROM links WHERE id=?";
            $arr = array(1);
            $result = $this->db->select($query,$arr);
            return $result;
        }
        public function getLogo(){
            $query = "SELECT logo,support FROM links WHERE id=?";
            $arr = array(1);
            $result = $this->db->select($query,$arr);
            return $result;
        }

         public function addLogo($file, $type)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "resources/sliders/".$unique_image;
            if(empty($file_name))
            {
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else
            {
                if($type=='LOGO')
                    $query = "SELECT logo FROM links WHERE id=?";
                else if($type=='SUPPORT')
                    $query = "SELECT support FROM links WHERE id=?";
                $arr = array(1);
                $result2 = $this->db->select($query, $arr);
                if($type=='LOGO' && $result2[0]['logo']){
                    $uploaded_image = $result2[0]['logo'];
                }
                if($type=='SUPPORT' && $result2[0]['support']){
                    $uploaded_image = $result2[0]['support'];
                }
                move_uploaded_file($file_temp, $uploaded_image);
                if($type=='LOGO')
                    $query = "UPDATE links SET logo=? WHERE id=?";
                else if($type=='SUPPORT')
                    $query = "UPDATE links SET support=? WHERE id=?";
                $arr = array($uploaded_image, 1);
                $result = $this->db->updateDelete($query, $arr);
                if($result){   
                    //header('Location: logo&support.php');
                    //exit();
                    $msg = "<span class='success'>updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
    }
?>