<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type"> 
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    {{ Asset::container('header')->styles() }}
    
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?=URL::home()?>" class='brand'><span class="text-error">{{ Lang::line('home.home') }}</span></a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        @forelse($menu as $menuitem)
                        <!--<li class="divider-vertical"></li>-->
                        <li>{{ HTML::link($menuitem["link"],$menuitem["text"]) }}</li>

                        @empty

                        @endforelse
                    </ul>

                    <ul class='nav pull-right'>
                        <!--<li class="divider-vertical"></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"></i> 
                                {{ Lang::line('menu.language')->get()  }}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{{ HTML::link_to_language('kr','한국어') }} </li>
                                <li>{{ HTML::link_to_language('en','English') }} </li>
                            </ul>
                        </li>
                    </ul>
                    @if( Auth::check())
                    <ul class="nav pull-right">
                        <!--<li class="divider-vertical"></li>-->
                        <li class='pull-right'><a href="<?=URL::home()?>login/logout"><span class="text-error">{{ Lang::line('login.logout')->get() }}</span></a></li>
                    </ul>
                    @else
                    {{ Form::open('login','post',array('class'=>'navbar-form pull-right form-inline')) }}

                        {{ Form::text('username','',array('placeholder'=>Lang::line('login.username')->get(),'class'=>'span2')) }}
                    

                        {{ Form::password('password',array('placeholder'=>Lang::line('login.password')->get(),'class'=>'span2')) }}

                    {{ Form::label('remember','Remember?') }}

                    {{ Form::checkbox('remember') }}



                    {{ Form::submit(Lang::line('login.login')->get(),array('class'=>'btn btn-danger')) }}

                    {{ Form::close() }}
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12" style="text-align:center;">
                <img src="http://upload.wikimedia.org/wikipedia/commons/1/10/GinueLogo.png" class="" style="vertical-align:text-top;" />
                <h1><span class="text-error">TESOL </span><small>{{ $subtitle }}</small></h1>
                <hr>
            </div>
        </div>
        
        {{ $content }}

    </div>          
    {{ Asset::container('footer')->scripts() }}

</body>
</html>
