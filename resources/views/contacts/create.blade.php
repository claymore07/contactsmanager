@extends('layouts.main')



@section('content')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>افزودن مخاب</strong>
            </div>
            {!! Form::open(['method'=>'POST', 'action'=>'ContactsController@store', 'files'=>true, 'id'=>'Form']) !!}

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
                                        {!! Form::email('email',null,['id'=>'email','class'=>'form-control pull-right ']) !!}

                                    </div>

                                </div>
                            </div>

                            <div class="input_fields_wrap form-group">
                            </div>
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

                                    {!! Form::select('category_id',[]+$categories, null, ['placeholder' => 'انتخاب نوع...','class'=>'form-control', 'id'=>'category'] ) !!}


                                </div>
                                <div class="col-md-5 pull-right" >
                                    <div class="">
                                        {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control pull-right']) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="phone_fields_wrap form-group">

                            </div>
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
                                    <img src="http://placehold.it/150x150" alt="Photo">
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

                        $('#Form').submit();

                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON;
                        console.log(errors);
                        printErrorMsg(errors)
                    }
                });

            });

            function printErrorMsg(msg) {
                $("#print-errors").find("ul").html('');
                $(".text-danger").empty();
                $(".text-danger").css('display', 'none');
                $.each(msg, function (key, value) {
                    var id = '#' + key;
                    var arrayFieldIdTest = key.split(".");
                    if((arrayFieldIdTest[0]==='phones')||(arrayFieldIdTest[0]==='category_ids')||(arrayFieldIdTest[0]==='emails')){
                        id = '#'+arrayFieldIdTest[0]+'-'+arrayFieldIdTest[1];
                    }
                    console.log(id);
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

            var x = 1; //initlal text box count
            var emailCounter =0;
            $(add_button).click(function (e) { //on add input button click

                e.preventDefault();

                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="col-md-6 text-danger pull-right" id="emails-'+emailCounter+'" style="display: none"></div>' +
                        '                <div class="clearfix"></div>' +
                        '<div class="" style="display: flex; margin-top: 10px"><label for="emails" class="control-label col-md-2 pull-right">ایمیل ' + x + ':</label>' +
                        '<div class="col-md-10 pull-right"><input class="form-control pull-right" style="width: 78.5% !important;" type="email" id="emails" name="emails[]"/>' +
                        '<a href="#" class="remove_field btn btn-circle btn-warning " style="margin-right: 5.4%">' +
                        '<span class="glyphicon glyphicon-minus"></span> </a>' +
                        '</div></div>'); //add input box
                    emailCounter++;
                }
            });

            $('.input_fields_wrap').on("click", ".remove_field", function (e) { //user click on remove text

                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
                emailCounter--;
            });

            var max_phone_fields = 3; //maximum input boxes allowed
            var wrapperPhone = $(".phone_fields_wrap"); //Fields wrapper
            var add_button = $(".add_phone_button"); //Add button ID
            var counter = 0;
            var y = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click

                e.preventDefault();

                if (y <= max_fields) { //max input box allowed
                    y++; //text box increment
                    $(wrapperPhone).append('<div class="col-md-6 text-danger pull-right" id="phones-'+counter+'" style="display: none"></div>\n' +
                        '                <div class="clearfix"></div>\n' +
                        '                <div class="col-md-6 text-danger pull-right" id="category_ids-'+counter+'" style="display: none"></div>\n' +
                        '                <div class="clearfix"></div>' +
                        '<div class="" style="display: flex; margin-top: 10px">' +
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
                $(this).parent('div').parent('div').remove();
                y--;
                counter--;
            });

        });

    </script>
@endsection
