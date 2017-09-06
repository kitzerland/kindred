<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header" style="padding: 0px;">
                <form action="<?php echo base_url('/users'); ?>" method="GET">
    				<div class="form-inline">
    					<div class="form-group">
    						<select class="form-control" name="type">
                                <option value="">Please select a category</option>
    							<option value="2">Doctors</option>
    							<option value="1">Patients</option>
    						</select>
    						<button class="btn" type="submit">Search</button>
    					</div>
    				</div>
                </form>
			</div>
            
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
                	<thead>
                        <th width="40px">ID</th>
                        <?php if(isset($this->input->get()["type"]) && $this->input->get()["type"] == 2): ?>
                        <th>Registration No</th>
                        <?php endif ?>
                    	<th>Username</th>
                        <th>Name</th>
                        <th width="40px">Age</th>
                    	<th>Address</th>
                        <th>City</th>
                    	<th width="70px">Gender</th>
                    	<th width="50px">Active</th>
                    	<th width="50px">Settings</th>
                    </thead>
                    <tbody>
                        <?php if(count($users)): ?>
                            <?php foreach($users as $user): ?>
                        	<tr>
                                <td><?php echo "$user->id"; ?></td>
                                <?php if(isset($this->input->get()["type"]) && $this->input->get()["type"] == 2): ?>
                                <td><?php echo "$user->registration_number"; ?></td>
                                <?php endif ?>
                                <td><?php echo "$user->username"; ?></td>
                                <td><?php echo "$user->first_name $user->last_name"; ?></td>
                                <td><?php echo "$user->age"; ?></td>
                                <td><?php echo "$user->address"; ?></td>
                                <td><?php echo "$user->city"; ?></td>
                                <td><?php echo $user->gender == 1 ? "male" : "female"; ?></td>
                                <td><?php echo $user->active == 1 ? "Yes" : "No"; ?></td>
                                <td>
                                    <ul class="nav navbar-nav navbar-right" style="padding: 0px; margin: 0px;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <b class="fa fa-gear"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <?php if($user->active == 1): ?>
                                                    <a href="<?php echo base_url('user/' . $user->id . '/deactivate'); ?>">Deactivate</a>
                                                    <?php else: ?>
                                                    <a href="<?php echo base_url('user/' . $user->id . '/activate'); ?>">Activate</a>
                                                    <?php endif; ?>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('user/' . $user->id . '/reset'); ?>">Reset Password</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('user/' . $user->id . '/delete'); ?>">Delete</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                        	</tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="7">Sorry, No users found.</th>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>