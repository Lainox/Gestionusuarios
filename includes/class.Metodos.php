<?php 

class Metodos{



   function check_client($client) {
    $tmp = explode('-', $client);
    if (count($tmp) != 3) {
        return false;
    } elseif ($tmp[0] != 'ca' or $tmp[1] != 'pub') {
        return false;
    } elseif (!ctype_digit($tmp[2])) {
        return false;
    } else {
        return true;
    }
}



  	function validaEmail($valor) {
   		if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
      		return false;
   		}else{
      		return true;
   		}
	}
 
    

	 
		
	

	
	


}

 ?>