<?php
include_once 'modelo/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  	<meta http-equiv="cache-control" content="no-cache">
  	<meta http-equiv="expires" content="-1">
  	<meta http-equiv="pragma" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="estilos/css/fuente.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="estilos/bootstrap/css/bootstrap.min.css" />
	
    <script type="text/javascript" src="estilos/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="estilos/js/operaciones.js"></script>
	

    <link rel="stylesheet" href="estilos/css/estilo.css" type="text/css">
	<script src="estilos/js/html5shiv.min.js"></script>
    <script src="estilos/js/respond.min.js"></script>

    <title>Lista de entradas</title>
</head>
<body>
	<div class="clearfix"></div>



<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive' id='tabla1'>
     <tr>
    
     <th>Id</th>
     <th>Usuario</th>
     <th>Código Adsense</th>
     <th>Estado</th>
      <th>Acciones</th>
    
    </tr>
     
     <?php
		$query = "SELECT * FROM user_ads";       
		$records_per_page=4;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    
       
 
</table>
    <td colspan="7" align="center">
            <div class="pagination-wrap" id="pagination">
            <?php $crud->paginglink($query,$records_per_page); ?>
            </div>
        </td>
    
       
</div>

<section class="container">
			<section class="login-form">
				<div class="panel panel-default">
					<div class="panel-heading">REGISTRO</div>
					<div class="panel-body">
						<div id="mensaje"></div>
					    <form method="post" action="controlador/registroController.php" role="registro">
						
        					<input type="text" class="form-control input-lg" placeholder="Usuario" minlength="6" maxlenght="15" title="Ingrese usuario" name="usuario" id="usuario" >
							<br>

        					<input type="password" class="form-control input-lg" placeholder="Password" minlength="6" maxlenght="15" title="Ingrese password" name="password" id="password" >
							<br>

							<input type="password" class="form-control input-lg" placeholder="Repetir password" minlength="6" maxlenght="15" title="Repite password" name="password2" id="password2" >
							<br>
        					
        					<input type="text" class="form-control input-lg" name="client" minlength="23" maxlenght="23" title="Ingrese codigo adsense" placeholder="Adsense" id="client" >
							<br>

							<input type="text" class="form-control input-lg" name="nombre" minlength="3" maxlenght="18" title="Ingrese nombre" placeholder="Nombre" id="nombre" >
							<br>
							
							<div class="form-group">
							<select id="usr_status" name="usr_status" class="form-control">
								<option value="">Seleccione Una Opción</option>
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>	        	
							</select>
							</div>
							<br>
							<br>
							
							 <input type="hidden" name="registro" value="1">
							<button id="boton2" class="btn btn-lg btn-info btn-block">Registrar usuario</button>
							
							
						</form>
					</div>
				</div>
				
				
				
			</section>
	</section>
	
</body>
</html>