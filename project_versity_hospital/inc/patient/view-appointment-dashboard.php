<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <div class="d-flex justify-content-between">
                <h5>Your Account</h5>
                <h5><a class="update" href='patient-delete-appiontment.php'>Delete Your Appiontment</a></h5>
            </div>
            <?php if(mysqli_num_rows($result)==0){ ?>
            <p class="not-found-search-result">No Appointment</p>
            <?php }else{ ?>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th>Serial ID</th>
                            <th>Doctor ID</th>
                            <th>Doctor Name</th>
                            <th>Doctor Specialization</th>
                            <th>Fees</th>
                            <th class="hidden-xs">Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    while ($data = mysqli_fetch_assoc($result)) {
                        $appointmentDate = strtotime($data['appointmentDate']);
                        $appointmentDate = date("jS M, Y", $appointmentDate);
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $data['id'];?></td>
                        <td class="text-center"><?php echo $data['doctorId'];?></td>
                        <td><?php echo $data['doctorName'];?></td>
                        <td><?php echo $data['specialization'];?></td>
                        <td><?php echo $data['consultancyFees'];?></td>
                        <td><?php echo $appointmentDate;?></td>
                    </tr>
                    <?php
                        }
                        mysqli_close($connection);
                    ?>
                    </tbody>
                </table>
            </form>
            <?php } ?> 
        </div>
    </div>
</div>