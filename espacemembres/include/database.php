<?php
	
class Database   // nous n'allons pas créer/utiliser d'instance de la class DataBase.
                 // Donc toutes nos attributs et Méthodes seront de type [static] (voir la class Math. vue Prog 2) 
				 // les paramètres static appartiennent à la classe, et NON à une instance de la classe Database.
{	
                 // En Php, quand je suis dans une classe, et que je veux accéder à une propriété qui est static, j'utilise le mot-clé [self::]. Un peu comme [this.] en JavaScript.
				 
	private static $dbHost = "localhost";
	private static $dbName = "garderie";
	private static $dbUser = "root";
	private static $dbUserPassword = "mysql";
	
	private static $connection = null;
	
	public static function connect()
	{
		try
		{
			self::$connection = new PDO("mysql:host=" .self::$dbHost. ";dbname=" .self::$dbName,self::$dbUser,self::$dbUserPassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			//$connection = new PDO('mysql:host=localhost;dbname=store','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return self::$connection;  // je vais recupérer cette ligne me permettant de me connecter et la stocker dans cette variable.
	}
	
	public static function disconnect()
	{
		self::$connection = null;
	}
}
	
//	Database::connect();
	
?>