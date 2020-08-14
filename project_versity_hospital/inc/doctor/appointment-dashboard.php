<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">Appiontment List</h5>
            <?php if(mysqli_num_rows($result)==0){ ?>
            <p class="not-found-search-result">No Appointment</p>
            <?php }else{ ?>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th>Serial ID</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Patient Contact</th>
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
                        <td class="text-center"><?php echo $data['patientId'];?></td>
                        <td><?php echo $data['patientName'];?></td>
                        <td><?php echo $data['patientContact'];?></td>
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