<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type"> 
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    {{ Asset::container('header')->styles() }}
    <script type="text/javascript">var BASE = "<?php echo URL::base(); ?>";</script>
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
                <a href="<?=URL::home()?>" class='brand'>{{ Lang::line('home.home') }}</a>
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
                        <li class='pull-right'><a href="<?=URL::home()?>login/logout">{{ Lang::line('login.logout')->get() }}</a></li>
                    </ul>
                    @else
                    {{ Form::open('login','post',array('class'=>'navbar-form pull-right form-inline')) }}
                    {{ Form::token() }}
                    {{ Form::text('username','',array('placeholder'=>Lang::line('login.username')->get(),'class'=>'span2')) }}


                    {{ Form::password('password',array('placeholder'=>Lang::line('login.password')->get(),'class'=>'span2')) }}



                    <label class="checkbox" style="padding-left:6px;margin-right:6px">
                        <input type="checkbox" value="1" name="remember" id="remember">
                        Remember?
                    </label>

                    {{ Form::submit(Lang::line('login.login')->get(),array('class'=>'btn btn-success')) }}

                    {{ Form::close() }}
                    @endif


                </div>
            </div>
        </div>
    </div>
<header class="row-wrap">
    <div class="container">
        <div class="row">

            <div class="span12" style="text-align:center;">
                
                    <!-- <img src="http://upload.wikimedia.org/wikipedia/commons/1/10/GinueLogo.png" class="" style="vertical-align:text-top;" />-->
                    <h1>경인교육대학교</h1>
                    <h2>GYEONGIN NATIONAL UNIVERSITY OF EDUCATION</h2>

                    <!--<small>[ {{ $subtitle }} ]</small>-->
                    <!--<h3>TESOL Courses</h3>-->
            </div>
        </div>
    </div>
    </header>
    <div class="container">

        {{ $content }}


    </div>          
    {{ Asset::container('footer')->scripts() }}
    @yield('scripts')
</body>
</html>
