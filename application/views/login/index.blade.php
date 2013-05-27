<div class="row">
    <div class="span6 offset3">
        @if (Session::has('login_errors'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>

            <p><strong>Woops!</strong> Username or password incorrect :(</p>    
        </div>
        @endif  
            {{ Form::open('login','post',array('class'=>'form-horizontal form-login')) }}
            {{ Form::token() }}
            
            <fieldset>
                <legend>Log in!</legend>

            <div class="control-group">  
                {{ Form::label('username',Lang::line('login.username')->get(),array('class'=>'control-label')) }}
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        {{ Form::text('username','',array('placeholder'=>Lang::line('login.username')->get(),'class'=>'input-xlarge input-block-level')) }}
                    </div>
                </div> 
            </div>

            <div class="control-group">  
                {{ Form::label('password',Lang::line('login.password')->get(),array('class'=>'control-label')) }}
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-key"></i></span>
                        {{ Form::password('password',array('placeholder'=>Lang::line('login.password')->get(),'class'=>'input-xlarge input-block-level')) }}
                    </div>
                </div> 
            </div>



            <div class="controls form-inline">
                {{ Form::submit(Lang::line('login.login')->get(),array('class'=>'btn btn-success')) }}
                <label class="checkbox" style="padding-left:6px;">
                    <input type="checkbox" value="1" name="remember" id="remember">
                    Remember?
                </label>
            </div>
            </fieldset>
            {{ Form::close() }}
    </div>

</div>