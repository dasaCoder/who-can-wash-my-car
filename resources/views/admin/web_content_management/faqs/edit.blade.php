{!! Form::open(['url' => route('admin.web_content_management.faqs.update', $faq->id), 'method' => 'put', 'id' => 'submitForm']) !!}
<div class="modal-header bg-primary">
    <h6 class="modal-title">Edit Package</h6>
    <button type="button" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
    <div class='col-lg-12'>
        <div class="form-group">
            <label>Question <span class="text-danger">*</span></label>
            <input type="text" name="question" id="question" class="form-control" placeholder="Question" value="{{$faq->question ?? ''}}">
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" id="answer" class="form-control">{{$faq->answer ?? ''}}</textarea>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
    <button type="submit" class="btn bg-primary submit">Update</button>
</div>
{!! Form::close() !!}
