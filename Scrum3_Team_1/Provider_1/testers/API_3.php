<?php
include('../class_lib/DB_Access.php');
include('../class_lib/BakedGood.php');

$DB_Access = new DB_Access(); 

$table = $_REQUEST['tableName'];
$action = $_REQUEST['action'];

if ($action == 'add')
{
  $id = $_REQUEST['id'];
  $name = $_REQUEST['name'];
  $flavor = $_REQUEST['flavor'];
  $price = $_REQUEST['price'];
  $cookTime = $_REQUEST['cookTime'];
  $Bakedgood = new BakedGood($id, $name, $flavor, $price, $cookTime);

  print(json_encode($DB_Access->addItem($Bakedgood, $table)));
}

if ($action == 'edit')
{
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $flavor = $_REQUEST['flavor'];
    $price = $_REQUEST['price'];
    $cookTime = $_REQUEST['cookTime'];
    $Bakedgood = new BakedGood($id, $name, $flavor, $price, $cookTime);

    print(json_encode($DB_Access->updateItem($Bakedgood, $table)));
}

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
$id = $_REQUEST['id'];
print(json_encode($DB_Access->deleteItem($id,$table)));
}

?>