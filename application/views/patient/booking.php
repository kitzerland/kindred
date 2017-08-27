<div class="row">
	<div class="col-md-6">
		<div class="card card-plain">
			<div class="header">
				<h3 style="margin: 0px;">Booking Details</h3>
			</div>
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th>-- -- ----</th>
						</tr>
						<tr>
							<th>Area</th>
							<th>--</th>
						</tr>
						<tr>
							<th>Doctor</th>
							<th>--</th>
						</tr>
						<tr>
							<th>Time Slot</th>
							<th><select class="form-control" style="height: 30px; padding: 0px 5px 0px 5px;"></th>
						</tr>
						<tr>
							<th>Documents</th>
							<th>
								<select class="form-control" style="height: 30px; padding: 0px 5px 0px 5px;">
									<option value="">Select a document collection</option>
								</select>
							</th>
						</tr>
						<tr>
							<th colspan="2">
								<a style="padding: 0px 5px 0px 5px;" class="btn btn-primary">Confirm</a>
							</th>
						</tr>
					</thead>
                </table>
           </div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p>Your booking has been requested.</p>
		<p>Go To <a style="padding: 0px 5px 0px 5px;" href="<?php echo base_url('/bookings'); ?>" class="btn btn-primary">My Bookings</a> to view its status.</p>
	</div>
</div>