<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header" style="padding: 0px;">
                <form action="<?php echo base_url('/bookings'); ?>" method="GET">
    				<div class="form-inline">
    					<div class="form-group">
    						<input type="text" class="form-control from" name="from" placeholder="From Date">
    						<input type="text" class="form-control to" name="to" placeholder="To Date">
    						<button class="btn" type="submit">Search</button>
    					</div>
    				</div>
                </form>
			</div>
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
                	<thead>
                        <th width="80px">#</th>
                    	<th>Date</th>
                    	<th>Area</th>
                    	<th>Doctor</th>
                        <th>Timeslot</th>
                    	<th>Appointment Time</th>
                        <th class="text-center" width="80px">Status</th>
                    	<th class="text-center" width="40px">Settings</th>
                    </thead>
                    <tbody>
                        <?php if(count($bookings)): ?>
                            <?php foreach($bookings as $i => $booking): ?>
                            <tr>
                                <td><?php echo (++$i); ?></td>
                                <td><?php echo $booking->date; ?></td>
                                <td><?php echo $booking->city; ?></td>
                                <td><?php echo $booking->first_name . " " . $booking->last_name; ?></td>
                                <td><?php echo "[ ". $booking->from . " - " . $booking->to . " ]"; ?></td>
                                <td class="text-center"><?php echo $booking->assigned_time ?></td>
                                <td class="text-center"><?php echo $booking->status ?></td>
                                <td>
                                    
                                    <ul class="nav navbar-nav navbar-right" style="padding: 0px; margin: 0px;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <b class="fa fa-gear"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?php echo base_url('bookings/' . $booking->id . '/doctor?from='.$from.'&to='.$to); ?>">Details | Ratings</a>
                                                </li>
                                                <?php if($booking->status_id != 1): ?>
                                                <li>
                                                    <a href="<?php echo base_url('bookings/' . $booking->id . '/delete?from='.$from.'&to='.$to); ?>">Delete</a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                    </ul>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr><th colspan="6">Sorry, no results found.</th></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".from").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $(".to").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>