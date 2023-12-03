<?php

require_once '../include/headerpage.php';


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "select * from users where batch_id='$id';";

    $result = $conn->query($sql);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Registerd student List</h4>
                        </div>
                        <div class="col-sm-9 col-xs-12 text-right">
                            <div class="btn_group">
                                <input type="text" class="form-control" placeholder="Search">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <th scope="col">User_id</th>
                                <th scope="col">First_name</th>
                                <th scope="col">Last_name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Birth day</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Department</th>
                                <th scope="col">batch</th>
                     


                            </tr>
                        </thead>
                        <?php

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?><tbody>
                                    <tr>

                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['lastname']; ?></td>
                                        <td><?php echo $row['phone_no']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['bday']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['batch_name']; ?></td>
                                       

                                    </tr>

                                </tbody>
                        <?php

                            }
                        }


                        ?>




                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php

require_once '../include/footer.php';

?>
</body>

</html>