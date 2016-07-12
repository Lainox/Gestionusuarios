<?php

include_once '../modelo/dbconfig.php';
if(isset($_GET['edit_id']))
{
    $id = $_GET['edit_id'];
    extract($crud->getID($id)); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

    
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="-1">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="../estilos/css/fuente.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../estilos/bootstrap/css/bootstrap.min.css" />
   
    <script type="text/javascript" src="../estilos/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../estilos/js/operaciones2.js"></script>
    

    <link rel="stylesheet" href="../estilos/css/estilo.css" type="text/css">
    <script src="../estilos/js/html5shiv.min.js"></script>
    <script src="../estilos/js/respond.min.js"></script>
    <title>Editar entrada</title>

<body>
<div class="clearfix"></div>



<div class="clearfix"></div><br />

<div class="container">
	<div id="mensaje"></div>
     <form method='post' action='../controlador/editController.php'>
 
    <table class='table table-bordered'>
    <input type="hidden" id="id" value="<?php echo $id; ?>">

        <tr>
            <td>Usuario</td>
            <td><input type='text' name='user' id='user' minlength="6" maxlenght="15" class='form-control' value="<?php echo $user; ?>" required></td>
        </tr>
         <tr>
            <td>Código Adsense</td>
            <td><input type='text' name='client' id='client' minlength="23" maxlenght="23" class='form-control' value="<?php echo $data_ad_client; ?>" required></td>
        </tr>
        
        <tr>
            <td>Estado</td>
           <td>
               <select id="usr_status" name="usr_status" class="form-control">
                <option value="">Seleccione Una Opción</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>              
            </select>
           </td>
            
        </div>
        </tr>
        
 
        
        
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update" id="boton6">
    			<span class="glyphicon glyphicon-edit"></span>  Editar entrada
				</button>
                <a href="../administracion.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
            </td>
        </tr>
 
    </table>
    <a href="../administracion.php">Volver</a>
</form>
     
     
</div>

</body>
</html>