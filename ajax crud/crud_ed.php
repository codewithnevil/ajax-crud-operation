<!-- Edit Modal -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Update Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form method="POST" action="edit.php">
            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
            <div class="row form-group">
              <div class="col-sm-12">
                <label class="control-label modal-label">Enter Name :</label>
              </div>
              <div class="col-sm-12">
                <input type="name" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Delete Data</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">	
<h2 class="text-center">Are you sure you want to Delete this data?</h2>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
</div>
</div>
</div>
</div>