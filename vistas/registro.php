

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  	<meta http-equiv="cache-control" content="no-cache">
  	<meta http-equiv="expires" content="-1">
  	<meta http-equiv="pragma" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link href="../estilos/css/fuente.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../estilos/css/styles.css" />
    <script type="text/javascript" src="../estilos/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../estilos/js/operaciones.js"></script>
	

    <link rel="stylesheet" href="../estilos/css/estilo.css" type="text/css">
	<script src="../estilos/js/html5shiv.min.js"></script>
    <script src="../estilos/js/respond.min.js"></script>

	<title>Registro</title>
</head>

   
</head>
<body>

	<section class="container">
			<section class="login-form">
				<div class="panel panel-default">
					<div class="panel-heading">REGISTRO</div>
					<div class="panel-body">
						<div id="mensaje"></div>
					    <form method="post" action="../controladores/registroController.php" role="registro">
						
        					<input type="text" class="form-control input-lg" placeholder="Usuario" title="Ingrese usuario" name="usuario" id="usuario" minlength="5" maxlength="15" required >
							<br>

        					<input type="password" class="form-control input-lg" placeholder="Password" title="Ingrese password" name="password" id="password" minlength="5" maxlength="15" required>
							<br>

							<input type="password" class="form-control input-lg" placeholder="Repetir password" title="Repite password" name="password2" id="password2" minlength="6" maxlength="15" required>
							<br>
        					
							<input type="text" class="form-control input-lg" name="nombre" minlength="3" title="Ingrese nombre" placeholder="Nombre" id="nombre" maxlength="20" required>
							<br>
							
							
							<select id="usr_status" name="usr_status" class="{required:true} span3">
								<option value="">Seleccione Una Opción</option>
								<option value="Activo">Activo</option>
								<option value="Suspendido">suspendido</option>	        	
							</select>
							<br>

							 <input type="hidden" name="registro" value="1">
							<button id="boton2" class="btn btn-lg btn-info btn-block">Registrarse</button>
							
							<div class="form-links">
								
								<span class="glyphicon glyphicon-user text-primary"></span> <a href="../index.php">Volver al Login</a>
							</div>
							
						</form>
					</div>
				</div>
				
				
				
			</section>
	</section>
	
	
	<script src="../estilos/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
