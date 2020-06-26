<?php

 include "config.php";

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;


$columns = array(
  	0 => 'id',
    1 => 'nombre',
	  2 => 'apellido',
	  3 => 'sexo',
    4 => 'estadoCivil'
);


$sql = "SELECT id, nombre, apellido, sexo, estadoCivil ";
$sql.=" FROM personas";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // cuando no hay parametros de busqueda el numero de filas = total de numeros filtrados por fila


 if( !empty($requestData['search']['value']) ) {
	// if si encuentra un parametro
	$sql = "SELECT id, nombre, apellido, sexo, estadoCivil";
	$sql.=" FROM personas";
	$sql.=" WHERE nombre LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contiene los parametros de busqueda
	$sql.=" OR apellido LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR sexo LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR estadoCivil LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // cuando hay un parametro de busqueda se debe modificar el numero total filtrado por resultado de busqueda

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");

} else {

	$sql = "SELECT id, nombre, apellido, sexo, estadoCivil ";
	$sql.=" FROM personas";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // se debe preparar un array
	$nestedData=array();

	$nestedData[] = $row["id"];
    $nestedData[] = $row["nombre"];
	$nestedData[] = $row["apellido"];
	$nestedData[] = $row["sexo"];
    $nestedData[] = $row["estadoCivil"];
    $nestedData[] = '<td><center>
                     <a href="editar.php?id='.$row['id'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?action=delete&id='.$row['id'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
				     </center></td>';

	$data[] = $nestedData;

}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),
			"recordsTotal"    => intval( $totalData ),  // numero total de resultados
			"recordsFiltered" => intval( $totalFiltered ), // total de resultados despues de la busqueda
			"data"            => $data   // total de datos
			);

echo json_encode($json_data);  // envia datos en formato json

?>
