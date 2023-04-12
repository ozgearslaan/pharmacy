<?php 

$db = pg_connect("host='localhost' port='5432' dbname='test' user='postgres' password='gWAs6d23zK6jZjjVZL6n'");
$sql = "SELECT iladi,ilid FROM il";


$result = pg_query($db, $sql);
if(pg_num_rows($result)){

$data=array();
while($row=pg_fetch_array($result))
{ $data[] = array(
'name'=>$row['iladi'],
'id' =>$row['ilid']
);

}

echo  json_encode($data);
}
?>
