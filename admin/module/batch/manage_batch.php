<?php
   
require_once '../include/headerpage.php';

?>

<table class="table table-danger">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Batch Name</th>
      <th scope="col">Create Date</th>
   

      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>

  <?php

$sql="select * from batch where active=1;";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        ?>
        <tr>
        <td scope="row"><?php echo $row['id'] ?></th>
          <td><?php echo $row['batch_name'] ?></td>
          <td><?php echo $row['create_date'] ?></td>
          <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
          <td><!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure..??</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div></a>
          </td>

          </tr>
        <?php
    }
}




  ?>











<?php
require_once '../include/footer.php';

?>
</body>
