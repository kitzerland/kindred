<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label class="control-label">Date</label>
			<input type="text" class="form-control date" placeholder="Pick Date">
		</div>
		<div class="form-group">
			<label class="control-label">From</label>
			<input type="text" class="form-control timeFrom" placeholder="Pick Time">
		</div>
		<div class="form-group">
			<label class="control-label">To</label>
			<input type="text" class="form-control timeTo" placeholder="Pick Time">
		</div>
		<div class="form-group">
			<button class="btn btn-success save">Save</button>
		</div>
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
                    	<th class="text-center" width="80px"><i class="fa fa-gear"></i></th>
                    </thead>
                    <tbody>
                    	
                    </tbody>
                </table>
            </div>
        </div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".date").datepicker();
		$('.timeFrom').timepicker();
		$('.timeTo').timepicker();
	});
</script>