@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="jumbotron text-center" style="background-color: white">
                    <h1>{{Auth::user()->name}} سلام،</h1>
                    <p class="lead">
                        به سیستم مدیریت دفترچه مخاطبان خوش آمدید.
                    </p>
                    <p>
                        <a href="{{route('contacts.index')}}" class="btn btn-primary btn-lg">مدیریت دفترچه تماس</a>

                    </p>

                </div>
            </div>
        </div>
    </div>

@endsection
