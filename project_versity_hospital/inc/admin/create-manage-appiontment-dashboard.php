<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <div class="d-flex justify-content-between">
                <h5 class="float-left">Appointment Doctors List</h5>
                <form action="patient-appointment-doctor-search.php" method="POST" class="pattient-search-form">
                    <input type="text" name="search" class="float-right" placeholder="Type Specialization">
                    <input type="hidden" id="staskid" name="staskid">
                    <button id="search-button" class="float-right" name="submit" value="submit">Search</button>
                </form>
            </div>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Specialization</th>
                            <th>Name</th>
                            <th>Fees</th>
                            <th>Schedule Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $data['Id'];?></td>
                        <td><?php echo $data['specialization'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['fees'];?></td>
                        <td><?php echo $data['scheduleTime'];?></td>
                        <td>
                            <a class="update" data-taskid="<?php echo $data['Id'];?>" href='admin-patient-appointment-form.php'>Appiontment</a>
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