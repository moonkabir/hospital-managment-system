<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
        <div class="d-flex justify-content-between">
            <h5>All Doctor List</h5>
            <h5><a class="update" href='admin-edit-doctor-manage.php'>Update Doctor List</a></h5>
        </div>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Specialization</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Fees</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th class="hidden-xs">Creation Date</th>
                            <th class="hidden-xs">Update Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    while ($data = mysqli_fetch_assoc($result)) {
                        $ctimestamp = strtotime($data['creationdate']);
                        $utimestamp = strtotime($data['updateDate']);
                        $cdate = date("jS M, Y", $ctimestamp);
                        $udate = date("jS M, Y", $utimestamp);
                    ?>
                    <tr>
                        <td><?php echo $data['Id'];?></td>
                        <td><?php echo $data['specialization'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['address'];?></td>
                        <td><?php echo $data['fees'];?></td>
                        <td><?php echo $data['contact'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $cdate;?></td>
                        <td><?php echo $udate;?></td>
                        <td>
                            <a class="delete" data-taskid="<?php echo $data['Id'];?>" href='#'>Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                        mysqli_close($connection);
                    ?>

                    </tbody>
                </table>
            </form>
            <form action="admin-managedoctors.php" method="post" id="deleteform">
                <input type="hidden" name="action" value="ddelete">
                <input type="hidden" id="dtaskid" name="taskid">
            </form>
        </div>
    </div>
</div>