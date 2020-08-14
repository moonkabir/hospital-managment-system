<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title">Add Doctor </h5>
                </div>
                <div class="panel-body">	
                    <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                            <select name="adddoctorspecialization" class="form-control" required="true">
                                <option value="">Select Specialization</option>
                                <?php $ret=mysqli_query($connection,"SELECT * FROM `doctorspecialization`");
                                    while($row=mysqli_fetch_array($ret))
                                    {
                                ?>
                                <option value="<?php echo htmlentities($row['specialization']);?>">
                                    <?php echo htmlentities($row['specialization']);?>
                                </option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="adddoctorname" class="form-control"  placeholder="Enter Name" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" name="adddoctoraddress" class="form-control"  placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <input type="number" name="adddoctorfees" class="form-control"  placeholder="Enter Fees" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" name="adddoctorscheduletime" class="form-control"  placeholder="Enter your Schedule as(09AM-11AM)" required="true">
                        </div>
                        <div class="form-group">
                            <input type="number" name="adddoctorcontact" class="form-control"  placeholder="Enter Contact" required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" name="adddoctoremail" class="form-control"  placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="adddoctorpassword" class="form-control"  placeholder="Enter Password" required="true">
                        </div>
                        <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                        <input type="hidden" name="action" value="adddoctor">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>