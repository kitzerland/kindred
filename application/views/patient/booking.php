<div class="row">
	<div class="col-md-6">
		<div class="card card-plain">
			<div class="header">
				<h3 style="margin: 0px;">Booking Details</h3>
			</div>
			<div class="content table-responsive table-full-width">
				<form action="<?php echo base_url('/booking/'.$summary->id.'?date='.$summary->schedule_date); ?>" method="POST">
	                <table class="table table-hover">
						<thead>
							<tr>
								<th width="35%">Date</th>
								<th><?php echo $summary->schedule_date; ?></th>
							</tr>
							<tr>
								<th width="35%">Area</th>
								<th><?php echo $summary->city; ?></th>
							</tr>
							<tr>
								<th width="35%">Doctor</th>
								<th><?php echo $summary->first_name . " " . $summary->last_name; ?></th>
							</tr>
							<tr>
								<th width="35%">Time Slot</th>
								<?php if(isset($summary->schedules) && count($summary->schedules)): ?>
	                            <td>
		                            <select class="form-control" name="schedule" style="height: 30px; padding: 0px 5px 0px 5px;">
	                                <?php foreach($summary->schedules as $schedule): ?>
	                                	<option value="<?php echo $schedule->id; ?>"><?php echo $schedule->from . " - " . $schedule->to; ?></option>
	                                <?php endforeach; ?>
									</select>
	                            </td>
	                            <?php else: ?>
	                            <td>-</td>
	                            <?php endif; ?>
							</tr>
							<tr>
								<th width="35%">Show Documents</th>
								<th>
									<label class="checkbox">
	                                    <input type="checkbox" name="show_documents" value="1" data-toggle="checkbox">
	                                </label>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									<button style="padding: 0px 5px 0px 5px;" type="submit" class="btn btn-primary">Confirm</button>
								</th>
							</tr>
						</thead>
	                </table>
                </form>
           </div>
		</div>
	</div>
</div>