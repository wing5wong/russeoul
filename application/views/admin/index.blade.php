@if (Session::has('login_type'))
<div class="row">
    <div class="span12">
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            
            <p><strong>Woops!</strong> You appear to be a {{ Session::get('login_type') }}, so we brought you here!</p>	
            <p>Don't want to be here? {{ HTML::link_to_action('login@index','Login as a different user') }} or {{ HTML::link_to_action('login@logout','Logout') }}</p>	
        </div>
    </div>
</div>
@endif 
<div class="row">
    <div class="span12">
        <div class="well">
        <ul class="nav nav-tabs nav-stacked">
            <li>
                {{ HTML::link('admin/students','Manage Students') }}
            </li>
            <li class="divider-vertical"></li>
            <li>
                {{ HTML::link('admin/teachers','Manage Teachers') }}
            </li>
            <li class="divider-vertical"></li>
            <li>
                {{ HTML::link('admin/courses','Manage Courses') }}
            </li>
            <li class="divider-vertical"></li>
            <li>
                {{ HTML::link('quiz','Manage Quizzes') }}
            </li>
        </ul>
    </div>
</div>
</div>