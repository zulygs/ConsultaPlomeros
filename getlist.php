


<?php
include 'conexion.php';
$q = intval($_GET['q']);
echo($q);
$sql="";
if ($q==1) {
	

$sql="SELECT are_id,are_Nombre from tblareas";
}else{
	$sql="SELECT sect_Id,sect_Nombre from tblSectores order by sect_Id,sect_Codigo";
}
$result = sqlsrv_query($con,$sql);

while($row = sqlsrv_fetch_array($result)) {
	echo "<tr>";
if ($q==1) {
 echo "<td>" . $row['are_id'] . "</td>";
 echo "<td>" . $row['are_Nombre'] . "</td>";
}else{
	 echo "<td>" . $row['sect_Id'] . "</td>";
  echo "<td>" . $row['sect_Nombre'] . "</td>";
}
  
 
  
  echo "</tr>";
}

           
  
             

                



                 
            
sqlsrv_close($con);
?>
</body>
</html>