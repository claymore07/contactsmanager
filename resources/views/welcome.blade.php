@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="jumbotron text-center" style="background-color: white">
                    <h1>سیستم مدیریت دفترچه مخاطبان</h1>
                    <p class="lead">
                       لیست مخاطبان خود را با کاملترین اطلاعات به راحتی مدیریت کنید.
                    </p>
                    <p>
                        <a href="{{url("/register")}}" class="btn btn-primary btn-lg">ثبت نام کنید</a> یا
                        <a href="{{url("/register")}}" class="btn btn-default btn-lg">وارد شوید</a>
                    </p>

                </div>
            </div>
        </div>
    </div>


@endsection