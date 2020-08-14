<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h5 class="panel-title">Add Patient </h5>
                </div>
                <div class="panel-body">	
                    <form role="form" name="dcotorspcl" method="post" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender(male/female)" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Phone Number" required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
                        </div>
                        <button type="submit" name="submit" class="btn btn-o btn-primary">Submit</button>
                        <input type="hidden" name="action" value="adminpattientRegister">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

