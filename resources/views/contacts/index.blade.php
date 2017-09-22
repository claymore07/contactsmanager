@extends('layouts.main')

@section('content')




        <div class="panel panel-default" >
            <div class="panel-heading clearfix">
                <div class="pull-right">
                    <h4>
                    مخاطبان
                    </h4>
                </div>
                <div class="pull-left">
                    <a href="{{route('contacts.create')}}" class="btn btn-success">

                        افزودن مخاطب جدید
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </div>
            </div>
            @if(Session::has('message'))
                <div class=" alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <table class="table" style="direction:rtl">
                @foreach($contacts as $contact)
                <tr>
                    <td class="middle">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" style="height: 100px; width: 100px" src="/images/{{$contact->path!='/'?$contact->path:'default_user.jpg'}}" alt="{{$contact->fname}} {{$contact->lname}}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$contact->fname}} {{$contact->lname}}</h4>
                                <address>
                                    <strong>شرکت: {{$contact->company}}</strong><br>
                                    <strong>گروه: {{$contact->group->name}}</strong><br>
                                 {{!empty($contact->emails()->first())?$contact->emails()->first()->email:'فاقد ایمیل'}}<br/>
                                 {{!empty($contact->phones()->first())?$contact->phones()->first()->phone:'فاقد شماره تماس'}}

                                </address>
                            </div>
                        </div>
                    </td>
                    <td width="130" class="middle">
                        {!! Form::open(['method'=>'DELETE', 'action'=>['ContactsController@destroy', $contact->id]]) !!}
                        {!! Form::token() !!}
                        <div>
                            <a href="{{route('contacts.show', $contact->id)}}" class="btn btn-circle btn-primary btn-xs" title="مشاهده">
                                <i class="glyphicon glyphicon-list"></i>
                            </a>
                            <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-circle btn-default btn-xs" title="ویرایش">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <button onclick="return confirm('آیا مطمئن می باشید؟')" type="submit" href="{{route('contacts.destroy', $contact->id)}}" class="btn btn-circle btn-danger btn-xs" title="حذف">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
             @endforeach
            </table>
        </div>

        <div class="text-center" style="direction: ltr">
            <nav>
                {{$contacts->appends(Request::query())->render('vendor.pagination.custom')}}
            </nav>
        </div>




@endsection




