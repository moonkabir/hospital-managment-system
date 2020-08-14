<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title">Doctor Specialization</h5>
                </div>
                <div class="panel-body">
                    <p style="color:red;"></p>	
                    <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                            <input type="text" name="doctorspecilization" class="form-control"  placeholder="Enter Doctor Specialization">
                        </div>
                        <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                        <input type="hidden" name="action" value="addspecialization">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <div class="d-flex justify-content-between">
                <h5>Manage Docter Specialization</h5>
                <h5><a class="update"href='admin-edit-doctor-specialization.php'>Update Docter Specialization</a></h5>
            </div>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Specialization</th>
                            <th class="hidden-xs">Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    while ($data = mysqli_fetch_assoc($result)) {
                        $timestamp = strtotime($data['creationDate']);
                        $date = date("jS M, Y", $timestamp);
                    ?>
                    <tr>
                        <!-- <td><input name="taskids[]" class="label-inline" type="checkbox" value="<?php echo $data['id'];?>"></td> -->
                        <td><?php echo $data['id'];?></td>
                        <td><?php echo $data['specialization'];?></td>
                        <td><?php echo $date;?></td>
                        <td>
                            <a class="delete" data-taskid="<?php echo $data['id'];?>" href='#'>Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                        mysqli_close($connection);
                    ?>

                    </tbody>
                </table>
            </form>
            <form action="admin-doctorspecialization.php" method="post" id="deleteform">
                <input type="hidden" name="action" value="sdelete">
                <input type="hidden" id="dtaskid" name="taskid">
            </form>
        </div>
    </div>
</div>