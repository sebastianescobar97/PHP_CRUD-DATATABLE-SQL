<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <?php include("header.php");?>
    </head>
    <body>


            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['txtNombre'], ENT_QUOTES)));
				$apellido  	= mysqli_real_escape_string($conn,(strip_tags($_POST['txtApellido'], ENT_QUOTES)));
				$sexo  = mysqli_real_escape_string($conn,(strip_tags($_POST['txtSexo'], ENT_QUOTES)));
        $estadoCivil = mysqli_real_escape_string($conn,(strip_tags($_POST['txtEstadoCivil'], ENT_QUOTES)));

				$insert = mysqli_query($conn, "INSERT INTO personas(id, nombre, apellido, sexo, estadoCivil)
															VALUES(NULL,'$nombre', '$apellido', '$edad', '$sexo', '$estadoCivil')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}

			}
			?>

      <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"></i>Operación Crud con Datatable</h3>

                        </div>

                        <div class="panel-body">

            <blockquote>
            Agregar Persona
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="nombres">Nombre</label>
											<div class="controls">
												<input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre" class="form-control span8 tip" required>
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="apellido">Apellido</label>
											<div class="controls">
												<input type="text" name="txtApellido" id="txtApellido" placeholder="Apellidoe" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="sexo">sexo</label>
											<div class="controls">
												<select name="txtSexo" id="txtSexo" class="form-control span8 tip" required>
                          <option value="">Seleccionar</option>
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                          <option value="Otro">Otro</option>
                        </select>
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="estadoCivil">Estado Civil</label>
											<div class="controls">
												<select name="txtEstadoCivil" id="txtEstadoCivil" class="form-control span8 tip" required>
                          <option value="">Seleccionar</option>
                          <option value="Soltero/a">Soltero/a</option>
                          <option value="Casado/a">Casado/a</option>
                          <option value="Separado/a">Separado/a</option>
                        </select>
											</div>
										</div>



										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->

        <!--/.wrapper--><br />


        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
