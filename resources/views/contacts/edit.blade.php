@extends('layouts.main')



@section('content')
<div id="loading" style="width: 100%; height: 100%; z-index: 1000;display: none;background: rgba(255, 255, 255, 0.63); position: absolute;"></div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>افزودن مخاب</strong>
            </div>
            {!! Form::model($contact,['method'=>'PUT', 'action'=>['ContactsController@update', $contact->id], 'files'=>true, 'id'=>'Form']) !!}

            <div class="panel-body" style="direction:rtl">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="col-md-6 text-danger pull-right" id="fname" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group ">

                                {!! Form::label('fname','نام:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-8 pull-right" >
                                    {!! Form::text('fname',null,['id'=>'fname','class'=>'form-control pull-right']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="lname" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group">

                                {!! Form::label('lname','نام خانوادگی:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-8 pull-right" >
                                    {!! Form::text('lname',null,['id'=>'lname','class'=>'form-control pull-right']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="company" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group" id="company_div">

                                {!! Form::label('company','شرکت:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-8 pull-right" >
                                    {!! Form::text('company',null,['id'=>'company','class'=>'form-control pull-right']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="email" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group email_group" >

                                {!! Form::label('email','ایمیل اصلی:',['class'=>'control-label col-md-2 pull-right']) !!}

                                <div class="col-md-8 pull-right" >
                                    <div class="">
                                        {!! Form::email('email',$contact->emails()->first()->email,['id'=>'email','class'=>'form-control pull-right ']) !!}
                                        {!! Form::hidden('email_id',$contact->emails()->first()->id) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="input_fields_wrap form-group">
                                <?php
                                $emails = $contact->emails;
                                $emails->shift();

                                $email_counter = 0;
                                $x = 1;

                                ?>
                                @if(!empty($emails))
                                        <div class="col-md-6 text-danger pull-right" id="emails_errors"
                                             style="display: none"></div>
                                    @foreach($emails->all() as $email)

                                        <div class="clearfix"></div>
                                        <div class="" style="display: flex; margin-top: 10px"><label for="emails"
                                                                                                     class="control-label col-md-2 pull-right">ایمیل {{$x}}
                                                :</label>
                                            <div class="col-md-10 pull-right"><input class="form-control pull-right"
                                                                                     style="width: 78.5% !important;"
                                                                                     value="{{$email->email}}"
                                                                                     type="email" id="emails"
                                                                                     name="emails[]"/>
                                                <a href="#" data_id="emails" class="remove_field btn btn-circle btn-warning "
                                                   style="margin-right: 5.4%">
                                                    <span class="glyphicon glyphicon-minus"></span> </a>
                                                <input type="hidden" class="email_ids" name="email_ids[]"
                                                       value="{{$email->id}}">
                                            </div>

                                        </div>
                                        <?php $email_counter++; $x++; ?>
                                    @endforeach
                                @endif
                            </div>
                            <div id="deleted_emails"></div>
                            <div class="form-group">
                                <div id="add-new-email" class="text-center col-md-10" >

                                    <a id="add_new_email_btn" href="#" class="btn btn-info btn-lg add_field_button">
                                        <span class="glyphicon glyphicon-plus-sign"></span> افزودن ایمیل دیگر
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="phone" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="col-md-6 text-danger pull-right" id="category_id" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group">

                                {!! Form::label('category','نوع شماره:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-3 pull-right">

                                    {!! Form::select('category_id',[]+$categories, $contact->phones()->first()->category_id, ['placeholder' => 'انتخاب نوع...','class'=>'form-control', 'id'=>'category'] ) !!}


                                </div>
                                <div class="col-md-5 pull-right" >
                                    <div class="">
                                        {!! Form::text('phone', $contact->phones()->first()->phone,['id'=>'phone','class'=>'form-control pull-right']) !!}
                                        {!! Form::hidden('phone_id', $contact->phones()->first()->id) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="phone_fields_wrap form-group">
                                <?php
                                $phones=$contact->phones;
                                $phones->shift();

                                $phone_counter = 0;
                                $y=1;

                                ?>
                                @if(!empty($phones))
                                        <div class="col-md-6 text-danger pull-right" id="phones_errors"
                                                         style="display: none"></div>
                                    <div class="clearfix"></div>
                                    @foreach($phones->all() as $phone)


                                            <div class="" style="display: flex; margin-top: 10px">'
                                                {!! Form::label('category_ids','شماره های دیگر:',['class'=>'control-label col-md-2 pull-right']) !!}
                                                <div class="col-md-3 pull-right">

                                                    {!! Form::select('category_ids[]',[]+$categories, $phone->category_id, ['placeholder' => 'انتخاب نوع...','class'=>'form-control category_ids'] ) !!}


                                                </div>
                                                <div class="col-md-6 pull-right"><input class="form-control pull-right"
                                                                                        style="width: 81% !important;"
                                                                                        value="{{$phone->phone}}"
                                                                                        type="text" id="phones"
                                                                                        name="phones[]"/>
                                                    <a href="#" class="remove_field btn btn-circle btn-warning col-md-1"
                                                       style="margin-right: 15px">
                                                        <span class="glyphicon glyphicon-minus"></span> </a>
                                                    <input type="hidden" class="email_ids" name="phone_ids[]"
                                                           value="{{$phone->id}}">
                                                </div>
                                            </div>
                                            <?php $phone_counter++; $y++; ?>
                                        @endforeach
                                    @endif
                            </div>
                            <div id="deleted_phones"></div>
                            <div class="form-group">
                                <div id="add-new-phone" class="text-center col-md-10" >

                                    <a id="add_new_email_btn" href="#" class="btn btn-info btn-lg add_phone_button">
                                        <span class="glyphicon glyphicon-plus-sign"></span> افزودن شماره دیگر
                                    </a>

                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="address" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                {!! Form::label('address','آدرس:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-8" style="float: right">
                                    {!! Form::textarea('address',null,['id'=>'address','class'=>'form-control pull-right', 'rows'=>3]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 text-danger pull-right" id="group_id" style="display: none"></div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                {!! Form::label('group_id','گروه:',['class'=>'control-label col-md-2 pull-right']) !!}
                                <div class="col-md-4 pull-right">
                                    {!! Form::select('group_id',[]+$groups, null, ['placeholder' => 'انتخاب گروه...','class'=>'form-control', 'id'=>'group_ids'] ) !!}
                                </div>
                                <div class="col-md-4 pull-right">
                                    <a href="#" id="add-group-btn" class="btn btn-default btn-block">افزودن گروه جدید</a>
                                </div>
                            </div>
                            <div class="form-group" id="add-new-group">
                                <div class="col-md-offset-1 col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="new_group" id="new_group" class="form-control">
                                        <span class="input-group-btn">
                            <a href="#" class="btn btn-default" id="add_new_group_btn">
                              <i class="glyphicon glyphicon-ok"></i>
                            </a>
                          </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-pull-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                    <img src="/images/{{$contact->path!='/'?$contact->path:'default_user.jpg'}}" alt="{{$contact->fname}} {{$contact->lname}}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                     style="max-width: 200px; max-height: 150px;"></div>
                                <div class="text-center">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">انتخاب تصویر</span><span
                                    class="fileinput-exists">تغییر</span>{!! Form::file('photo') !!}</span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                {!! Form::submit(empty($contact->id)?'ذخیره':'بروزرسانی', ['class'=>'btn btn-primary form-submit']) !!}
                                {!! Form::reset('انصراف',['class'=>'btn btn-default']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::token() !!}
    {!! Form::close() !!}


@endsection
@section('footer')
    <script>
        $( document ).ready(function() {
            $(".form-submit").click(function (e) {
                e.preventDefault();
                $('#loading').append('<img src="/images/loading.gif" style="margin: 50%"> loading...');
                $('#loading').css('display','block');

                var _token = $("input[name='_token']").val();
                var first_name = $("input[name='fname']").val();
                var last_name = $("input[name='lname']").val();
                var group_id = $("#group_ids").val();
                var email = $("input[name='email']").val();
                var emails = $("input[name='emails[]']").map(function () {return $(this).val();}).get();
                var phone = $("input[name='phone']").val();
                var category_id = $("#category").val();
                var category_ids = $(".category_ids").map(function () {
                    return $(this).val();
                }).get();
                var phones = $("input[name='phones[]']").map(function () {
                    return $(this).val();
                }).get();
                var address = $("textarea[name='address']").val();

                $.ajax({
                    url: "{{route('contacts.validation')}}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        fname: first_name,
                        lname: last_name,
                        phone: phone,
                        category_id: category_id,
                        email: email,
                        emails: emails,
                        phones: phones,
                        category_ids: category_ids,
                        group_id: group_id,
                        address: address
                    },
                    success: function () {
                    $('#loading').css('display','none');
                        $('#loading').empty();
                        $('#Form').submit();

                    },
                    error: function (xhr) {
                    $('#loading').css('display','none');
                        $('#loading').empty();
                        var errors = xhr.responseJSON;

                        printErrorMsg(errors)
                    }
                });

            });

            function printErrorMsg(msg) {

                $(".text-danger").empty();
                $(".text-danger").css('display', 'none');
                $.each(msg, function (key, value) {
                    var id = '#' + key;
                    var arrayFieldIdTest = key.split(".");
                    if((arrayFieldIdTest[0]==='phones')||(arrayFieldIdTest[0]==='category_ids')){
                        id = '#phones_errors';
                    }
                    if(arrayFieldIdTest[0]==='emails'){
                        id = '#emails_errors';
                    }
                    console.log(value);
                    $(id).append('<p class="error-message">' + value + '</p>');
                    $(id).css('display', 'block');
                });
            }


            $("#add-new-group").hide();
            $('#add-group-btn').click(function () {
                $("#add-new-group").slideToggle(function () {
                    $('#new_group').focus();
                });
                return false;
            });
            $('#add_new_group_btn').click(function () {
                var newGroup = $('#new_group');
                var inputGroup = newGroup.closest('.input-group');

                $.ajax({

                    url: "{{route('groups.store')}}",
                    method: 'post',
                    data: {
                        name: $('#new_group').val(),
                        _token: $("input[name=_token]").val()
                    },
                    success: function (group) {
                        if (group.id != null) {
                            inputGroup.removeClass('has-error');
                            inputGroup.next('.text-danger').remove();

                            var newOption = $('<option></option>')
                                .attr('value', group.id)
                                .attr('selected', true)
                                .text(group.name);
                            $("select[name=group_id]")
                                .append(newOption);
                            newGroup.val("");
                        }
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON;

                        var error = errors.name[0];

                        if (error) {
                            inputGroup.next('.text-danger').remove();

                            inputGroup
                                .addClass('has-error')
                                .after('<p class="text-danger">' + error + '</p>')
                        }

                    }


                });

            });

            var max_fields = 3; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = {{$x}}; //initlal text box count
            var emailCounter ={{$email_counter}};
            $(add_button).click(function (e) { //on add input button click

                e.preventDefault();
                console.log(x);
                if (x <= max_fields) { //max input box allowed

                    $(wrapper).append('' +
                        '<div class="" style="display: flex; margin-top: 10px"><label for="emails" class="control-label col-md-2 pull-right">ایمیل ' + x + ':</label>' +
                        '<div class="col-md-10 pull-right"><input class="form-control pull-right"  style="width: 78.5% !important;" type="email" id="emails" name="emails[]"/>' +
                        '<a href="#" data_id="emails" class="remove_field btn btn-circle btn-warning " style="margin-right: 5.4%">' +
                        '<span class="glyphicon glyphicon-minus"></span> </a>' +
                        '</div></div>'); //add input box
                    x++; //text box increment
                    emailCounter++;
                }
            });

            $('.input_fields_wrap').on("click", ".remove_field", function (e) { //user click on remove text

                e.preventDefault();
                if($(this).next().val()) {
                    $('#deleted_emails').append('' +
                        '<input type="hidden" class="email_ids" name="deleted_email_ids[]" value="' + $(this).next().val() + '">');
                }

                $('#emails_errors').empty();

                $(this).parent('div').parent('div').remove();

                x--;
                emailCounter--;
            });

            var max_phone_fields = 3; //maximum input boxes allowed
            var wrapperPhone = $(".phone_fields_wrap"); //Fields wrapper
            var add_button = $(".add_phone_button"); //Add button ID
            var counter = {{$phone_counter}};
            var y = {{$y}}; //initlal text box count
            $(add_button).click(function (e) { //on add input button click

                e.preventDefault();
                console.log(y);
                if (y <= max_fields) { //max input box allowed
                    y++; //text box increment
                    $(wrapperPhone).append('<div class="" style="display: flex; margin-top: 10px">' +
                        '{!! Form::label('category_ids','شماره های دیگر:',['class'=>'control-label col-md-2 pull-right']) !!}' +
                        '<div class="col-md-3 pull-right">' +
                        '{!! Form::select('category_ids[]',[]+$categories, null, ['placeholder' => 'انتخاب نوع...','class'=>'form-control category_ids'] ) !!}' +


                        '</div>' +
                        '<div class="col-md-6 pull-right"><input class="form-control pull-right" style="width: 81% !important;" type="text" id="phones" name="phones[]"/>' +
                        '<a href="#" class="remove_field btn btn-circle btn-warning col-md-1" style="margin-right: 15px">' +
                        '<span class="glyphicon glyphicon-minus"></span> </a>' +
                        '</div></div>'); //add input box
                    counter++;
                }

            });

            $('.phone_fields_wrap').on("click", ".remove_field", function (e) { //user click on remove text

                e.preventDefault();
                if($(this).next().val()) {
                    $('#deleted_phones').append('' +
                        '<input type="hidden" class="phone_ids" name="deleted_phone_ids[]" value="' + $(this).next().val() + '">');
                }
                $('#phones_errors').empty();
                $(this).parent('div').parent('div').remove();
                y--;
                counter--;
            });

        });

    </script>
@endsection
