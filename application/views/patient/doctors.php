<div class="row">
	<div class="col-md-12">
		<div class="card card-plain">
			<div class="header" style="padding: 0px;">
				<form action="<?php echo base_url('/doctors'); ?>" method="GET">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control date" name="date" placeholder="Date">
                            <select class="form-control city" name="city">
                                <?php if(count($cities)): ?>
                                    <?php foreach($cities as $city): ?>
                                    <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <option value="">No cities found.</option>
                                <?php endif; ?>
                            </select>
                            <button class="btn">Search</button>
                        </div>
                    </div>            
                </form>
			</div>
			<div class="content table-responsive table-full-width">
                <table class="table table-hover">
                	<thead>
                        <th width="80px">#</th>
                    	<th>Name</th>
                    	<th>Area</th>
                    	<th>Available Time Slots</th>
                    	<th class="text-center" width="80px">Book Doctor</th>
                    </thead>
                    <tbody>
                        <?php if(count($doctors)): ?>
                            <?php foreach($doctors as $i => $doctor): ?>
                            <tr>
                                <td><?php echo $doctor->id; ?></td>
                                <td><?php echo $doctor->first_name . " " . $doctor->last_name; ?></td>
                                <td><?php echo $doctor->city; ?></td>
                                <?php if(isset($doctor->schedules) && count($doctor->schedules)): ?>
                                <td>
                                    <?php foreach($doctor->schedules as $schedule): ?>
                                        <?php echo  "[". $schedule->from . " - " . $schedule->to . "] "; ?>
                                    <?php endforeach; ?>
                                </td>
                                <?php else: ?>
                                <td>-</td>
                                <?php endif; ?>
                                <td class="text-center">
                                    <?php if(isset($doctor->schedules) && count($doctor->schedules)): ?>
                                    <a style="padding: 0px 5px 0px 5px;" href="booking/<?php echo $doctor->id; ?>?date=<?php echo $doctor->schedule_date; ?>" class="btn btn-primary">book doctor</a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr><th colspan="5">Sorry, No results found</th></tr>
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
    });
</script>