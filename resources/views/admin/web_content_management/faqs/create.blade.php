{!! Form::open(['url' => route('admin.web_content_management.faqs.store'), 'method' => 'post', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Add New Faq</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Question <span class="text-danger">*</span></label>
            <input type="text" name="question" id="question" class="form-control" placeholder="Question">
        </div>

        <div class="form-group">
            <label>Answer <span class="text-danger">*</span></label>
            <textarea name="answer" id="answer" class="form-control"></textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Create</button>
</div>
{!! Form::close() !!}
