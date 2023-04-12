<html>
<head>
<link rel="stylesheet" type="text/css" href="select_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'get',
 url: 'fetch_data.php',
 data: {
 ilid:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>

</head>
<body>
<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
<center>
<div id="select_box">
 <select onchange="fetch_select(this.value);">
  <option>Select City</option>
  <?php

 $db = pg_connect("host='localhost' port='5432' dbname='test' user='postgres' password='gWAs6d23zK6jZjjVZL6n'");



 $query = "SELECT ilid,iladi FROM il";

 $result = pg_query($query);
 if (!$result) {
     echo "Problem with query " . $query . "<br/>";
     echo pg_last_error();
     exit();
 }
 while($myrow = pg_fetch_assoc($result)) {
     printf ("<option value='".$myrow['ilid']."'>".$myrow['iladi']."</option>");
 }
 ?>
 </select>

 <select id="new_select">
 </select>
	  
</div>     
</center>
</body>
</html>