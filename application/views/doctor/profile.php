<div class="row">
	<div class="col-md-8">
		<div class="card">
            <div class="header" style="padding: 10px">
                <h4 class="title">Edit Profile</h4>
            </div>
            <div class="content">
                <form action="<?php echo base_url('/doctor_profile'); ?>" method="POST">
                	<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor Registration Number</label>
                                <input type="text" class="form-control" name="registration_number" placeholder="Doctor registration number" disabled="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" autofocus="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="4" class="form-control" name="address" placeholder="Address" style="resize: vertical; min-height: 110px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" name="city">
                                    <option value="">Select a city</option>
                                    <?php foreach($cities as $city): ?>
                                        <option value="<?php echo $city->id ?>"><?php echo $city->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Gender</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="radio" for="male">
                                    Male
                                    <span class="icons checked">
                                        <span class="fist-icon fa fa-circle-o"></span>
                                        <span class="second-icon fa fa-dot-circle-o"></span>
                                    </span>
                                    <input type="radio" id="male" value="1" name="gender" data-toggle="radio" checked="true">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="radio" for="female">
                                    Female
                                    <span class="icons">
                                        <span class="fist-icon fa fa-circle-o"></span>
                                        <span class="second-icon fa fa-dot-circle-o"></span>
                                    </span>
                                    <input type="radio" id="female" value="0" name="gender" data-toggle="radio">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                        </div>
                    </div>
    				<div class="row">
    					<div class="col-md-4">
    						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Update</button>
    						</div>
    					</div>
    				</div>
                </form>
            </div>
        </div>
	</div>
</div>