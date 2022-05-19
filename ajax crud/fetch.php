<?php
    require('db.php');
        function get_safe_value($con,$str){
        if($str!=''){
          $str=trim($str);
          return mysqli_real_escape_string($con,$str);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajax Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">  
  
</head>
<body>
<!-- display error message -->
<div class="container mt-3">
  <?php
    if(isset($_SESSION['error'])){
        echo
        "
        <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            ".$_SESSION['error']."
        </div>
        ";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo
        "
        <div class='alert alert-success alert-dismissible'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            ".$_SESSION['success']."
        </div>
        ";
        unset($_SESSION['success']);
    }
    ?>
</div>

<!-- display table data -->
<div class="card mt-3 container p-3">
  <table id="myTable" class="table align-middle mb-0 bg-white mt-5 table-bordered">
    <thead class="table-dark">
      <th style="text-align: center;color:white;" >No</th>
      <th style="text-align: center;color:white;" >Name</th>
      <th style="text-align: center;color:white;" >Action</th>
    </thead>
    <tbody>
      <?php
        $i = 1;
        $sql = "SELECT * FROM crud";
        $query = $con->query($sql);
        while($row = $query->fetch_assoc()){
            echo 
            "<tr>
                <td style='text-align: center;'>".$i++."</td>
                <td style='text-align: center;'>get_safe_value($con,$row['name'])</td>
                <td style='text-align: center;'>
                    <a href='#edit_".get_safe_value($con,$row['id'])."' class='btn btn-success btn-sm' data-bs-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                    <a href='#delete_".get_safe_value($con,$row['id'])."' class='btn btn-danger btn-sm' data-bs-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                </td>
            </tr>";
            include('crud_ed.php');
        }
        
        ?>
    </tbody>
  </table>
</div>

<!-- Data Insert Modalbox -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form method="POST" action="insert.php">
            <div class="row form-group">
              <div class="col-sm-12">
                <label class="control-label modal-label">Name :</label>
              </div>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Add</a>
      </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
<!-- generate datatable on our table -->
<script>
  $(document).ready(function(){
      //inialize datatable
      $('#myTable').dataTable({
      "searching": false });
  
      //hide alert
      $(document).on('click', '.close', function(){
          $('.alert').hide();
      })
  });
</script>