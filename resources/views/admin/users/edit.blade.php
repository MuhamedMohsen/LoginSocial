@extends('admin.index')
@section('content')
    <style>

        .btn.red:not(.btn-outline) {
            color: #fff;
            background-color: #e7505a;
            border-color: #e7505a;
        }
        .btn.default:not(.btn-outline) {
            color: #666;
            background-color: #e1e5ec;
            border-color: #e1e5ec;
        }
    </style>
    <script type="text/javascript">

        $("a[data-dismiss='fileinput']").on("click",function(){
            $("input[name='rmv_image']").attr("value","true");
            $("input[name='image']").attr("value","");
        });

    </script>
    <script src="{{asset('admin_assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>
    <link href="{{asset('admin_assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css"/>



    <form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{$user->id}}">
        {!! csrf_field() !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="page-title"> @lang('users.edit')</h5>
            </div>

            <div class="panel-body">
                <div class="form-group">


                    <label for="name" class="col-sm-1 control-label">{{trans('users.name')}}</label>
                    <div class="col-sm-3">
                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" required placeholder="{{trans('users.name')}}">
                        <span id="error_name"></span>
                    </div>
                    <label for="family" class="col-sm-1 control-label">{{trans('users.family')}}</label>
                    <div class="col-sm-3">
                        <input type="text" name="family_name" id="family" value="{{$user->family_name}}" class="form-control" required placeholder="{{trans('users.family')}}">

                    </div>

                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-1 control-label">{{trans('users.email')}}</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" required placeholder="{{trans('users.email')}}">
                        <span id="error_email"></span>
                    </div>
                </div>



                <div class="form-group">
                    <label for="address" class="col-sm-1 control-label">{{trans('users.address')}}</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" value="{{$user->address}}" required placeholder="{{trans('users.address')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile" class="col-sm-1 control-label">{{trans('users.mobile')}}</label>
                    <div class="col-sm-4">
                        <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}" required placeholder="{{trans('users.mobile')}}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">{{trans('users.image')}}</label>
                    <div class="col-sm-4">


                        <div class="fileinput @if($user->image) fileinput-exists @else fileinput-new @endif" data-provides="fileinput">
                            <div class="input-group input-large">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                    <img class="fileinput-filename" src="{{url('upload/users/'.$user->image)}}" alt="" />
                                </div>
                                <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> جديد</span>
                                                <span class="fileinput-exists"> تغيير  </span>
                                                <input type="file" name="image" value="{{$user->image}}">

                                            </span>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-1 control-label">{{trans('global.status')}}</label>
                    <div class="col-sm-4">
                        <select name="status" class="form-control" required>
                            <option value="1" @if($user->status == 1) SELECTED @endif>{{trans('global.enabled')}}</option>
                            <option value="0" @if($user->status == 0) SELECTED @endif>{{trans('global.notenabled')}}</option>
                        </select>
                    </div>
                </div>





            </div>


        </div>

        <div class="box-footer">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary pull-right register" id="register">{{trans('global.app_save')}}</button>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-danger" type="reset" onclick="window.location='{{route('users')}}';return false;">{{trans('global.cancel')}}</button>
            </div>
            <div class="col-sm-2">
                <button class="btn default" type="reset">{{trans('global.reset')}}</button>
            </div>

        </div>


    </form>

@stop

