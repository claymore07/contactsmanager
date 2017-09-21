@extends('layouts.main')


@section('content')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>اطلاعات مخاطب</strong>
            </div>
            <div class="panel-body" style="direction:rtl">
                <div class="media">
                    <div class="media-left">

                            <img class="media-object" style="height: 100px; width: 100px" src="/images/{{$contact->path}}"  alt="{{$contact->fname}} {{$contact->lname}}">

                    </div>
                    <div class="media-body" style="border-right: solid rgba(237,236,236,0.79); padding-right: 30px">
                        <h4></h4>
                       <h4 class="media-heading">{{$contact->fname}} {{$contact->lname}}</h4>
                        <address>
                            <strong><i class="fa fa-university" aria-hidden="true" style="font-size: 20px"></i>: {{$contact->company}}</strong><br>
                            <strong><i class="fa fa-group" aria-hidden="true" style="font-size: 20px"></i>: {{$contact->group->name}}</strong><br>

                            @foreach($contact->emails as $email)

                                <strong><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px"></i> : {{$email->email}}</strong><br/>

                            @endforeach

                            @foreach($contact->phones as $phone)

                                <strong><i class="fa fa-mobile" aria-hidden="true"  style="font-size: 28px"></i> : {{$phone->category->name}} {{$phone->phone}}</strong><br/>

                            @endforeach
                            <strong><i class="fa  fa-address-card-o" aria-hidden="true" style="font-size: 20px"></i> : {{$contact->address}}</strong>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection