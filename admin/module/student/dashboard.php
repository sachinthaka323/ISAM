<?php

require_once '../include/headerpage.php';


?>
<table class="table table-danger">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone no</th>
      <th scope="col">E-mail Address</th>
      <th scope="col">Birth Day</th>
      <th scope="col">Gender</th>
      <th scope="col">Department</th>
      <th scope="col">Batch Name</th>
      <th scope="col">Action</th>



      <!-- <th scope="col">Action</th> -->


    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from users where role='student' and active=1 ;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?> <tr>
          <td scope="row"><?php echo $row['id'] ?></th>
          <td><?php echo $row['user_id'] ?></td>
          <td><?php echo $row['firstname'] ?></td>
          <td><?php echo $row['lastname'] ?></td>
          <td><?php echo $row['phone_no'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['bday'] ?></td>
          <td><?php echo $row['gender'] ?></td>
          <td><?php echo $row['department'] ?></td>
          <td><?php echo $row['batch_name'] ?></td>
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

          <!-- <td><a href="delete.php?id=<?php //echo $row['id'];
                                          ?>" class="btn btn-primary"></a></td> -->



          <!-- <td><i class="bi bi-0-circle"></i></td> -->


        </tr><?php
            }
          }


              ?>


</table>

<?php
require_once '../include/footer.php';
?>
</body>

</html>