<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div style="float: right">
                <a class="navbar-brand text-uppercase" href="#">
                    دفترچه من
                </a>
            </div>
            {!! Form::open(['method'=>'GET','action'=>'ContactsController@index','class'=>'navbar-form navbar-right', 'role'=>'search']) !!}

            <div class="input-group ">
                {!! Form::text('term',Request::get('term'),['class'=>'form-control','id'=>'autocomplete','placehoder'=>'Search...']) !!}
                <span class="input-group-btn">
                        <button class="btn btn-defualt" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
            </div>

            {!! Form::close() !!}

        </div><!-- /.navbar-header -->

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <div class="nav navbar-left navbar-btn">
                <a href="{{route('contacts.create')}}" class="btn btn-default">

                    افزودن مخاطب جدید
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
            </div>
        </div>


    </div>
</nav>