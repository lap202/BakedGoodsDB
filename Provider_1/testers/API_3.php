<?php
include('../class_lib/DB_Access.php');

$DB_Access = new DB_Access(); 

$table = $_REQUEST['tableName'];
$action = $_REQUEST['action'];
$id = $_REQUEST['id'] ?? ''; //Need this to handle nulls

if ($action == 'read')
{
$DB_Result = $DB_Access->displayRecords($table);

$data = array();

$index = 0;
while($row = $DB_Result->fetch_assoc())
{
    $rValue = "";

  foreach($row as $value)
    {
        $rValue = $rValue . "$value|"; //pipe delimmited
    }

  $data[] = $rValue;
}

print(json_encode($data));
}

if ($action == 'delete')
{
print(json_encode($DB_Access->deleteItem($id,$table)));
}

?>