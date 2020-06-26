<?php include "config.php" ?>
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
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM personas WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

      <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"></i>Operación Crud con Datatable</h3>

                        </div>

                        <div class="panel-body">



            <blockquote>
            Actualizar datos de la Persona
            </blockquote>

            <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >

              <div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>


       <div class="control-group">
         <label class="control-label" for="nombres">Nombre</label>
         <div class="controls">
           <input type="text" name="txtNombre" id="txtNombre" placeholder="" class="form-control span8 tip" value="<?php echo $row['nombre']; ?>" required>
         </div>
       </div>

       <div class="control-group">
         <label class="control-label" for="apellido">Apellido</label>
         <div class="controls">
           <input type="text" name="txtApellido" id="txtApellido" placeholder="" value="<?php echo $row['apellido']; ?>" class="form-control span8 tip" required>
         </div>
       </div>

       <div class="control-group">
         <label class="control-label" for="sexo">sexo</label>
         <div class="controls">
           <select name="txtSexo" id="txtSexo" class="form-control span8 tip" placeholder="<?php echo $row['sexo']; ?>" required>

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
             <option value="<?php echo $row['estadoCivil']; ?>"><?php echo $row['estadoCivil']; ?></option>
             <option value="Soltero/a">Soltero/a</option>
             <option value="Casado/a">Casado/a</option>
             <option value="Separado/a">Separado/a</option>
           </select>
         </div>
       </div>



       <div class="control-group">
         <div class="controls">
           <button type="submit" name="update" id="update" class="btn btn-sm btn-primary">Actualizar</button>
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
