<?php
	require_once '../library/database.php';
    require_once '../helpers/format.php';

    if(isset($_GET['id'])){
    	$db = new database();
        $query="SELECT image FROM advertisement WHERE id=?";
        $arr = array($_GET['id']);
        $result = $db->select($query,$arr);
        if($result)
        {
            $file = '../admin/'.$result[0]['image'];
                if (unlink($file))
               {
                 $query="DELETE FROM advertisement WHERE id=?";
                $arr = array($_GET['id']);
                $result2 = $db->updateDelete($query,$arr);
                 header("Location: ../admin/Slider.php");
                 exit();
               }
              else
              {
                 echo "Sorry... Somethings went wrong";
               }
        }
	}
?>