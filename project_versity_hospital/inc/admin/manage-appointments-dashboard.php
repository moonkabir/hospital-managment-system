<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="float-left">Appointment List</h5>
            
            <h5><a href="admin-new-appiontment.php" class="float-right">ADD Appointment</a></h5>
            <?php if(mysqli_num_rows($result)==0){ ?>
            <p class="not-found-search-result">No Appointment</p>
            <?php }else{ ?>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Patient ID</th>
                            <th>Specialization</th>
                            <th>Doctor ID</th>
                            <th>Consultancy Fees</th>
                            <th>Appointment Date</th>
                            <th>Posting Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    while ($data = mysqli_fetch_assoc($result)) {
                        $ptimestamp = strtotime($data['postingDate']);
                        $pdate = date("jS M, Y", $ptimestamp);
                    ?>
                    <tr>
                        <td><?php echo $data['id'];?></td>
                        <td class="text-center"><?php echo $data['patientId'];?></td>
                        <td><?php echo $data['specialization'];?></td>
                        <td class="text-center"><?php echo $data['doctorId'];?></td>
                        <td class="text-center"><?php echo $data['consultancyFees'];?></td>
                        <td><?php echo $data['appointmentDate'];?></td>
                        <td><?php echo $pdate;?></td>
                        <td class="text-center"><?php echo $data['status'];?></td>
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
            <?php } ?>            
            <form action="admin-manageappointments.php" method="post" id="deleteform">
                <input type="hidden" name="action" value="adminadelete">
                <input type="hidden" id="dtaskid" name="taskid">
            </form>
        </div>
    </div>
</div>
