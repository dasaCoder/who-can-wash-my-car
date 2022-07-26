{!! Form::open(['url' => route('admin.web_content_management.blogs.store'), 'method' => 'post', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Add New Blog</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Blog Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Blog Name">
        </div>

        <div class="form-group">
            <label>Blog Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <div class="form-group">
            <label>Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input name="image" type="file" class="file-input"
                           data-show-upload="false" data-overwrite-initial="true">
                    <span
                        class="form-text text-muted">Accepted formats: jpg, png. Max file size 1MB</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Create</button>
</div>
{!! Form::close() !!}
