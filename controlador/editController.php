<?php 

include_once '../modelo/dbconfig.php';
include('../includes/class.Metodos.php');
$metodos = new Metodos();
	
	if($metodos->check_client($_POST['client'])==true AND strlen($_POST['client'])==23)
	{
		if(!is_numeric($_POST['user']) AND (strlen($_POST['user'])>5 AND strlen($_POST['user'])<16))
		{
			
			$id = $_POST['id'];
			$user = $_POST['user']; 
			$client = $_POST['client'];
			$status = $_POST['status'];
			$crud->actualizaEntrada($id,$user,$client,$status);
			
		}
		else
		{
			echo '3';
		}
	}
	else
	{
		echo '2';
	}

	
    
	
	





 ?>