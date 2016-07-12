<?php
include_once '../modelo/dbconfig.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Eliminar</title>
</head>
<body>
    <div class="clearfix"></div>

<div class="container">

    <?php
    if(isset($_GET['deleted']))
    {
        ?>
        <div class="alert alert-success">
        <strong>Entrada eliminada con éxito</strong> 
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="alert alert-danger">
        <strong>Seguro que quieres eliminar esta entrada?</strong> 
        </div>
        <?php
    }
    ?>  
</div>

<div class="clearfix"></div>

<div class="container">
    
     <?php
     if(isset($_GET['delete_id']))
     {
         ?>
         <table class='table table-bordered'>
         <tr>
         <th>Id</th>
         <th>Usuario</th>
         <th>Nombre</th>
         <th>Estado</th>
         <th>Acciones</th>
         <th></th>
         <tr></tr>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM user_ads WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['user']); ?></td>
             <td><?php print($row['data_ad_client']); ?></td>
             <td><?php print($row['status']); ?></td>
             
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
     }
     ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
    ?>
    <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; SI</button>
    <a href="../administracion.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
    <?php
}
else
{
    ?>
    <a href="../administracion.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Volver</a>
    <?php
}
?>
</p>
</div>  
</body>
</html>

