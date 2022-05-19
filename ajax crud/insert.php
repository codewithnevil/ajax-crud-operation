<?php
  include_once('db.php');
  function get_safe_value($con,$str){
    if($str!=''){
      $str=trim($str);
      return mysqli_real_escape_string($con,$str);
    }
  }
  
  if(isset($_POST['add'])){
  
  $name = $_POST["name"];
  
  $sql = "INSERT INTO crud (`name`) VALUES ('$name')";
  
  		//use for MySQLi OOP
  		if($con->query($sql)){
  			$_SESSION['success'] = 'Data added successfully';
  		}
  		
  		else{
  			$_SESSION['error'] = 'Something went wrong while adding';
  		}
  	}
  	else{
  		$_SESSION['error'] = 'Fill up add form first';
  	}
  
  	header('location: fetch.php');
?>