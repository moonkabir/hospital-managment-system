<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">Your Account</h5>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Gender</th>
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
                        $ctimestamp = strtotime($data['creationDate']);
                        $utimestamp = strtotime($data['updationDate']);
                        $cdate = date("jS M, Y", $ctimestamp);
                        $udate = date("jS M, Y", $utimestamp);
                    ?>
                    <tr>
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['address'];?></td>
                        <td><?php echo $data['city'];?></td>
                        <td><?php echo $data['gender'];?></td>
                        <td><?php echo $data['contact'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $cdate;?></td>
                        <td><?php echo $udate;?></td>
                        <td>
                            <a class="update" data-taskid="<?php echo $data['id'];?>" href='patient-edit-profile.php'>Update</a>
                        </td>
                    </tr>
                    <?php
                        }
                        mysqli_close($connection);
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>