<?php
class DatabaseConnection
{
	public function  __construct()
    {
		global $pdo;
        $servername = "localhost";
        $username = "root";
        $password = "";
        try{
            $pdo = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
        }
        catch(PDOException $e)
        {
            exit('Database error');
        }
    }
}
?>