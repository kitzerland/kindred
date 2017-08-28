<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Date</label>
            <input type="text" class="form-control" placeholder="Date">
        </div>
        <div class="form-group">
            <label class="control-label">Report Category</label>
            <select class="form-control">
                <option value="">Report category</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Description</label>
            <textarea class="form-control" name="description" style="resize: vertical; min-height: 110px;"></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">Browse File</label>
            <input type="file" name="file">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Upload</button>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-plain">
            <div class="header" style="padding: 0px;">
                <h3 style="margin: 0px;">Uploaded Documents</h3>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                        <th width="80px">#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-center" width="80px"><i class="fa fa-gear"></i></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>