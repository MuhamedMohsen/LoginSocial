@extends('layouts.app')

@section('content')



<form class="form-horizontal" action="{{route('admin.branchofficers.store')}}" method="POST" enctype="multipart/form-data">

    {!! csrf_field() !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="page-title"> @lang('branchofficers.create')</h5>
        </div>

        <div class="panel-body">
            @include('admin.users.checkEmailAndName')
            <div class="form-group">
                <label for="name" class="col-sm-1 control-label">{{trans('staff.numberStaff')}}</label>
                <div class="col-sm-2">
                    <input type="text" name="employee_id" id="employee_id" class="form-control" required placeholder="{{trans('staff.numberStaff')}}">
                    <span id="error_employee"></span>
                </div>
                <label for="name" class="col-sm-1 control-label">{{trans('branchofficers.name')}}</label>
                <div class="col-sm-3">
                    <input type="text" name="name" id="name" class="form-control" required placeholder="{{trans('branchofficers.name')}}">
                    <span id="error_name"></span>
                </div>
                <label for="email" class="col-sm-2 control-label">{{trans('branchofficers.email')}}</label>
                <div class="col-sm-3">
                    <input type="email" name="email" id="email" class="form-control" required placeholder="{{trans('branchofficers.email')}}">
                    <span id="error_email"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-1 control-label">{{trans('branchofficers.password')}}</label>
                <div class="col-sm-4">
                    <input type="password" name="password" class="form-control" required placeholder="{{trans('branchofficers.password')}}">
                </div>
                <label for="password" class="col-sm-2 control-label">{{trans('global.password_confirmation')}}</label>
                <div class="col-sm-4">
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="{{trans('global.password_confirmation')}}">
                </div>
            </div>



            <div class="form-group">
                <div class="box-body table-responsive table-bordered">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>{{trans('branchofficers.branche')}}</th>

                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody id="InsertPdf">
                        <tr>
                            <td>
                                <select name="branch[][branch_id]" class="form-control select2" dir="rtl" required="required">
                                    <option value="">{{trans('branchofficers.brancheSelect')}}</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->title}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>#</td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success"  id="AddPdf" type="button"><i class="glyphicon glyphicon-plus"></i> اضافة جديد</button>
                </div>
            </div>


            <div class="form-group">
                <label for="address" class="col-sm-1 control-label">{{trans('branchofficers.address')}}</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" required placeholder="{{trans('branchofficers.address')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="mobile" class="col-sm-1 control-label">{{trans('branchofficers.mobile')}}</label>
                <div class="col-sm-4">
                    <input type="text" name="mobile" class="form-control" required placeholder="{{trans('branchofficers.mobile')}}">
                </div>
                <label for="phone" class="col-sm-2 control-label">{{trans('branchofficers.phone')}}</label>
                <div class="col-sm-4">
                    <input type="text" name="phone" class="form-control"  placeholder="{{trans('branchofficers.phone')}}">
                </div>
            </div>

                <div class="form-group">

                    <label for="roles" class="col-sm-1 control-label">{{trans('global.Roles')}}</label>
                    <div class="col-sm-4">
                        <select class="form-control select2" multiple="multiple" required="" name="roles[]">
                            @foreach($roles2 as $role)
                            <option value="{{ $role->name }}" @if($role->id == 2) SELECTED @endif @if($role->id == 1 ) DISABLED @endif >{{ $role->name }}</option>
                                @endforeach
                        </select>
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif

                    </div>
                </div>

            <div class="form-group">
                <label for="status" class="col-sm-1 control-label">{{trans('global.status')}}</label>
                <div class="col-sm-4">
                    <select name="status" class="form-control" required>
                        <option value="1">{{trans('global.enabled')}}</option>
                        <option value="0">{{trans('global.notenabled')}}</option>
                    </select>
                </div>
            </div>




        </div>

    </div>


    <div class="row">
        <!-- left column -->



        <!--/.col (left) -->

        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('staff.ContactData')}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-groupfff">


                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{{trans('clients.nameQuadruple')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nameQuadruple" placeholder="{{trans('clients.nameQuadruple')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{{trans('clients.NationalID')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="NationalID" placeholder="{{trans('clients.NationalID')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">{{trans('clients.image')}}</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">{{trans('staff.gender')}}</label>
                            <div class="col-sm-9">
                                <select name="gender" required class="form-control">
                                    <option value=""> {{trans('staff.gender')}}</option>

                                    <option value="1">{{trans('staff.male')}}</option>
                                    <option value="2">{{trans('staff.female')}}</option>

                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->



            </div>
            <!-- /.box -->



        </div>
        <!--/.col (right) -->
    </div>
    <div class="box-footer">
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary pull-right register" id="register">{{trans('global.app_save')}}</button>
        </div>
        <div class="col-sm-1">
            <button class="btn btn-danger" type="reset" onclick="window.location='{{route('admin.branchofficers')}}';return false;">{{trans('global.cancel')}}</button>
        </div>
        <div class="col-sm-2">
            <button class="btn default" type="reset">{{trans('global.reset')}}</button>
        </div>

    </div>
</form>
<script>
    $(function () {
        var zxc = 1;
        $("#AddPdf").click(function () {

            $("#InsertPdf").append(
                // Add new row

                ' <tr id="remove'+zxc+' ">' +
                '<td>' +
                '<select name="branch['+zxc+'][branch_id]" dir="rtl" required class="form-control select2">'+
                '<option value="">  {{trans('branchofficers.brancheSelect')}}</option>'+
                '@foreach($branches as $branch)'+
                '<option value="{{ $branch->id }}"> {{ $branch->title }} </option>'+
                '@endforeach'+
                '</select>'+
                '</td>' +


                '            <td>' +
                '                <input type="button" id="remove" class="btn btn-danger " value="X" />' +
                '            </td>' +
                ' </tr>'+

                ''
            );
            $('.select2').select2();
            zxc++;
        });

        //remove selected Row
        $("#InsertPdf").on("click", "#remove", function () {
            $(this).closest("tr").remove();

        });

    });


</script>
@stop

