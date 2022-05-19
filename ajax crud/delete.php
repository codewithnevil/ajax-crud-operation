<?php
  include_once('db.php');
  function get_safe_value($con,$str){
    if($str!=''){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }
  
  if(isset($_GET['id'])){
  $id = get_safe_value($con,$_POST['id']);
  
  $sql = "DELETE FROM crud WHERE id = '$id'";
  
  		//use for MySQLi OOP
  		if($con->query($sql)){
  			$_SESSION['success'] = 'Data deleted successfully';
  		}
  		
  		else{
  			$_SESSION['error'] = 'Something went wrong in deleting data';
  		}
  	}
  	else{
  		$_SESSION['error'] = 'Select data to delete first';
  	}
  
  	header('location: fetch.php');
?>