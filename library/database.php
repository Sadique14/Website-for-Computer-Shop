<?php
$filepath = realpath(dirname(__FILE__));
require ($filepath."/../config/config.php");
class database{

    
	function __construct(){
		$Database= new DatabaseConnection(); 
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
    public function updateDelete($query, $arr)
	{
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



 