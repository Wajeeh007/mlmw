<?php
mysql_connect("localhost","root","root") or  die(mysql_error());
mysql_select_db("mlmw");
$sql=mysql_query("select * from lawyers");
while($row=mysql_fetch_assoc($sql))
$output[]=$row;
print(json_encode($output));
mysql_close();
?>