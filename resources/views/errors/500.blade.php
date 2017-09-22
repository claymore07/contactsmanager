@extends('layouts.app')

@section('content')
    <div class="alert alert-danger text-center" style="direction: rtl">
        <h1 class="text-center">خطای سرور رخ داده است!</h1>
        <a class="btn btn-warning text-center" href="{{ URL::previous() }}">بازگشت به صفحه پیشین</a>
    </div>
@endsection