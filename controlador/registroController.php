<?php 

include_once '../modelo/dbconfig.php';
include('../includes/class.Metodos.php');

$metodos = new Metodos();
$user = $_POST['user'];
$pass = hash('sha256', md5($_POST['pass']));
$pass2 = hash('sha256', md5($_POST['pass2']));

$data_ad_client = $_POST['client'];
$nombre = $_POST['nombre'];
$status = $_POST['status'];


$crud->createUser($user,$pass,$pass2,$data_ad_client,$nombre,$status);


 ?>