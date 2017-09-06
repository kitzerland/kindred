<div class="row">
	<div class="col-md-8">
		<div class="card card-plain">
			<div class="content table-responsive table-full-width">
				<form action="<?php echo base_url('/bookings/'. $doctor->id .'/doctor?from='.$from.'&to='.$to); ?>" method="POST">
					<table class="table table-condensed">
						<tr>
							<th>Name</th><td><?php echo $doctor->first_name . " " . $doctor->last_name; ?></td>
						</tr>
						<tr>
							<th>Address</th><td><?php echo $doctor->address; ?></td>
						</tr>
						<tr>
							<th>City</th><td><?php echo $doctor->city; ?></td>
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
							<td colspan="2"><button type="submit" class="btn btn-success">Submit your rating</button> <a class="btn btn-primary" href="<?php echo base_url('bookings?from='. $from .'&to='. $to) ?>">Go Back To Bookings</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>