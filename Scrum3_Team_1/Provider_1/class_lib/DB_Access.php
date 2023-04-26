<?php
include('BakedGood.php');
class DB_Access
{
    private static $conn;

    ///////////CONNECTION PROPERTIES///////////
	private static $hostName = "localhost";
	private static $databaseName = "php_crud";
	private static $userName = "root";
	private static $password = "";
    //////////////////////////////////////////

    public function connectTo()
    {
		self::$conn = new mysqli(self::$hostName, self::$userName, self::$password, self::$databaseName );

		if (self::$conn->connect_error)
        {
			return("There Was A Connection Error to " . self::$hostName); //return error
        }

		return("Connection successful to " . self::$hostName . ", databaseName = " . self::$databaseName); //return success
   				
	}
	
	public function showDatabases()
	{	
        self::connectTo();
		$query = "SHOW DATABASES";
		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}
	
	public function showTables()
	{	
        self::connectTo(); 
		$query = "SHOW TABLES FROM " . self::$databaseName;
		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}
	public function displayRecords($tableName)
	{   
        self::connectTo();
		$query = "SELECT * FROM " . $tableName;
		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}

	public function addItem($bakedGood, $table, $test=0)
	{
		$name = $bakedGood->getName();
		$flavor = $bakedGood->getFlavor();
		$price = $bakedGood->getPrice();
		$cookTime = $bakedGood->getCookTime();
		self::connectTo();
		$query = "INSERT INTO " . $table . " (id, name, flavor, price, cooktime) VALUES (NULL, '" . $name . "', '" . $flavor . "', " . $price . ", " . $cookTime . ")";
		
		if($test == 1)
		{
			return $query;
		}
		
		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}

	public function updateItem($bakedGood, $table, $test=0)
	{
		$id = $bakedGood->getId();
		$name = $bakedGood->getName();
		$flavor = $bakedGood->getFlavor();
		$price = $bakedGood->getPrice();
		$cookTime = $bakedGood->getCookTime();
		self::connectTo();
		$query = "UPDATE " . $table . " SET  name = '" . $name . "', flavor = '" . $flavor . "', price = " . $price . ", cooktime = " . $cookTime . " WHERE id = " . $id;
		
		if($test == 1)
		{
			return $query;
		}

		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}
	
	public function deleteItem($id, $table, $test=0)
	{
		self::connectTo();
		$query = "DELETE FROM " . $table . " WHERE id = " . $id;

		if($test == 1)
		{
			return $query;
		}

		$result = mysqli_query (self::$conn, $query);
		self::$conn->close();
		return $result;
	}
	
}

?>