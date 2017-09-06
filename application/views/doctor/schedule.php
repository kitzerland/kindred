<div class="row">
	<div class="col-md-4">
		<form action="<?php echo base_url('/schedule/create'); ?>" method="POST">
			<div class="form-group">
				<label class="control-label">Date</label>
				<input type="text" class="form-control date" name="date" placeholder="Pick Date">
			</div>
			<div class="form-group">
				<label class="control-label">From</label>
				<input type="text" class="form-control from" name="from" placeholder="Pick Time">
			</div>
			<div class="form-group">
				<label class="control-label">To</label>
				<input type="text" class="form-control to" name="to" placeholder="Pick Time">
			</div>
			<div class="form-group">
				<button class="btn btn-success save" type="submit">Save</button>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<div class="card card-plain">
            <div class="header">
                <h4 class="title">Schedules</h4>
            </div>
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
                	<thead>
                        <th width="80px">#</th>
                    	<th>Date</th>
                    	<th>From</th>
                    	<th>To</th>
                    	<th width="50px">Settings</th>
                    </thead>
                    <tbody>
                    	<?php if(count($schedules)): ?>
	                    	<?php foreach($schedules as $i => $schedule): ?>
                    		<tr>
                    			<td><?php echo (++$i); ?></td>
                    			<td><?php echo $schedule->date; ?></td>
                    			<td><?php echo $schedule->from; ?></td>
                    			<td><?php echo $schedule->to; ?></td>
                    			<td>
                                    <ul class="nav navbar-nav navbar-right" style="padding: 0px; margin: 0px;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <b class="fa fa-gear"></b>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?php echo base_url('schedule/' . $schedule->id . '/delete'); ?>">Delete</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                    		</tr>
	                    	<?php endforeach; ?>
                    	<?php else: ?>
                    	<tr><th colspan="5">Sorry, No results found.</th></tr>
                    	<?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".date").datepicker({
			dateFormat: "yy-mm-dd"
		});
		$('.from').timepicker();
		$('.to').timepicker();
	});
</script>