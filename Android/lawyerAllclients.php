				<?php
mysql_connect("localhost","root","root") or  die(mysql_error());
mysql_select_db("mlmw");
$id=$_GET['lawyer_id'];
$sql=mysql_query("select * from lawyers_has_clients lhc,clients c where	  
		lhc.clients_client_id=c.client_id
		and lawyers_lawyer_id='$id'");
while($row=mysql_fetch_assoc($sql))
$output[]=$row;
print(json_encode($output));
mysql_close();
?>