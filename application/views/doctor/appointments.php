<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header" style="padding: 0px;">
				<form action="<?php echo base_url('/appointments'); ?>" method="GET">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control from" name="from" placeholder="From">
                            <input type="text" class="form-control to" name="to" placeholder="To">
                            <button class="btn">Search</button>
                        </div>
                    </div>            
                </form>
			</div>
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
                	<thead>
                        <th width="80px">#</th>
                    	<th>Date</th>
                    	<th>Name</th>
                    	<th>Age</th>
                    	<th>Gender</th>
                        <th>Time Slot</th>
                        <th>Assigned</th>
                    	<th width="80px">Status</th>
                    	<th class="text-center" width="80px">Settings</th>
                    </thead>
                    <tbody>
                        <?php if(count($appointments)): ?>
                            <?php foreach($appointments as $i => $appointment): ?>
                            <tr>
                                <td><?php echo (++$i); ?></td>
                                <td><?php echo $appointment->date; ?></td>
                                <td><?php echo $appointment->first_name . " " . $appointment->last_name; ?></td>
                                <td><?php echo $appointment->age; ?></td>
                                <td><?php echo $appointment->gender; ?></td>
                                <td><?php echo "[ " . $appointment->from . " - " . $appointment->to . " ]"; ?></td>
                                <td><?php echo $appointment->assigned_time; ?></td>
                                <td><?php echo $appointment->status; ?></td>
                                <td>
                                    <ul class="nav navbar-nav navbar-right" style="padding: 0px; margin: 0px;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <b class="fa fa-gear"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?php echo base_url('/appointments/'. $appointment->id .'/patient?from='. $from .'&to=' . $to); ?>">Details | Confirmation | Ratings</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('/appointments/'. $appointment->id .'/discard?from='. $from .'&to=' . $to); ?>">Discard</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr><th colspan="8">Sorry, No results found.</th></tr>
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