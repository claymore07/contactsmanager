<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header navbar-left">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            @if(! Auth::guest())
            {!! Form::open(['method'=>'GET','action'=>'ContactsController@index','class'=>'navbar-form navbar-right', 'role'=>'search']) !!}

            <div class="input-group ">
                {!! Form::text('term',Request::get('term'),['class'=>'form-control','id'=>'autocomplete','placehoder'=>'Search...']) !!}
                <span class="input-group-btn">
                        <button class="btn btn-defualt" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
            </div>
            {!! Form::token() !!}
            {!! Form::close() !!}
        @endif
            <ul class="nav navbar-nav navbar-left">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">ورود</a></li>
                    <li><a href="{{ route('register') }}">ثبت نام</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-header -->

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <div style="float: right">
                <a class="navbar-brand text-uppercase" href="#">
                    دفترچه من
                </a>
            </div>
            <!-- Left Side Of Navbar -->
            @if(! Auth::guest())
            <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">

               <li class="{{Request::segment(1)=="contacts"? "active":''}}"><a href="{{route('contacts.index')}}">دفترچه مخاطبان</a></li>
                <li class="{{Request::segment(1)=="home"? "active":''}}"><a href="{{url('/home')}}">خانه</a></li>
            </ul>
            @endif
            <!-- Right Side Of Navbar -->


        </div>


    </div>
</nav>