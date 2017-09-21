@include('layouts.partials.header')
<body style="direction:rtl">
<!-- navbar -->
@include('layouts.partials.navbar')
<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-push-9">
            <div class="list-group">
            <?php $selectedGroup = Request::get('group_id')  ?>
                <a href="{{route('contacts.index')}}" class="list-group-item {{empty($selectedGroup)? 'active':'' }}">کل دفترچه <span class="badge pull-left">{{App\Contact::all()->count()}}</span></a>
                @foreach(App\Group::all() as $group)
                <a href="{{route('contacts.index', ['group_id'=>$group->id])}}" class="list-group-item {{($selectedGroup==$group->id)? 'active':'' }}">{{$group->name}} <span class="badge pull-left">{{$group->contacts()->count()}}</span></a>
               @endforeach
            </div>
        </div><!-- /.col-md-3 -->

        <div class="col-md-9 col-md-pull-3">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.partials.footer')