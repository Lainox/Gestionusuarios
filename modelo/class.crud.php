<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;

	}

	public function createUser($user,$pass,$pass1,$data_ad_client,$nombre,$status)
	{   $metodos = new Metodos();
		try
		{
			if($pass == $pass1) {
				$validacion_pass = true;

			} else {

				$validacion_pass = false;
				
			}
				if($validacion_pass) {
					if($metodos->check_client($data_ad_client)==true AND strlen($data_ad_client)==23)
					{
						if(!is_numeric($user) AND strlen($user)>5 AND strlen($user)<16)
						{
							if(!is_numeric($nombre) AND strlen($nombre)>2 AND strlen($nombre)<19)
							{
								if(strlen($pass)>5 AND strlen($pass)<15)
								{
									$consulta = $this->db->prepare("SELECT user from user_ads WHERE user=:user");
									$consulta->bindparam(':user',$user);
									$consulta->execute();
									$consulta2 = $this->db->prepare("SELECT data_ad_client from user_ads WHERE data_ad_client=:data_ad_client");
									$consulta2->bindparam(':data_ad_client',$data_ad_client);
									$consulta2->execute();
									if($consulta->rowCount()>0) {
				
										echo '1';
									} 
		   							else if($consulta2->rowCount()>0)
									{
										echo '8';
									}
									else
									{
										$stmt = $this->db->prepare("INSERT INTO user_ads(data_ad_client,user,nombre,pass,status) VALUES(:data_ad_client,:user,:nombre,:pass,:status)");
										$stmt->bindparam(":user",$user);
										$stmt->bindparam(":pass",$pass);
										$stmt->bindparam(":data_ad_client",$data_ad_client);
										$stmt->bindParam(":nombre",$nombre);
										$stmt->bindparam(":status",$status);
					
										$stmt->execute();
					
										echo '3';
									}
								}
								else
								{
									echo '7';
								}
							}
							else
							{
								echo '6';
							}
						}
						else
						{
							echo '5';
						}	

				  }
				  else
				  {
				  	echo '4';
				  }
				}else {
		    		echo '2';
				}
		}catch(PDOException $e) {
			echo $e->getMessage();	
			return false;
		}
		
	}

	
	public function actualizaEntrada($id,$user,$data_ad_client,$status)
	{	
		
		try
		{
				
				$stmt=$this->db->prepare("UPDATE user_ads SET data_ad_client=:data_ad_client,
		                                       		   user=:user, 
													   status=:status
													WHERE id=:id ");
				$stmt->bindparam(":user",$user);
				$stmt->bindparam(":data_ad_client",$data_ad_client);
				$stmt->bindparam(":status",$status);
				$stmt->bindparam(":id",$id);
				$stmt->execute();
			
				if($stmt)
				{
					echo '1';
				}
					
				
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM user_ads WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM user_ads WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	

    public function dataview($query)
	{
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['user']); ?></td>
                <td><?php print($row['data_ad_client']); ?></td>
                <td><?php print($row['status']); ?></td>
                
                
				 <td align="center">
                <a href="vistas/editar.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                <?php echo '&nbsp&nbsp'; ?>
                <a href="vistas/delete.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                
             
                	
                
                <?php echo '&nbsp&nbsp'; ?>
               
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>No hay nada aquí...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>Primera</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Anterior</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Siguiente</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Ultima</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
