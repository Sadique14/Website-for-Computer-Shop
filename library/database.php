
<?php
require "../config/config.php";
class database{

    
	function __construct(){
		$Database= new DatabaseConnection(); 
	}
	public function registerNewUser($username,$password,$name,$email,$website){
		global $pdo;
		$query=$pdo->prepare("SELECT id FROM users WHERE username=? AND email=?");
		$query->execute(array($username,$email));
		$num=$query->rowCount();

		if ($num==0) {
			$query=$pdo->prepare("INSERT INTO users (username,password,name,email,website) VALUES(?,?,?,?,?) ");
			$query->execute(array($username,$password,$name,$email,$website));
			return true;
		}else{
			return false;
		}

	}
	public function readAllData($query){
		global $pdo;
		$query=$pdo->prepare($query);
		$query->execute();
        if($query->rowCount()>0){
            return $query->fetchAll(PDO::FETCH_ASSOC );
        }
        else{
            return false;
        }
	}
    
	public function select($query, $arr)
	{
		global $pdo;
		$query=$pdo->prepare($query);
		$query->execute($arr);
		if($query->rowCount()>0){
            return $query->fetchAll(PDO::FETCH_ASSOC );
        }
        else{
            return false;
        }
	}
	public function insertData($query,$arr){
		global $pdo;
        try{
            $query=$pdo->prepare($query);
			$query->execute($arr);
			return true;
        }
        catch(PDOException $e){
            return false;
        }
	}
    
    //...............................


}
?>