<a href="index.php">Return to Testers</a>
<?php
include('..\class_lib\DB_Access.php');

print("<h3>");
$DB_Access = new DB_Access(); 

$DB_Result = $DB_Access->showTables();
$rValue = "List of all the tables in the database: <br />";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value <br />";
			}
		}
print($rValue);

print("<hr />");

print('<br/>');

$table = "cakes";
$DB_Result = $DB_Access->displayRecords($table);
$rValue = "List of Records from " . $table . " table<br />";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
			$rValue = $rValue . "<br />";
		}
print($rValue);


print('<br/>');

$table = "cookies";
$DB_Result = $DB_Access->displayRecords($table);
$rValue = "List of Records from " . $table . " table<br />";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
			$rValue = $rValue . "<br />";
		}
print($rValue);

print('<br/>');

$table = "cupcakes";
$DB_Result = $DB_Access->displayRecords($table);
$rValue = "List of Records from " . $table . " table<br />";
		while($row = $DB_Result->fetch_assoc())
		{ 
			foreach($row as $value)
			{
				$rValue = $rValue . "$value ";
			}
			$rValue = $rValue . "<br />";
		}
print($rValue);

print("</h3>");
?>
