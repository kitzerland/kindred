<div class="row">
	<div class="col-md-4">
		<form action="<?php echo base_url('/appointments/'. $patient->id .'/confirm?from='. $from .'&to=' . $to); ?>" method="POST">
			<div class="form-group">
				<label>Assign a time</label>
				<input type="text" class="form-control time" name="time" value="<?php echo $patient->assigned_time; ?>" placeholder="Select Time">
				<label>Appointment : <?php echo $patient->date . " [ " . $patient->from . " - "  . $patient->to . " ]"; ?></label>
			</div>
			<div class="form-group">
				<button class="btn btn-danger" type="submit">Confirm Appointment</button>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card card-plain">
			<div class="content table-responsive table-full-width">
				<form action="<?php echo base_url('/appointments/'. $patient->id .'/patient?from='.$from.'&to='.$to); ?>" method="POST">
					<table class="table table-condensed">
						<tr>
							<th>Name</th><td><?php echo $patient->first_name . " " . $patient->last_name; ?></td>
						</tr>
						<tr>
							<th>Age</th><td><?php echo $patient->age; ?></td>
						</tr>
						<tr>
							<th>Gender</th><td><?php echo $patient->gender; ?></td>
						</tr>
						<tr>
							<th>Address</th><td><?php echo $patient->address; ?></td>
						</tr>
						<tr>
							<th>City</th><td><?php echo $patient->city; ?></td>
						</tr>
						<tr>
							<th>Your rating</th>
							<td width="80%;">
								<label class="radio" for="zero" style="display: inline-block; width: 60px;">
	                                0
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="zero" value="0" name="rating" data-toggle="radio">
	                            </label>
								<label class="radio" for="one" style="display: inline-block; width: 60px;">
	                                1
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="one" value="1" name="rating" data-toggle="radio">
	                            </label>
		                        <label class="radio" for="two" style="display: inline-block; width: 60px;">
	                                2
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="two" value="2" name="rating" data-toggle="radio">
	                            </label>
	                            <label class="radio" for="three" style="display: inline-block; width: 60px;">
	                                3
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="three" value="3" name="rating" data-toggle="radio">
	                            </label>
	                            <label class="radio" for="four" style="display: inline-block; width: 60px;">
	                                4
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="four" value="4" name="rating" data-toggle="radio">
	                            </label>
	                            <label class="radio" for="five" style="display: inline-block; width: 60px;">
	                                5
	                                <span class="icons">
	                                    <span class="fist-icon fa fa-circle-o"></span>
	                                    <span class="second-icon fa fa-dot-circle-o"></span>
	                                </span>
	                                <input type="radio" id="five" value="5" name="rating" data-toggle="radio">
	                            </label>
							</td>
						</tr>
						<tr>
							<td colspan="2"><button type="submit" class="btn btn-success">Submit your rating</button> <a class="btn btn-primary" href="<?php echo base_url('appointments?from='. $from .'&to='. $to) ?>">Go Back To Appointments</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.time').timepicker({
			 hourMin: <?php echo $patient->hour_min; ?>,
			 hourMax: <?php echo $patient->hour_max; ?>
		});
	});
</script>