<?php

$db = pg_connect("host='localhost' port='5432' dbname='test' user='postgres' password='gWAs6d23zK6jZjjVZL6n'");



$query = "SELECT ilid,iladi FROM il";

$result = pg_query($query);
if (!$result) {
    echo "Problem with query " . $query . "<br/>";
    echo pg_last_error();
    exit();
}
printf ("<option value='Select'>Select a City</option>");
while($myrow = pg_fetch_assoc($result)) {
    printf ("<option value='".$myrow['ilid']."'>".$myrow['iladi']."</option>");
}
?>