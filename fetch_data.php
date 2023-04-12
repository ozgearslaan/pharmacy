<?php
$db = pg_connect("host='localhost' port='5432' dbname='test' user='postgres' password='gWAs6d23zK6jZjjVZL6n'");

$selectedil = $_GET['ilid'];

$query = "SELECT ilceid,ilceadi FROM ilce where ilid = '{$selectedil}'";

$result = pg_query($query);
if (!$result) {
    echo "Problem with query " . $query . "<br/>";
    echo pg_last_error();
    exit();
}
while($myrow = pg_fetch_assoc($result)) {
    printf ("<option value='".$myrow['ilceid']."'>".$myrow['ilceadi']."</option>");
}

?>