<?php
  include_once('db.php');
  function get_safe_value($con,$str){
    if($str!=''){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }
  
  if(isset($_POST['edit'])){
  $id = get_safe_value($con,$_POST['id']);
  $name = get_safe_value($con,$_POST["name"]);
  
  $sql = "UPDATE crud SET `name` = '$name' WHERE id = '$id'";
  
  		//use for MySQLi OOP
  		if($con->query($sql)){
  			$_SESSION['success'] = 'Data updated successfully';
  		}
  		
  		else{
  			$_SESSION['error'] = 'Something went wrong in updating data';
  		}
  	}
  	else{
  		$_SESSION['error'] = 'Select data to edit first';
  	}
  
  	header('location: fetch.php');
?>