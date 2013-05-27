<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li>{{ HTML::link_to_action('student@index','Student') }} <span class="divider">/</span></li>
            <li class="active">Submit a file</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="span12">
        <form method="POST" action="{{ URL::to_action('student/submission@submission') }}" id="upload_modal_form" enctype="multipart/form-data">
            <label for="photo">Photo</label>
            <input type="file" placeholder="Choose a photo to upload" name="photo" id="photo" />
            <label for="name">Description</label>
            <input type="text" placeholder="Name of submission" name="name" id="name" class="span5"></textarea>
            
            <div class="form-actions">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                <button type="submit" class="btn btn-primary">Upload Photo</button>
            </div>
        </form>

    </div>
</div>