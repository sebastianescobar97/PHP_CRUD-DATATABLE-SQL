<?php
include "config.php";
if(isset($_POST['update'])){
	$id	= intval($_POST['id']);
  $nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['txtNombre'], ENT_QUOTES)));
  $apellido  	= mysqli_real_escape_string($conn,(strip_tags($_POST['txtApellido'], ENT_QUOTES)));
  $sexo  = mysqli_real_escape_string($conn,(strip_tags($_POST['txtSexo'], ENT_QUOTES)));
  $estadoCivil = mysqli_real_escape_string($conn,(strip_tags($_POST['txtEstadoCivil'], ENT_QUOTES)));


				$update = mysqli_query($conn, "UPDATE personas SET nombre='$nombre', apellido='$apellido', sexo='$sexo', estadoCivil='$estadoCivil' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
  ?>
