 <?php 

$cnx=mysqli_connect("localhost","root","","codeigniter");
/*if($cnx){
  echo "conectado";
}
else{
  echo "Fallo";
}*/
    





		$query=("SELECT * from  datos_alumno");




$result=$cnx->query($query);
$row_cnt = $result->num_rows;

if($row_cnt>0){
	
while($row=$result->fetch_assoc()){
//    printf("<input type='text' size='25' id='input_cliente' value='".$row['nombre']."'>");
	$arr['records'][]= $row;

}

echo json_encode($arr); 
}
else{
	echo "error";
}



 ?>